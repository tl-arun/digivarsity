# Digivarisity 3.0 - System Architecture

## 🏗️ High-Level Architecture

```
┌─────────────────────────────────────────────────────────────────────┐
│                          CLIENT LAYER                                │
├─────────────────────────────────────────────────────────────────────┤
│  Web Browser (Port 8000)                                             │
│  ├─ Public Pages (Home, Programs, Contact, Career Quiz)             │
│  ├─ Journey Pages (Learning, Career, Professional)                  │
│  ├─ Admin Dashboard (Protected)                                     │
│  └─ Chatbot Interface                                               │
└─────────────────────────────────────────────────────────────────────┘
                              ↓ HTTP/HTTPS
┌─────────────────────────────────────────────────────────────────────┐
│                      DOCKER CONTAINER (app)                          │
├─────────────────────────────────────────────────────────────────────┤
│  ┌──────────────────────────────────────────────────────────────┐  │
│  │                    NGINX (Port 80)                            │  │
│  │  - Reverse Proxy                                              │  │
│  │  - Static File Serving                                        │  │
│  │  - Request Routing                                            │  │
│  └──────────────────────────────────────────────────────────────┘  │
│                              ↓                                       │
│  ┌──────────────────────────────────────────────────────────────┐  │
│  │                 PHP-FPM 8.2 (Port 9000)                       │  │
│  │  - FastCGI Process Manager                                    │  │
│  │  - PHP Script Execution                                       │  │
│  └──────────────────────────────────────────────────────────────┘  │
│                              ↓                                       │
│  ┌──────────────────────────────────────────────────────────────┐  │
│  │              LARAVEL 11 APPLICATION                           │  │
│  │  ┌────────────────────────────────────────────────────────┐  │  │
│  │  │  ROUTING LAYER                                          │  │  │
│  │  │  ├─ Web Routes (routes/web.php)                        │  │  │
│  │  │  └─ API Routes (routes/api.php)                        │  │  │
│  │  └────────────────────────────────────────────────────────┘  │  │
│  │  ┌────────────────────────────────────────────────────────┐  │  │
│  │  │  MIDDLEWARE LAYER                                       │  │  │
│  │  │  ├─ Authentication (Sanctum)                           │  │  │
│  │  │  ├─ Role-Based Access Control                          │  │  │
│  │  │  └─ CORS, Throttling, etc.                            │  │  │
│  │  └────────────────────────────────────────────────────────┘  │  │
│  │  ┌────────────────────────────────────────────────────────┐  │  │
│  │  │  CONTROLLER LAYER                                       │  │  │
│  │  │  ├─ Web Controllers                                     │  │  │
│  │  │  │  ├─ HomeController                                  │  │  │
│  │  │  │  ├─ DashboardController                             │  │  │
│  │  │  │  └─ Admin Controllers                               │  │  │
│  │  │  └─ API Controllers (v1)                               │  │  │
│  │  │     ├─ AuthController                                  │  │  │
│  │  │     ├─ ProgramController                               │  │  │
│  │  │     ├─ IntentController                                │  │  │
│  │  │     ├─ OutcomeController                               │  │  │
│  │  │     ├─ UniversityController                            │  │  │
│  │  │     ├─ TestimonialController                           │  │  │
│  │  │     ├─ LeadController                                  │  │  │
│  │  │     ├─ ResumeAnalysisController                        │  │  │
│  │  │     └─ ChatbotController                               │  │  │
│  │  └────────────────────────────────────────────────────────┘  │  │
│  │  ┌────────────────────────────────────────────────────────┐  │  │
│  │  │  MODEL LAYER (Eloquent ORM)                            │  │  │
│  │  │  ├─ User                                               │  │  │
│  │  │  ├─ Role & Permission                                  │  │  │
│  │  │  ├─ Program                                            │  │  │
│  │  │  ├─ Intent                                             │  │  │
│  │  │  ├─ Outcome                                            │  │  │
│  │  │  ├─ University                                         │  │  │
│  │  │  ├─ Testimonial                                        │  │  │
│  │  │  ├─ Lead                                               │  │  │
│  │  │  ├─ ResumeAnalysis                                     │  │  │
│  │  │  ├─ HeroBackground                                     │  │  │
│  │  │  └─ HomePageSetting                                    │  │  │
│  │  └────────────────────────────────────────────────────────┘  │  │
│  │  ┌────────────────────────────────────────────────────────┐  │  │
│  │  │  SERVICES & UTILITIES                                   │  │  │
│  │  │  ├─ Laravel Scheduler (Background Jobs)               │  │  │
│  │  │  ├─ Queue System                                       │  │  │
│  │  │  └─ File Storage                                       │  │  │
│  │  └────────────────────────────────────────────────────────┘  │  │
│  └──────────────────────────────────────────────────────────────┘  │
└─────────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────────┐
│                      EXTERNAL SERVICES                               │
├─────────────────────────────────────────────────────────────────────┤
│  ┌──────────────────────┐  ┌──────────────────────┐                │
│  │  XAMPP MySQL         │  │  Redis Container     │                │
│  │  (Port 3307)         │  │  (Port 6379)         │                │
│  │  ├─ digivarsity DB   │  │  ├─ Cache           │                │
│  │  ├─ Users            │  │  ├─ Sessions        │                │
│  │  ├─ Programs         │  │  └─ Queue           │                │
│  │  ├─ Intents          │  └──────────────────────┘                │
│  │  ├─ Outcomes         │                                           │
│  │  ├─ Universities     │                                           │
│  │  ├─ Testimonials     │                                           │
│  │  └─ Leads            │                                           │
│  └──────────────────────┘                                           │
└─────────────────────────────────────────────────────────────────────┘
```

