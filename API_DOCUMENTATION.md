# Digivarsity API Documentation

## Base URL
```
http://localhost:8000/api/v1
```

## Authentication

All protected endpoints require a Bearer token in the Authorization header:

```
Authorization: Bearer YOUR_TOKEN_HERE
```

---

## 🔐 Authentication Endpoints

### 1. Login

**Endpoint:** `POST /auth/login`

**Access:** Public

**Request Body:**
```json
{
    "email": "admin@digivarsity.com",
    "password": "password"
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "Admin User",
            "email": "admin@digivarsity.com",
            "phone": "1234567890",
            "is_active": true,
            "roles": [
                {
                    "id": 1,
                    "name": "Admin",
                    "slug": "admin"
                }
            ]
        },
        "token": "1|abc123xyz..."
    }
}
```

### 2. Get Current User

**Endpoint:** `GET /auth/me`

**Access:** Protected (Auth Required)

**Success Response (200):**
```json
{
    "success": true,
    "message": "User retrieved successfully",
    "data": {
        "id": 1,
        "name": "Admin User",
        "email": "admin@digivarsity.com",
        "roles": [...]
    }
}
```

### 3. Logout

**Endpoint:** `POST /auth/logout`

**Access:** Protected (Auth Required)

**Success Response (200):**
```json
{
    "success": true,
    "message": "Logged out successfully",
    "data": null
}
```

---

## 📚 Program Endpoints

### 1. Get All Programs

**Endpoint:** `GET /programs`

**Access:** Public

**Query Parameters:**
- `type` (optional): online, odl, work-linked, executive
- `university_id` (optional): Filter by university
- `per_page` (optional): Items per page (default: 15)

**Example:** `GET /programs?type=online&per_page=10`

**Success Response (200):**
```json
{
    "success": true,
    "message": "Programs retrieved successfully",
    "data": {
        "data": [
            {
                "id": 1,
                "name": "MBA in Digital Marketing",
                "type": "online",
                "description": "Comprehensive MBA program",
                "duration": "2 years",
                "fees": "150000.00",
                "university": {
                    "id": 1,
                    "name": "Harvard University"
                },
                "intents": [...],
                "outcomes": [...]
            }
        ],
        "current_page": 1,
        "per_page": 10,
        "total": 50
    }
}
```

### 2. Get Program by ID

**Endpoint:** `GET /programs/{id}`

**Access:** Public

**Success Response (200):**
```json
{
    "success": true,
    "message": "Program retrieved successfully",
    "data": {
        "id": 1,
        "name": "MBA in Digital Marketing",
        "type": "online",
        "description": "...",
        "curriculum": "...",
        "duration": "2 years",
        "mode": "Online",
        "fees": "150000.00",
        "eligibility": "Bachelor's degree",
        "university": {...},
        "intents": [...],
        "outcomes": [...],
        "testimonials": [...]
    }
}
```

### 3. Create Program (Admin Only)

**Endpoint:** `POST /admin/programs`

**Access:** Admin Only

**Request Body:**
```json
{
    "name": "MBA in Digital Marketing",
    "type": "online",
    "description": "Comprehensive MBA program",
    "curriculum": "Marketing, Analytics, Strategy",
    "duration": "2 years",
    "mode": "Online",
    "fees": 150000,
    "eligibility": "Bachelor's degree",
    "university_id": 1,
    "intent_tags": ["career", "skills"],
    "outcome_tags": ["leadership", "salary"],
    "is_active": true
}
```

**Success Response (201):**
```json
{
    "success": true,
    "message": "Program created successfully",
    "data": {...}
}
```

### 4. Update Program (Admin Only)

**Endpoint:** `PUT /admin/programs/{id}`

**Access:** Admin Only

**Request Body:** (All fields optional)
```json
{
    "name": "MBA in Digital Marketing - Updated",
    "fees": 160000
}
```

### 5. Delete Program (Admin Only)

**Endpoint:** `DELETE /admin/programs/{id}`

**Access:** Admin Only

### 6. Map Intents to Program (Admin Only)

**Endpoint:** `POST /admin/programs/{id}/map-intents`

**Access:** Admin Only

**Request Body:**
```json
{
    "intent_ids": [1, 2, 3]
}
```

### 7. Map Outcomes to Program (Admin Only)

