# Digivarsity Unified Education Platform - Project Structure

## Complete Folder Tree

```
digivarsity/
├── app/
│   ├── Helpers/
│   │   └── ApiResponse.php                    # Unified JSON response helper
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/
│   │   │       └── V1/
│   │   │           ├── AuthController.php     # Login, logout, me
│   │   │           ├── ProgramController.php  # Public program endpoints
│   │   │           ├── IntentController.php   # Public intent endpoints
│   │   │           ├── OutcomeController.php  # Public outcome endpoints
│   │   │           ├── UniversityController.php
│   │   │           ├── TestimonialController.php
│   │   │           ├── LeadController.php     # Public lead submission
│   │   │           └── Admin/
│   │   │               ├── DashboardController.php
│   │   │               ├── ProgramController.php
│   │   │               ├── IntentController.php
│   │   │               ├── OutcomeController.php
│   │   │               ├── UniversityController.php
│   │   │               ├── TestimonialController.php
│   │   │               ├── LeadController.php
│   │   │               └── UserController.php
│   │   ├── Middleware/
│   │   │   ├── CheckRole.php                  # Role-based middleware
│   │   │   └── CheckPermission.php            # Permission-based middleware
│   │   ├── Requests/
│   │   │   ├── LoginRequest.php
│   │   │   ├── StoreProgramRequest.php
│   │   │   ├── UpdateProgramRequest.php
│   │   │   ├── StoreIntentRequest.php
│   │   │   ├── UpdateIntentRequest.php
│   │   │   ├── StoreOutcomeRequest.php
│   │   │   ├── UpdateOutcomeRequest.php
│   │   │   ├── StoreUniversityRequest.php
│   │   │   ├── UpdateUniversityRequest.php
│   │   │   ├── StoreTestimonialRequest.php
│   │   │   ├── UpdateTestimonialRequest.php
│   │   │   ├── StoreLeadRequest.php
│   │   │   ├── StoreUserRequest.php
│   │   │   ├── UpdateUserRequest.php
│   │   │   ├── AssignRoleRequest.php
│   │   │   ├── MapIntentsRequest.php
│   │   │   └── MapOutcomesRequest.php
│   │   └── Resources/
│   │       ├── ProgramResource.php
│   │       ├── IntentResource.php
│   │       ├── OutcomeResource.php
│   │       ├── UniversityResource.php
│   │       ├── TestimonialResource.php
│   │       ├── LeadResource.php
│   │       ├── UserResource.php
│   │       ├── RoleResource.php
│   │       └── PermissionResource.php
│   ├── Models/
│   │   ├── User.php                           # With RBAC relationships
│   │   ├── Role.php
│   │   ├── Permission.php
│   │   ├── Program.php
│   │   ├── Intent.php
│   │   ├── Outcome.php
│   │   ├── University.php
│   │   ├── Testimonial.php
│   │   └── Lead.php
│   ├── Repositories/
│   │   ├── ProgramRepository.php
│   │   ├── IntentRepository.php
│   │   ├── OutcomeRepository.php
│   │   ├── UniversityRepository.php
│   │   ├── TestimonialRepository.php
│   │   ├── LeadRepository.php
│   │   ├── UserRepository.php
│   │   └── RoleRepository.php
│   └── Services/
│       ├── AuthService.php
│       ├── ProgramService.php                 # With Redis caching
│       ├── IntentService.php                  # With Redis caching
│       ├── OutcomeService.php                 # With Redis caching
│       ├── UniversityService.php              # With Redis caching
│       ├── TestimonialService.php
│       ├── LeadService.php
│       └── UserService.php
├── bootstrap/
│   └── app.php                                # Middleware aliases configured
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   └── ...
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000001_create_roles_table.php
│   │   ├── 2024_01_01_000002_create_permissions_table.php
│   │   ├── 2024_01_01_000003_create_role_user_table.php
│   │   ├── 2024_01_01_000004_create_permission_role_table.php
│   │   ├── 2024_01_01_000005_add_sanctum_to_users_table.php
│   │   ├── 2024_01_02_000001_create_universities_table.php
│   │   ├── 2024_01_02_000002_create_intents_table.php
│   │   ├── 2024_01_02_000003_create_outcomes_table.php
│   │   ├── 2024_01_02_000004_create_programs_table.php
│   │   ├── 2024_01_02_000005_create_program_intent_map_table.php
│   │   ├── 2024_01_02_000006_create_program_outcome_map_table.php
│   │   ├── 2024_01_03_000001_create_testimonials_table.php
│   │   └── 2024_01_03_000002_create_leads_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── RoleSeeder.php
│       ├── PermissionSeeder.php
│       ├── RolePermissionSeeder.php
│       └── AdminUserSeeder.php
├── routes/
│   ├── api.php                                # All API v1 routes
│   ├── web.php
│   └── console.php
├── .env                                       # Redis cache configured
├── composer.json                              # Laravel Sanctum added
├── Digivarsity_API_Collection.postman_collection.json
├── INSTALLATION.md
├── PROJECT_STRUCTURE.md
└── README.md

```