## 📊 Data Flow Architecture

### Public User Flow
```
User Browser
    ↓
Nginx (Port 8000)
    ↓
PHP-FPM
    ↓
Laravel Router
    ↓
HomeController / Public API
    ↓
Eloquent Models
    ↓
MySQL Database (via host.docker.internal:3307)
    ↓
Response → User
```

### Admin User Flow
```
Admin Browser
    ↓
Nginx (Port 8000)
    ↓
PHP-FPM
    ↓
Laravel Router
    ↓
Auth Middleware (Sanctum)
    ↓
Role Middleware (admin/counselor)
    ↓
Admin Controllers
    ↓
Eloquent Models
    ↓
MySQL Database
    ↓
Response → Admin
```

### Chatbot Flow
```
User → Chatbot Interface
    ↓
POST /api/v1/chatbot/chat
    ↓
ChatbotController
    ↓
AI Processing Logic
    ↓
Program/Intent/Outcome Models
    ↓
Response with Recommendations
```

### Resume Analysis Flow
```
User → Upload Resume
    ↓
POST /api/v1/resume/upload
    ↓
ResumeAnalysisController
    ↓
File Storage (public/uploads)
    ↓
Analysis Processing
    ↓
ResumeAnalysis Model → Database
    ↓
POST /api/v1/resume/{id}/preferences
    ↓
Update Preferences
    ↓
Program Recommendations
```

## 🗄️ Database Schema

### Core Tables
```
users
├─ id, name, email, password
├─ role_id (FK → roles)
└─ timestamps

roles
├─ id, name (admin, counselor, user)
└─ timestamps

programs
├─ id, name, description, duration
├─ university_id (FK → universities)
├─ fees, eligibility, highlights
└─ timestamps

intents (User Goals)
├─ id, name, description, icon
└─ timestamps

outcomes (Career Outcomes)
├─ id, name, description, icon
└─ timestamps

program_intent (Pivot)
├─ program_id, intent_id

program_outcome (Pivot)
├─ program_id, outcome_id

universities
├─ id, name, logo, location
├─ description, website
└─ timestamps

testimonials
├─ id, name, program_id
├─ content, rating, image
└─ timestamps

leads
├─ id, name, email, phone
├─ program_id, status
└─ timestamps

resume_analyses
├─ id, file_path, analysis_data
├─ preferences, recommendations
└─ timestamps

hero_backgrounds
├─ id, image_url, title
├─ subtitle, is_active, order
└─ timestamps

home_page_settings
├─ id, key, value
└─ timestamps
```

## 🔐 Authentication & Authorization

### Authentication Flow (Laravel Sanctum)
```
1. User Login
   POST /api/v1/auth/login
   ↓
2. Validate Credentials
   ↓
3. Generate Token
   ↓
4. Return Token to Client
   ↓
5. Client Stores Token
   ↓
6. Subsequent Requests
   Header: Authorization: Bearer {token}
   ↓
7. Sanctum Middleware Validates
   ↓
8. Access Granted/Denied
```

