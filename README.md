# Digivarsity Unified Education Platform

## 🎓 Overview

A complete, production-ready **Laravel 11 API-only backend** for the Digivarsity Unified Education Platform. This system provides a robust foundation for managing educational programs, student intents, career outcomes, universities, testimonials, and lead generation.

## ✨ Key Features

- ✅ **API-Only Architecture** - Pure JSON API with versioning (`/api/v1`)
- ✅ **Laravel Sanctum Authentication** - Token-based auth for secure access
- ✅ **Complete RBAC System** - Roles (Admin, Counselor, User) with granular permissions
- ✅ **Redis Caching** - High-performance caching for programs, intents, outcomes
- ✅ **Clean Architecture** - Controllers → Services → Repositories → Models
- ✅ **Request Validation** - FormRequest classes for all inputs
- ✅ **API Resources** - Consistent JSON transformation
- ✅ **Postman Collection** - Ready-to-use API testing collection
- ✅ **Modular Design** - Reusable for web, mobile, PWA frontends

## 🏗️ Architecture

```
┌─────────────┐
│  Frontend   │  (Web, Mobile, PWA)
└──────┬──────┘
       │ HTTP/JSON
┌──────▼──────────────────────────────┐
│     Laravel 11 API Backend          │
│  ┌────────────────────────────────┐ │
│  │  Controllers (API/V1)          │ │
│  └────────┬───────────────────────┘ │
│  ┌────────▼───────────────────────┐ │
│  │  Services (Business Logic)     │ │
│  └────────┬───────────────────────┘ │
│  ┌────────▼───────────────────────┐ │
│  │  Repositories (Data Access)    │ │
│  └────────┬───────────────────────┘ │
│  ┌────────▼───────────────────────┐ │
│  │  Models (Eloquent ORM)         │ │
│  └────────┬───────────────────────┘ │
└───────────┼─────────────────────────┘
            │
    ┌───────▼────────┐    ┌──────────┐
    │  MySQL Database│    │  Redis   │
    └────────────────┘    └──────────┘
```

## 📦 Modules

### 1. Authentication & RBAC
- Login/Logout with Sanctum tokens
- Role-based access control (Admin, Counselor, User)
- Permission-based authorization
- User management

### 2. Program Management
- CRUD operations for educational programs
- Program types: Online, ODL, Work-Linked, Executive
- University relationships
- Intent and Outcome mapping

### 3. Intent System
- Student learning intents (Career Advancement, Skill Development, etc.)
- Intent-to-program mapping
- Public and admin endpoints

### 4. Outcome System
- Career outcomes (Leadership Role, Salary Increase, etc.)
- Outcome-to-program mapping
- Public and admin endpoints

### 5. University Management
- University CRUD operations
- Program relationships
- Public listing

### 6. Testimonial System
- Student success stories
- Program-specific testimonials
- Admin management

### 7. Lead Management
- Public lead submission
- Lead tracking and status management
- Admin/Counselor access

### 8. Dashboard & Analytics
- Total counts (programs, intents, outcomes, leads)
- Leads per program/intent/outcome
- Status breakdown

## 🚀 Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 8.0+
- Redis

### Installation

```bash
# 1. Install dependencies
composer install

# 2. Configure environment
# Edit .env file with your database credentials

# 3. Create database
mysql -u root -p
CREATE DATABASE digivarsity;
EXIT;

# 4. Run migrations
php artisan migrate

# 5. Seed database (creates admin user and RBAC)
php artisan db:seed

# 6. Start Redis
redis-server

# 7. Start development server
php artisan serve
```

### Default Credentials

**Admin User:**
- Email: `admin@digivarsity.com`
- Password: `password`

**Counselor User:**
- Email: `counselor@digivarsity.com`
- Password: `password`

## 📡 API Endpoints

### Public Endpoints (No Auth)

```
POST   /api/v1/auth/login
GET    /api/v1/programs
GET    /api/v1/programs/{id}
GET    /api/v1/intents
GET    /api/v1/intents/{id}/programs
GET    /api/v1/outcomes
GET    /api/v1/outcomes/{id}/programs
GET    /api/v1/universities
GET    /api/v1/programs/{id}/testimonials
POST   /api/v1/leads
```