## Architecture Overview

### 1. Clean Architecture Layers

```
Controllers → Services → Repositories → Models → Database
```

- **Controllers**: Handle HTTP requests/responses
- **Services**: Business logic and caching
- **Repositories**: Database queries
- **Models**: Eloquent ORM models with relationships

### 2. RBAC System

```
User → Role → Permission
```

- Many-to-many relationships
- Middleware for role and permission checks
- Seeders for default roles and permissions

### 3. API Versioning

All routes are versioned under `/api/v1/`

### 4. Caching Strategy

- Redis caching for:
  - Programs list and details
  - Intents list
  - Outcomes list
  - Universities list
  - Intent-to-programs mapping
  - Outcome-to-programs mapping

### 5. Authentication

- Laravel Sanctum for token-based authentication
- Bearer token in Authorization header
- Token generated on login, revoked on logout

## Key Features

### ✅ API-Only Mode
- No web routes used
- All responses in JSON format
- Unified response structure

### ✅ Role-Based Access Control
- Admin: Full access
- Counselor: View leads, programs, dashboard
- User: Public endpoints only

### ✅ Permission System
- Granular permissions for each action
- Middleware-based authorization
- Easily extensible

### ✅ Redis Caching
- 1-hour cache TTL
- Automatic cache invalidation on updates
- Improved performance

### ✅ Request Validation
- FormRequest classes for all inputs
- Automatic validation errors in JSON
- Type-safe data handling

### ✅ API Resources
- Consistent data transformation
- Relationship loading control
- Clean JSON output

### ✅ Repository Pattern
- Separation of concerns
- Testable code
- Easy to mock for testing

### ✅ Service Layer
- Business logic isolation
- Reusable across controllers
- Cache management

## Module Breakdown

### Auth Module
- Login with email/password
- Token generation
- Logout (token revocation)
- Get current user

### Program Module
- CRUD operations (admin only)
- Public listing with filters
- Intent/Outcome mapping
- University relationship

### Intent Module
- CRUD operations (admin only)
- Public listing
- Programs by intent

### Outcome Module
- CRUD operations (admin only)
- Public listing
- Programs by outcome

### University Module
- CRUD operations (admin only)
- Public listing

### Testimonial Module
- CRUD operations (admin only)
- Public listing by program

### Lead Module
- Public submission
- Admin/Counselor viewing
- Dashboard statistics

### Dashboard Module
- Total counts
- Leads per program/intent/outcome
- Status breakdown

### User Management Module
- Create users (admin only)
- Update users (admin only)
- Assign roles (admin only)

## Security Features

1. **Authentication**: Sanctum token-based
2. **Authorization**: Role and permission middleware
3. **Validation**: FormRequest classes
4. **SQL Injection**: Eloquent ORM protection
5. **XSS**: JSON responses (no HTML)
6. **CSRF**: Not needed for API-only
7. **Rate Limiting**: Laravel default (can be configured)

## Performance Optimizations

1. **Redis Caching**: Reduces database queries
2. **Eager Loading**: Prevents N+1 queries
3. **Pagination**: For large datasets
4. **API Resources**: Efficient data transformation
5. **Query Optimization**: Repository pattern

## Testing Strategy

1. **Unit Tests**: Services and repositories
2. **Feature Tests**: API endpoints
3. **Integration Tests**: Full workflows
4. **Postman Collection**: Manual testing

## Scalability Considerations

1. **Stateless API**: Easy horizontal scaling
2. **Redis Cache**: Shared across instances
3. **Database Indexing**: On foreign keys
4. **Queue System**: For async operations (future)
5. **CDN**: For static assets (future)

## Future Enhancements

1. Email notifications for leads
2. File upload for testimonial images
3. Advanced search and filtering
4. Analytics and reporting
5. Webhook integrations
6. API rate limiting per user
7. Two-factor authentication
8. Password reset functionality
9. User profile management
10. Audit logging