**Endpoint:** `POST /admin/programs/{id}/map-outcomes`

**Access:** Admin Only

**Request Body:**
```json
{
    "outcome_ids": [1, 2]
}
```

---

## 🎯 Intent Endpoints

### 1. Get All Intents

**Endpoint:** `GET /intents`

**Access:** Public

**Success Response (200):**
```json
{
    "success": true,
    "message": "Intents retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Career Advancement",
            "description": "Advance your career to next level",
            "is_active": true
        }
    ]
}
```

### 2. Get Programs by Intent

**Endpoint:** `GET /intents/{id}/programs`

**Access:** Public

**Success Response (200):**
```json
{
    "success": true,
    "message": "Programs retrieved successfully",
    "data": [...]
}
```

### 3. Create Intent (Admin Only)

**Endpoint:** `POST /admin/intents`

**Access:** Admin Only

**Request Body:**
```json
{
    "name": "Career Advancement",
    "description": "Advance your career to next level",
    "is_active": true
}
```

### 4. Update Intent (Admin Only)

**Endpoint:** `PUT /admin/intents/{id}`

**Access:** Admin Only

### 5. Delete Intent (Admin Only)

**Endpoint:** `DELETE /admin/intents/{id}`

**Access:** Admin Only

---

## 🏆 Outcome Endpoints

### 1. Get All Outcomes

**Endpoint:** `GET /outcomes`

**Access:** Public

### 2. Get Programs by Outcome

**Endpoint:** `GET /outcomes/{id}/programs`

**Access:** Public

### 3. Create Outcome (Admin Only)

**Endpoint:** `POST /admin/outcomes`

**Access:** Admin Only

**Request Body:**
```json
{
    "name": "Leadership Role",
    "description": "Transition to leadership positions",
    "is_active": true
}
```

### 4. Update Outcome (Admin Only)

**Endpoint:** `PUT /admin/outcomes/{id}`

**Access:** Admin Only

### 5. Delete Outcome (Admin Only)

**Endpoint:** `DELETE /admin/outcomes/{id}`

**Access:** Admin Only

---

## 🏫 University Endpoints

### 1. Get All Universities

**Endpoint:** `GET /universities`

**Access:** Public

**Success Response (200):**
```json
{
    "success": true,
    "message": "Universities retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Harvard University",
            "description": "Premier institution",
            "location": "Cambridge, MA",
            "website": "https://harvard.edu",
            "logo": null,
            "is_active": true
        }
    ]
}
```

### 2. Create University (Admin Only)

**Endpoint:** `POST /admin/universities`

**Access:** Admin Only

**Request Body:**
```json
{
    "name": "Harvard University",
    "description": "Premier institution",
    "location": "Cambridge, MA",
    "website": "https://harvard.edu",
    "logo": "https://example.com/logo.png",
    "is_active": true
}
```

### 3. Update University (Admin Only)

**Endpoint:** `PUT /admin/universities/{id}`

**Access:** Admin Only

### 4. Delete University (Admin Only)

**Endpoint:** `DELETE /admin/universities/{id}`

**Access:** Admin Only

---

## 💬 Testimonial Endpoints

### 1. Get Testimonials by Program

**Endpoint:** `GET /programs/{programId}/testimonials`

**Access:** Public

**Success Response (200):**
```json
{
    "success": true,
    "message": "Testimonials retrieved successfully",
    "data": [
        {
            "id": 1,
            "program_id": 1,
            "student_name": "Jane Smith",
            "before_role": "Marketing Executive",
            "after_role": "Marketing Director",
            "message": "This program transformed my career!",
            "image": null,
            "is_active": true
        }
    ]
}
```

### 2. Create Testimonial (Admin Only)

**Endpoint:** `POST /admin/testimonials`

**Access:** Admin Only

**Request Body:**
```json
{
    "program_id": 1,
    "student_name": "Jane Smith",
    "before_role": "Marketing Executive",
    "after_role": "Marketing Director",
    "message": "This program transformed my career!",
    "image": "https://example.com/photo.jpg",
    "is_active": true
}
```

### 3. Update Testimonial (Admin Only)

**Endpoint:** `PUT /admin/testimonials/{id}`

**Access:** Admin Only

### 4. Delete Testimonial (Admin Only)

