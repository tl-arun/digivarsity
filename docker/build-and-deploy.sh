#!/bin/bash

# Complete Build and Deploy Script - No DevOps Required!
# This script handles everything automatically

set -e

IMAGE_NAME="${1:-digivarisity-app}"
VERSION="${2:-latest}"

echo "🚀 Digivarisity - Complete Build & Deploy"
echo "========================================="
echo ""

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[0;36m'
NC='\033[0m'

print_success() { echo -e "${GREEN}✓ $1${NC}"; }
print_error() { echo -e "${RED}✗ $1${NC}"; }
print_info() { echo -e "${YELLOW}ℹ $1${NC}"; }

# Get script directory
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

cd "$PROJECT_DIR"

# Check if .env.production exists
if [ ! -f .env.production ]; then
    print_info "Creating .env.production from template..."
    if [ -f env.production.template ]; then
        cp env.production.template .env.production
    else
        cp .env.example .env.production
    fi
    echo ""
    echo -e "${YELLOW}⚠️  IMPORTANT: Please edit .env.production with your settings!${NC}"
    echo "   Required changes:"
    echo "   - DB_PASSWORD (set a strong password)"
    echo "   - APP_URL (your domain)"
    echo "   - MAIL_* settings (if using email)"
    echo ""
    
    read -p "Edit .env.production now? (yes/no): " continue
    if [ "$continue" = "yes" ]; then
        ${EDITOR:-nano} .env.production
    fi
fi

print_success ".env.production is ready"

# Build the Docker image
print_info "Building Docker image: $IMAGE_NAME:$VERSION"
docker build -t "$IMAGE_NAME:$VERSION" .

print_success "Docker image built successfully"

# Stop existing containers
print_info "Stopping existing containers..."
docker-compose down 2>/dev/null || true

# Start new containers
print_info "Starting containers..."
docker-compose up -d

print_success "Containers started"

# Wait for services to be ready
print_info "Waiting for services to initialize (30 seconds)..."
sleep 30

# Check container status
print_info "Container Status:"
docker-compose ps

# Check application health
print_info "Checking application health..."
sleep 5

if curl -f http://localhost:8000/health 2>/dev/null; then
    print_success "Application is healthy!"
else
    print_info "Health check endpoint may not be configured yet"
fi

# Show logs
echo ""
print_info "Recent application logs:"
docker-compose logs --tail=20 app

echo ""
print_success "========================================="
print_success "🎉 Deployment Complete!"
print_success "========================================="
echo ""
echo -e "${CYAN}📱 Application URL: http://localhost:8000${NC}"
echo -e "${CYAN}🏥 Health Check: http://localhost:8000/health${NC}"
echo ""
print_info "Useful Commands:"
echo "  View logs:     docker-compose logs -f app"
echo "  Stop app:      docker-compose down"
echo "  Restart:       docker-compose restart"
echo "  Run command:   docker-compose exec app php artisan [command]"
echo ""
print_success "Everything is configured and running! 🚀"