### Protected Endpoints (Auth Required)

```
POST   /api/v1/auth/logout
GET    /api/v1/auth/me
GET    /api/v1/admin/dashboard
GET    /api/v1/admin/leads
```

### Admin-Only Endpoints

```
# Programs
POST   /api/v1/admin/programs
PUT    /api/v1/admin/programs/{id}
DELETE /api/v1/admin/programs/{id}
POST   /api/v1/admin/programs/{id}/map-intents
POST   /api/v1/admin/programs/{id}/map-outcomes

# Intents
POST   /api/v1/admin/intents
PUT    /api/v1/admin/intents/{id}
DELETE /api/v1/admin/intents/{id}

# Outcomes
POST   /api/v1/admin/outcomes
PUT    /api/v1/admin/outcomes/{id}
DELETE /api/v1/admin/outcomes/{id}

# Universities
POST   /api/v1/admin/universities
PUT    /api/v1/admin/universities/{id}
DELETE /api/v1/admin/universities/{id}

# Testimonials
POST   /api/v1/admin/testimonials
PUT    /api/v1/admin/testimonials/{id}
DELETE /api/v1/admin/testimonials/{id}

# Users
POST   /api/v1/admin/users
PUT    /api/v1/admin/users/{id}
POST   /api/v1/admin/users/{id}/assign-role
```

## 🔐 Authentication

All protected endpoints require a Bearer token:

```bash
# 1. Login to get token
curl -X POST http://localhost:8000/api/v1/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@digivarsity.com","password":"password"}'

# 2. Use token in subsequent requests
curl -X GET http://localhost:8000/api/v1/admin/dashboard \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

## 📋 Response Format

### Success Response
```json
{
    "success": true,
    "message": "Operation successful",
    "data": {
        // Response data
    }
}
```

### Error Response
```json
{
    "success": false,
    "message": "Error message",
    "errors": {
        // Validation errors (if any)
    }
}
```

## 🧪 Testing

### Using Postman

1. Import `Digivarsity_API_Collection.postman_collection.json`
2. Set base URL: `http://localhost:8000/api/v1`
3. Login to get auth token (automatically saved)
4. Test all endpoints

### Manual Testing

```bash
# Test public endpoint
curl http://localhost:8000/api/v1/programs

# Test login
curl -X POST http://localhost:8000/api/v1/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@digivarsity.com","password":"password"}'

# Test protected endpoint
curl http://localhost:8000/api/v1/admin/dashboard \
  -H "Authorization: Bearer YOUR_TOKEN"
```

## 🎯 Roles & Permissions

### Admin Role
- Full system access
- Can manage all resources
- Can create/update/delete users
- Can assign roles

### Counselor Role
- View dashboard
- View and manage leads
- View programs

### User Role
- Access public endpoints only
- Submit leads

## 🗂️ Database Schema

### Core Tables
- `users` - User accounts
- `roles` - System roles
- `permissions` - Granular permissions
- `role_user` - User-role relationships
- `permission_role` - Role-permission relationships

### Business Tables
- `universities` - Educational institutions
- `programs` - Educational programs
- `intents` - Student learning intents
- `outcomes` - Career outcomes
- `program_intent_map` - Program-intent relationships
- `program_outcome_map` - Program-outcome relationships
- `testimonials` - Student testimonials
- `leads` - Lead submissions

## 🚀 Production Deployment

1. Set environment variables:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

2. Optimize Laravel:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. Set up Redis for production
4. Configure queue workers
5. Set up SSL certificate
6. Configure CORS if needed

## 📚 Documentation

- [Installation Guide](INSTALLATION.md)
- [Project Structure](PROJECT_STRUCTURE.md)
- [Postman Collection](Digivarsity_API_Collection.postman_collection.json)

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Authentication**: Laravel Sanctum
- **Database**: MySQL 8.0
- **Cache**: Redis
- **PHP**: 8.2+
- **Architecture**: Repository + Service Pattern

## 📝 License

This project is proprietary software for Digivarsity.

## 👥 Support

For technical support or questions, contact the development team.

---

**Built with ❤️ for Digivarsity**
