#!/bin/bash

# Deployment Script for Digivarisity Application
# Usage: ./docker/deploy.sh [environment]
# Environments: local, staging, production

set -e

ENVIRONMENT=${1:-local}
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

echo "🚀 Deploying Digivarisity - Environment: $ENVIRONMENT"
echo "=================================================="

cd "$PROJECT_DIR"

# Color codes
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Function to print colored messages
print_success() {
    echo -e "${GREEN}✓ $1${NC}"
}

print_error() {
    echo -e "${RED}✗ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}ℹ $1${NC}"
}

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    print_error "Docker is not installed. Please install Docker first."
    exit 1
fi

print_success "Docker is installed"

# Check if Docker Compose is installed
if ! command -v docker-compose &> /dev/null && ! docker compose version &> /dev/null; then
    print_error "Docker Compose is not installed. Please install Docker Compose first."
    exit 1
fi

print_success "Docker Compose is installed"

# Check if .env file exists
if [ ! -f .env ]; then
    print_info "Creating .env file from .env.example"
    if [ -f .env.example ]; then
        cp .env.example .env
        print_success ".env file created"
    else
        print_error ".env.example not found"
        exit 1
    fi
else
    print_success ".env file exists"
fi

# Environment-specific configurations
case $ENVIRONMENT in
    local)
        print_info "Setting up local development environment"
        ;;
    staging)
        print_info "Setting up staging environment"
        # Add staging-specific commands here
        ;;
    production)
        print_info "Setting up production environment"
        # Confirm production deployment
        read -p "⚠️  Are you sure you want to deploy to PRODUCTION? (yes/no): " confirm
        if [ "$confirm" != "yes" ]; then
            print_error "Deployment cancelled"
            exit 0
        fi
        ;;
    *)
        print_error "Invalid environment: $ENVIRONMENT"
        echo "Valid environments: local, staging, production"
        exit 1
        ;;
esac

# Build Docker images
print_info "Building Docker images..."
docker-compose build
print_success "Docker images built successfully"

# Start containers
print_info "Starting containers..."
docker-compose up -d
print_success "Containers started"

# Wait for database to be ready
print_info "Waiting for database to be ready..."
sleep 10

# Check if APP_KEY is set
APP_KEY=$(grep APP_KEY .env | cut -d '=' -f2)
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    print_info "Generating application key..."
    docker-compose exec -T app php artisan key:generate
    print_success "Application key generated"
else
    print_success "Application key is already set"
fi

# Run migrations
print_info "Running database migrations..."
if [ "$ENVIRONMENT" = "production" ]; then
    docker-compose exec -T app php artisan migrate --force
else
    docker-compose exec -T app php artisan migrate
fi
print_success "Migrations completed"

# Seed database (only for local and staging)
if [ "$ENVIRONMENT" != "production" ]; then
    print_info "Seeding database..."
    docker-compose exec -T app php artisan db:seed
    print_success "Database seeded"
fi

# Create storage link
print_info "Creating storage link..."
docker-compose exec -T app php artisan storage:link || print_info "Storage link already exists"

# Clear and optimize caches
print_info "Optimizing application..."
docker-compose exec -T app php artisan config:cache
docker-compose exec -T app php artisan route:cache
docker-compose exec -T app php artisan view:cache
docker-compose exec -T app php artisan optimize
print_success "Application optimized"

# Set permissions
print_info "Setting permissions..."
docker-compose exec -T app chmod -R 775 storage bootstrap/cache
docker-compose exec -T app chown -R www-data:www-data storage bootstrap/cache
print_success "Permissions set"

# Show container status
echo ""
print_info "Container Status:"
docker-compose ps

# Show application URLs
echo ""
print_success "=================================================="
print_success "Deployment completed successfully!"
print_success "=================================================="
echo ""
print_info "Application URL: http://localhost:8000"
print_info "Health Check: http://localhost:8000/health"
echo ""
print_info "Useful commands:"
echo "  - View logs: docker-compose logs -f app"
echo "  - Stop containers: docker-compose down"
echo "  - Restart: docker-compose restart"
echo "  - Execute artisan: docker-compose exec app php artisan [command]"
echo ""
print_success "Happy coding! 🎉"