### Role-Based Access Control
```
Public Routes (No Auth)
├─ Home, Programs, Contact
├─ Career Quiz, Chatbot
├─ Journey Pages
└─ Public API Endpoints

Authenticated Routes
├─ User Dashboard
└─ Profile Management

Admin/Counselor Routes
├─ Dashboard Analytics
└─ Lead Management

Admin-Only Routes
├─ User Management
├─ Program CRUD
├─ Intent/Outcome Management
├─ University Management
├─ Testimonial Management
└─ Home Page Settings
```

## 🐳 Docker Architecture

### Container Structure
```
Docker Compose Network: digivarisity_network
│
├─ app (digivarisity_app)
│  ├─ Base: php:8.2-fpm-alpine
│  ├─ Nginx (Port 80 → Host 8000)
│  ├─ PHP-FPM (Port 9000)
│  ├─ Laravel Application
│  ├─ Composer Dependencies
│  ├─ PHP Extensions: Redis, PDO, GD, etc.
│  └─ Volumes:
│     ├─ ./storage → /var/www/html/storage
│     ├─ ./public/storage → /var/www/html/public/storage
│     └─ ./.env → /var/www/html/.env
│
└─ redis (digivarisity_redis)
   ├─ Base: redis:7-alpine
   ├─ Port: 6379 → Host 6379
   └─ Health Check: redis-cli ping

External (Host)
└─ XAMPP MySQL
   ├─ Port: 3307
   ├─ Database: digivarsity
   └─ Access: host.docker.internal:3307
```

### Build Process
```
1. Dockerfile
   ├─ Install system dependencies (Alpine packages)
   ├─ Install PHP extensions
   ├─ Install Redis extension (PECL)
   ├─ Copy Composer
   ├─ Copy application files
   ├─ Run composer install
   ├─ Set permissions
   └─ Copy start script

2. Start Script (docs/start.sh)
   ├─ Start PHP-FPM daemon
   ├─ Start Laravel Scheduler
   └─ Start Nginx (foreground)

3. Docker Compose
   ├─ Build app container
   ├─ Start Redis container
   ├─ Configure networking
   ├─ Map ports
   └─ Mount volumes
```

## 🔄 Request Lifecycle

### Web Request
```
1. Browser → http://localhost:8000/programs
2. Nginx receives request
3. Nginx routes to PHP-FPM
4. PHP-FPM executes Laravel
5. Laravel Router matches route
6. HomeController@programs
7. Program::all() → MySQL query
8. Redis cache check
9. View rendering (Blade)
10. Response → Nginx → Browser
```

### API Request
```
1. Client → POST /api/v1/leads
2. Nginx → PHP-FPM
3. Laravel API Router
4. Middleware: CORS, Throttle
5. LeadController@store
6. Validation
7. Lead::create() → MySQL
8. JSON Response
9. Status 201 Created
```

## 📦 Key Components

### Frontend Stack
- Blade Templates (Server-side rendering)
- Tailwind CSS (Styling)
- Alpine.js / Vanilla JS (Interactivity)
- Vite (Asset bundling)

### Backend Stack
- Laravel 11 (PHP Framework)
- PHP 8.2
- Eloquent ORM (Database)
- Laravel Sanctum (API Auth)
- Laravel Scheduler (Cron jobs)

### Infrastructure
- Docker (Containerization)
- Nginx (Web server)
- PHP-FPM (Process manager)
- Redis (Cache/Queue/Sessions)
- MySQL (Database)

### Development Tools
- Composer (PHP dependencies)
- NPM (JS dependencies)
- Laravel Pint (Code formatting)
- Laravel Pail (Log viewer)

## 🚀 Deployment Flow

```
Development
├─ Local XAMPP MySQL
├─ Docker containers
└─ .env (local config)

Production
├─ External MySQL
├─ Docker containers
├─ .env.production
└─ CI/CD Pipeline (.gitlab-ci.yml)
```

## 📈 Scalability Considerations

### Current Architecture
- Single container application
- External MySQL (XAMPP)
- Redis for caching
- File-based storage

### Future Enhancements
- Load balancer (multiple app containers)
- Separate database container
- S3/Cloud storage for files
- Queue workers (separate containers)
- CDN for static assets
- Horizontal scaling with Kubernetes