**Endpoint:** `DELETE /admin/testimonials/{id}`

**Access:** Admin Only

---

## 📝 Lead Endpoints

### 1. Submit Lead

**Endpoint:** `POST /leads`

**Access:** Public

**Request Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "1234567890",
    "program_id": 1,
    "intent_id": 1,
    "outcome_id": 1,
    "source": "website",
    "notes": "Interested in MBA program"
}
```

**Success Response (201):**
```json
{
    "success": true,
    "message": "Lead submitted successfully",
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "status": "new"
    }
}
```

### 2. Get All Leads (Admin/Counselor Only)

**Endpoint:** `GET /admin/leads`

**Access:** Admin or Counselor

**Query Parameters:**
- `status` (optional): new, contacted, qualified, converted, lost
- `program_id` (optional): Filter by program
- `per_page` (optional): Items per page

**Example:** `GET /admin/leads?status=new&per_page=20`

---

## 📊 Dashboard Endpoint

### Get Dashboard Statistics

**Endpoint:** `GET /admin/dashboard`

**Access:** Admin or Counselor

**Success Response (200):**
```json
{
    "success": true,
    "message": "Dashboard data retrieved successfully",
    "data": {
        "total_programs": 50,
        "total_intents": 10,
        "total_outcomes": 8,
        "total_leads": 250,
        "leads_per_program": [
            {
                "program_id": 1,
                "count": 45,
                "program": {
                    "id": 1,
                    "name": "MBA in Digital Marketing"
                }
            }
        ],
        "leads_per_intent": [...],
        "leads_per_outcome": [...],
        "leads_by_status": [
            {
                "status": "new",
                "count": 100
            },
            {
                "status": "contacted",
                "count": 80
            }
        ]
    }
}
```

---

## 👥 User Management Endpoints (Admin Only)

### 1. Create User

**Endpoint:** `POST /admin/users`

**Access:** Admin Only

**Request Body:**
```json
{
    "name": "New User",
    "email": "newuser@example.com",
    "password": "password123",
    "phone": "9876543210",
    "is_active": true
}
```

### 2. Update User

**Endpoint:** `PUT /admin/users/{id}`

**Access:** Admin Only

**Request Body:** (All fields optional)
```json
{
    "name": "Updated Name",
    "phone": "1111111111"
}
```

### 3. Assign Role to User

**Endpoint:** `POST /admin/users/{id}/assign-role`

**Access:** Admin Only

**Request Body:**
```json
{
    "role_id": 2
}
```

---

## ❌ Error Responses

### 400 Bad Request
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password must be at least 8 characters."]
    }
}
```

### 401 Unauthorized
```json
{
    "success": false,
    "message": "Unauthenticated"
}
```

### 403 Forbidden
```json
{
    "success": false,
    "message": "Unauthorized. Insufficient permissions."
}
```

### 404 Not Found
```json
{
    "success": false,
    "message": "Resource not found"
}
```

### 500 Internal Server Error
```json
{
    "success": false,
    "message": "Internal server error"
}
```

---

## 🔑 Available Roles

### Admin
- Full system access
- Can manage all resources
- Can create/update/delete users
- Can assign roles

### Counselor
- View dashboard
- View and manage leads
- View programs

### User
- Access public endpoints only
- Submit leads

---

## 📌 Notes

1. All timestamps are in ISO 8601 format
2. Pagination uses Laravel's default format
3. Cache TTL is 1 hour for cached endpoints
4. Rate limiting: 60 requests per minute (default)
5. All dates are in UTC timezone

---

## 🧪 Testing with cURL

### Login
```bash
curl -X POST http://localhost:8000/api/v1/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@digivarsity.com","password":"password"}'
```

### Get Programs (Public)
```bash
curl http://localhost:8000/api/v1/programs
```

### Create Program (Admin)
```bash
curl -X POST http://localhost:8000/api/v1/admin/programs \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "MBA in Digital Marketing",
    "type": "online",
    "university_id": 1,
    "fees": 150000
  }'
```

### Get Dashboard (Admin/Counselor)
```bash
curl http://localhost:8000/api/v1/admin/dashboard \
  -H "Authorization: Bearer YOUR_TOKEN"
```

---

**For more examples, import the Postman collection: `Digivarsity_API_Collection.postman_collection.json`**
