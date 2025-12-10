# Digivarsity - Technical Documentation

## Project Overview

**Project Name**: Digivarsity - Online Education Platform  
**Version**: 3.0  
**Last Updated**: December 5, 2024  
**Document Type**: Technical Specification & Deployment Guide

---

## Table of Contents

1. [Application Tech Stack](#1-application-tech-stack)
2. [System Architecture](#2-system-architecture)
3. [Deployment Environment](#3-deployment-environment)
4. [Access & Permissions](#4-access--permissions)
5. [Infrastructure Dependencies](#5-infrastructure-dependencies)
6. [Scalability & Load Requirements](#6-scalability--load-requirements)
7ployment Guide](#7-deployment-guide)
8. [Maintenance & Monitoring](#8-maintenance--monitoring)

---

## 1. Application Tech Stack

### 1.1 Backend Technologies

#### Core Framework
- **Laravel 11.x** (PHP Framework)
  - MVC Architecture
  - RESTful API
  - Eloquent ORM
  - Blade Templating Engine

#### Programming Language
- **PHP 8.2+**
  - Modern PHP features
  - Type declarations
  - Attributes support

#### Database
- **MySQL 8.0+** / **MariaDB 10.6+**
  - Relational database
  - InnoDB engine
  - Full-text search support
  - JSON column support

#### Authentication & Security
- **Laravel Sanctum**
  - API token authentication
  - SPA authentication
  - Mobile app authentication
- **Laravel Middleware**
  - Role-based access control (RBAC)
  - CSRF protection
  - XSS protection

#### File Storage
- **Laravel Storage**
  - Local filesystem
  - Public disk for uploads
  - Symbolic link for public access

#### Caching
- **Redis** (Optional)
  - Session storage
  - Cache storage
  - Queue management
- **File Cache** (Default)
  - Fallback option
  - No additional setup required

### 1.2 Frontend Technologies

#### Core Technologies
- **HTML5**
  - Semantic markup
  - Accessibility features
  - SEO optimized

- **CSS3**
  - Modern layouts (Flexbox, Grid)
  - Animations & transitions
  - Responsive design

- **JavaScript (ES6+)**
  - Async/await
  - Fetch API
  - Modern DOM manipulation

#### CSS Framework
- **Tailwind CSS 3.x**
  - Utility-first CSS
  - Responsive design
  - Custom color palette
  - JIT (Just-In-Time) compilation

#### Icons & Fonts
- **Font Awesome 6.4**
  - Icon library
  - 1000+ icons
- **Google Fonts (Inter)**
  - Modern typography
  - Variable font weights

#### Build Tools
- **Vite 5.x**
  - Fast HMR (Hot Module Replacement)
  - Asset bundling
  - CSS preprocessing
  - JavaScript minification

### 1.3 Additional Libraries

#### Backend Packages
```json
{
  "guzzlehttp/guzzle": "^7.8",
  "laravel/sanctum": "^4.0",
  "laravel/tinker": "^2.9"
}
```

#### Frontend Packages
```json
{
  "tailwindcss": "^3.4",
  "autoprefixer": "^10.4",
  "postcss": "^8.4"
}
```

---

## 2. System Architecture

### 2.1 Architecture Pattern

**MVC (Model-View-Controller) + Repository Pattern**

```
┌─────────────────────────────────────────────────────────┐
│                    Client Layer                          │
│  (Browser, Mobile App, Third-party Integrations)        │
└────────────────────┬────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────┐
│                 Presentation Layer                       │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐ │
│  │   Web UI     │  │   REST API   │  │   Admin UI   │ │
│  │  (Blade)     │  │   (JSON)     │  │   (Blade)    │ │
│  └──────────────┘  └──────────────┘  └──────────────┘ │
└────────────────────┬────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────┐
│                 Application Layer                        │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐ │
│  │ Controllers  │  │  Services    │  │ Middleware   │ │
│  │              │  │              │  │              │ │
│  └──────────────┘  └──────────────┘  └──────────────┘ │
└────────────────────┬────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────┐
│                  Business Layer                          │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐ │
│  │ Repositories │  │   Models     │  │  Resources   │ │
│  │              │  │              │  │              │ │
│  └──────────────┘  └──────────────┘  └──────────────┘ │
└────────────────────┬────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────┐
│                   Data Layer                             │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐ │
│  │   MySQL      │  │  File System │  │    Cache     │ │
│  │  Database    │  │   Storage    │  │   (Redis)    │ │
│  └──────────────┘  └──────────────┘  └──────────────┘ │
└─────────────────────────────────────────────────────────┘
```

### 2.2 Directory Structure

```
digivarsity/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/V1/          # API Controllers
│   │   │   └── Web/             # Web Controllers
│   │   ├── Middleware/          # Custom Middleware
│   │   └── Resources/           # API Resources
│   ├── Models/                  # Eloquent Models
│   ├── Repositories/            # Data Access Layer
│   ├── Services/                # Business Logic
│   └── Helpers/                 # Helper Functions
├── database/
│   ├── migrations/              # Database Migrations
│   └── seeders/                 # Database Seeders
├── public/
│   ├── uploads/                 # User Uploads
│   └── storage/                 # Symlink to storage
├── resources/
│   ├── views/                   # Blade Templates
│   ├── css/                     # Stylesheets
│   └── js/                      # JavaScript
├── routes/
│   ├── web.php                  # Web Routes
│   └── api.php                  # API Routes
├── storage/
│   ├── app/public/              # Public Files
│   └── logs/                    # Application Logs
└── tests/                       # Unit & Feature Tests
```

### 2.3 Database Schema

#### Core Tables
1. **users** - User accounts
2. **roles** - User roles (Admin, Counselor, Student)
3. **permissions** - Access permissions
4. **programs** - Educational programs
5. **universities** - Partner universities
6. **testimonials** - Student testimonials
7. **intents** - Career goals
8. **outcomes** - Career outcomes
9. **leads** - Prospective students
10. **hero_backgrounds** - Homepage backgrounds

#### Relationships
```
users ──┬── roles (many-to-many)
        └── leads (one-to-many)

programs ──┬── university (belongs-to)
           ├── intents (many-to-many)
           ├── outcomes (many-to-many)
           └── testimonials (one-to-many)

testimonials ── program (belongs-to)
```

---

## 3. Deployment Environment

### 3.1 Supported Environments

#### Option 1: Cloud Deployment (Recommended)

**AWS (Amazon Web Services)**
```
Services Required:
├── EC2 (Compute)
│   └── t3.medium or higher
├── RDS (Database)
│   └── MySQL 8.0
├── S3 (Storage)
│   └── For file uploads
├── CloudFront (CDN)
│   └── For static assets
├── Route 53 (DNS)
│   └── Domain management
└── Certificate Manager
    └── SSL/TLS certificates
```

**DigitalOcean**
```
Services Required:
├── Droplet (Compute)
│   └── 2GB RAM minimum
├── Managed Database
│   └── MySQL 8.0
├── Spaces (Storage)
│   └── For file uploads
└── Load Balancer
    └── For high availability
```

**Azure**
```
Services Required:
├── App Service
│   └── PHP 8.2 runtime
├── Azure Database for MySQL
│   └── MySQL 8.0
├── Blob Storage
│   └── For file uploads
└── CDN
    └── For static assets
```

#### Option 2: Local/On-Premise Deployment

**Server Requirements:**
```
Hardware:
├── CPU: 4 cores minimum
├── RAM: 8GB minimum (16GB recommended)
├── Storage: 100GB SSD
└── Network: 100Mbps minimum

Software:
├── Operating System
│   ├── Ubuntu 22.04 LTS (Recommended)
│   ├── CentOS 8+
│   └── Windows Server 2019+
├── Web Server
│   ├── Nginx 1.20+ (Recommended)
│   └── Apache 2.4+
├── PHP 8.2+
├── MySQL 8.0+ / MariaDB 10.6+
└── Composer 2.x
```

#### Option 3: Containerized Deployment (Docker)

**Docker Setup:**
```yaml
services:
  app:
    image: php:8.2-fpm
    volumes:
      - ./:/var/www/html
    
  nginx:
    image: nginx:alpine
    ports:
      - "80:80"
      - "443:443"
    
  mysql:
    image: mysql:8.0
    environment:
      MYSQL_DATABASE: digivarsity
      MYSQL_ROOT_PASSWORD: secret
    
  redis:
    image: redis:alpine
```

### 3.2 Environment Configuration

#### Production Environment
```env
APP_NAME=Digivarsity
APP_ENV=production
APP_DEBUG=false
APP_URL=https://digivarsity.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=digivarsity
DB_USERNAME=root
DB_PASSWORD=secure_password

CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

#### Staging Environment
```env
APP_ENV=staging
APP_DEBUG=true
APP_URL=https://staging.digivarsity.com
```

#### Development Environment
```env
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

---

## 4. Access & Permissions

### 4.1 User Roles & Permissions

#### Role Hierarchy
```
Super Admin (Full Access)
    │
    ├── Admin (Management Access)
    │   ├── Manage Programs
    │   ├── Manage Universities
    │   ├── Manage Testimonials
    │   ├── Manage Users
    │   ├── Manage Intents/Outcomes
    │   └── View Analytics
    │
    ├── Counselor (Limited Access)
    │   ├── View Programs
    │   ├── Manage Leads
    │   ├── View Dashboard
    │   └── Contact Students
    │
    └── Student (Public Access)
        ├── Browse Programs
        ├── Submit Inquiries
        └── View Content
```

#### Permission Matrix

| Feature | Super Admin | Admin | Counselor | Student |
|---------|-------------|-------|-----------|---------|
| Dashboard | ✅ | ✅ | ✅ | ❌ |
| Programs (CRUD) | ✅ | ✅ | 👁️ | 👁️ |
| Universities (CRUD) | ✅ | ✅ | ❌ | ❌ |
| Testimonials (CRUD) | ✅ | ✅ | ❌ | ❌ |
| Intents/Outcomes | ✅ | ✅ | ❌ | ❌ |
| Leads Management | ✅ | ✅ | ✅ | ❌ |
| User Management | ✅ | ✅ | ❌ | ❌ |
| Home Page Control | ✅ | ✅ | ❌ | ❌ |
| Analytics | ✅ | ✅ | 👁️ | ❌ |

Legend: ✅ Full Access | 👁️ Read Only | ❌ No Access

### 4.2 API Authentication

#### Token-Based Authentication (Laravel Sanctum)
```
Authentication Flow:
1. User logs in with credentials
2. Server generates API token
3. Token stored in localStorage
4. Token sent with each API request
5. Server validates token
6. Request processed or rejected
```

#### API Endpoints Security
```
Public Endpoints (No Auth):
├── GET /api/v1/programs
├── GET /api/v1/universities
├── GET /api/v1/testimonials
├── GET /api/v1/intents
├── GET /api/v1/outcomes
└── POST /api/v1/leads

Protected Endpoints (Auth Required):
├── POST /api/v1/admin/*
├── PUT /api/v1/admin/*
├── DELETE /api/v1/admin/*
└── GET /api/v1/auth/me
```

### 4.3 File System Permissions

#### Linux/Unix Permissions
```bash
# Application files
chmod -R 755 /var/www/digivarsity

# Storage directories (writable)
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Ownership
chown -R www-data:www-data /var/www/digivarsity
```

#### Windows Permissions
```
IIS_IUSRS - Read & Execute
IUSR - Read & Execute
storage/ - Full Control
bootstrap/cache/ - Full Control
```

---

## 5. Infrastructure Dependencies

### 5.1 Core Dependencies

#### Web Server Configuration

**Nginx Configuration:**
```nginx
server {
    listen 80;
    server_name digivarsity.com;
    root /var/www/digivarsity/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

**Apache Configuration (.htaccess):**
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

#### PHP Configuration

**php.ini Settings:**
```ini
memory_limit = 256M
upload_max_filesize = 20M
post_max_size = 20M
max_execution_time = 300
max_input_time = 300

; Extensions Required
extension=pdo_mysql
extension=mbstring
extension=xml
extension=ctype
extension=json
extension=tokenizer
extension=openssl
extension=fileinfo
extension=gd
```

#### Database Configuration

**MySQL Configuration (my.cnf):**
```ini
[mysqld]
max_connections = 200
innodb_buffer_pool_size = 1G
innodb_log_file_size = 256M
query_cache_size = 64M
tmp_table_size = 64M
max_heap_table_size = 64M
```

### 5.2 External Services

#### Email Service (Optional)
```
Options:
├── SMTP (Gmail, Outlook)
├── SendGrid
├── Mailgun
├── Amazon SES
└── Postmark
```

#### SMS Service (Optional)
```
Options:
├── Twilio
├── AWS SNS
├── Nexmo
└── MSG91
```

#### Payment Gateway (Future)
```
Options:
├── Razorpay
├── PayU
├── Stripe
└── PayPal
```

### 5.3 Monitoring & Logging

#### Application Monitoring
```
Tools:
├── Laravel Telescope (Development)
├── New Relic (Production)
├── Sentry (Error Tracking)
└── DataDog (Infrastructure)
```

#### Log Management
```
Logs Location:
├── storage/logs/laravel.log
├── /var/log/nginx/access.log
├── /var/log/nginx/error.log
└── /var/log/mysql/error.log
```

---

## 6. Scalability & Load Requirements

### 6.1 Expected Load

#### Current Capacity
```
Users:
├── Concurrent Users: 100-500
├── Daily Active Users: 1,000-5,000
├── Monthly Active Users: 10,000-50,000
└── Peak Load: 1,000 concurrent

Traffic:
├── Page Views/Day: 10,000-50,000
├── API Requests/Day: 50,000-200,000
├── Average Response Time: < 200ms
└── Peak Response Time: < 500ms

Data:
├── Database Size: 1-5 GB
├── File Storage: 10-50 GB
├── Daily Growth: 100-500 MB
└── Backup Size: 5-25 GB
```

#### Growth Projections (Year 1)
```
Users:
├── Concurrent Users: 500-2,000
├── Daily Active Users: 5,000-20,000
├── Monthly Active Users: 50,000-200,000
└── Peak Load: 5,000 concurrent

Traffic:
├── Page Views/Day: 50,000-200,000
├── API Requests/Day: 200,000-1,000,000
├── Average Response Time: < 200ms
└── Peak Response Time: < 500ms

Data:
├── Database Size: 5-20 GB
├── File Storage: 50-200 GB
├── Daily Growth: 500 MB - 2 GB
└── Backup Size: 25-100 GB
```

### 6.2 Scalability Strategy

#### Horizontal Scaling
```
Load Balancer
    │
    ├── App Server 1 (Primary)
    ├── App Server 2 (Secondary)
    └── App Server 3 (Tertiary)
    │
    ├── Database Master (Write)
    └── Database Slave (Read)
    │
    └── Redis Cluster
```

#### Vertical Scaling
```
Phase 1 (Current):
├── 2 CPU cores
├── 4 GB RAM
└── 50 GB SSD

Phase 2 (6 months):
├── 4 CPU cores
├── 8 GB RAM
└── 100 GB SSD

Phase 3 (12 months):
├── 8 CPU cores
├── 16 GB RAM
└── 200 GB SSD
```

#### Caching Strategy
```
Cache Layers:
├── Browser Cache (Static Assets)
│   └── TTL: 7 days
├── CDN Cache (Images, CSS, JS)
│   └── TTL: 30 days
├── Application Cache (Redis)
│   └── TTL: 1 hour
└── Database Query Cache
    └── TTL: 15 minutes
```

### 6.3 Performance Optimization

#### Database Optimization
```
Strategies:
├── Indexing
│   ├── Primary keys
│   ├── Foreign keys
│   └── Frequently queried columns
├── Query Optimization
│   ├── Eager loading
│   ├── Lazy loading
│   └── Query caching
└── Database Partitioning
    └── By date/region
```

#### Asset Optimization
```
Techniques:
├── Image Optimization
│   ├── WebP format
│   ├── Lazy loading
│   └── Responsive images
├── CSS/JS Minification
│   ├── Vite bundling
│   └── Tree shaking
└── CDN Distribution
    └── CloudFlare/CloudFront
```

---

## 7. Deployment Guide

### 7.1 Pre-Deployment Checklist

```
☐ Server provisioned and accessible
☐ Domain name configured
☐ SSL certificate obtained
☐ Database created
☐ PHP 8.2+ installed
☐ Composer installed
☐ Node.js & NPM installed
☐ Git installed
☐ Web server configured
☐ Firewall rules set
☐ Backup strategy defined
```

### 7.2 Deployment Steps

#### Step 1: Server Setup
```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install PHP 8.2
sudo apt install php8.2-fpm php8.2-mysql php8.2-mbstring \
  php8.2-xml php8.2-curl php8.2-zip php8.2-gd -y

# Install Nginx
sudo apt install nginx -y

# Install MySQL
sudo apt install mysql-server -y

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install nodejs -y
```

#### Step 2: Application Deployment
```bash
# Clone repository
cd /var/www
git clone https://github.com/your-repo/digivarsity.git
cd digivarsity

# Install dependencies
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Set permissions
sudo chown -R www-data:www-data /var/www/digivarsity
sudo chmod -R 775 storage bootstrap/cache

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate --force

# Link storage
php artisan storage:link

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### Step 3: Web Server Configuration
```bash
# Create Nginx config
sudo nano /etc/nginx/sites-available/digivarsity

# Enable site
sudo ln -s /etc/nginx/sites-available/digivarsity \
  /etc/nginx/sites-enabled/

# Test configuration
sudo nginx -t

# Restart Nginx
sudo systemctl restart nginx
```

#### Step 4: SSL Configuration
```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx -y

# Obtain certificate
sudo certbot --nginx -d digivarsity.com -d www.digivarsity.com

# Auto-renewal
sudo certbot renew --dry-run
```

### 7.3 Post-Deployment Tasks

```bash
# Verify installation
php artisan about

# Run health checks
php artisan health:check

# Monitor logs
tail -f storage/logs/laravel.log

# Test application
curl https://digivarsity.com
```

---

## 8. Maintenance & Monitoring

### 8.1 Regular Maintenance Tasks

#### Daily Tasks
```
☐ Monitor error logs
☐ Check disk space
☐ Review performance metrics
☐ Verify backup completion
```

#### Weekly Tasks
```
☐ Review security logs
☐ Update dependencies (if needed)
☐ Database optimization
☐ Clear old logs
```

#### Monthly Tasks
```
☐ Security audit
☐ Performance review
☐ Backup testing
☐ Capacity planning
```

### 8.2 Backup Strategy

#### Database Backup
```bash
# Daily backup
mysqldump -u root -p digivarsity > backup_$(date +%Y%m%d).sql

# Automated backup script
0 2 * * * /usr/local/bin/backup-database.sh
```

#### File Backup
```bash
# Backup uploads
tar -czf uploads_$(date +%Y%m%d).tar.gz storage/app/public/

# Automated backup
0 3 * * * /usr/local/bin/backup-files.sh
```

### 8.3 Monitoring Metrics

#### Key Performance Indicators
```
Application:
├── Response Time: < 200ms (avg)
├── Error Rate: < 0.1%
├── Uptime: > 99.9%
└── API Success Rate: > 99%

Server:
├── CPU Usage: < 70%
├── Memory Usage: < 80%
├── Disk Usage: < 80%
└── Network I/O: < 80%

Database:
├── Query Time: < 100ms (avg)
├── Connection Pool: < 80%
├── Slow Queries: < 1%
└── Replication Lag: < 1s
```

---

## 9. Security Considerations

### 9.1 Security Measures

```
Application Security:
├── HTTPS/SSL encryption
├── CSRF protection
├── XSS prevention
├── SQL injection prevention
├── Rate limiting
└── Input validation

Server Security:
├── Firewall (UFW/iptables)
├── SSH key authentication
├── Fail2ban
├── Regular updates
└── Security headers

Database Security:
├── Strong passwords
├── Limited user privileges
├── Encrypted connections
└── Regular backups
```

### 9.2 Compliance

```
Data Protection:
├── GDPR compliance (if applicable)
├── Data encryption at rest
├── Data encryption in transit
├── Privacy policy
└── Terms of service

Security Standards:
├── OWASP Top 10
├── PCI DSS (if payments)
└── ISO 27001 (optional)
```

---

## 10. Support & Documentation

### 10.1 Documentation Resources

```
Technical Docs:
├── TECHNICAL_DOCUMENTATION.md (This file)
├── API_DOCUMENTATION.md
├── COMPLETE_SETUP_GUIDE.md
├── TROUBLESHOOTING.md
└── QUICK_REFERENCE.md

User Guides:
├── ADMIN_UPLOAD_GUIDE.md
├── MODERN_UI_UPDATE.md
└── INTENT_OUTCOME_IMPLEMENTATION.md
```

### 10.2 Support Contacts

```
Technical Support:
├── Email: tech@digivarsity.com
├── Phone: +91-XXXXXXXXXX
└── Hours: 9 AM - 6 PM IST

Emergency Support:
├── On-call: 24/7
└── Response Time: < 1 hour
```

---

## Appendix

### A. Glossary

- **MVC**: Model-View-Controller architecture pattern
- **ORM**: Object-Relational Mapping
- **API**: Application Programming Interface
- **CRUD**: Create, Read, Update, Delete operations
- **CDN**: Content Delivery Network
- **SSL**: Secure Sockets Layer
- **RBAC**: Role-Based Access Control

### B. Version History

| Version | Date | Changes |
|---------|------|---------|
| 1.0 | Nov 2024 | Initial release |
| 2.0 | Dec 2024 | Modern UI update |
| 3.0 | Dec 2024 | Intent/Outcome implementation |

### C. Contact Information

**Project Team:**
- Project Manager: [Name]
- Lead Developer: [Name]
- DevOps Engineer: [Name]
- QA Lead: [Name]

---

**Document End**

*This document is confidential and proprietary to Digivarsity. Unauthorized distribution is prohibited.*

