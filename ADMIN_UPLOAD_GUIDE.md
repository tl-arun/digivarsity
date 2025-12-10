# Admin Upload Guide - Universities & Testimonials

## Overview
Complete admin system for managing universities and testimonials with image uploads.

## Features Added

### 1. Universities Management
- **List View**: `/admin/universities`
- **Create**: `/admin/universities/create`
- **Edit**: `/admin/universities/edit/{id}`
- **Delete**: With confirmation

#### Fields:
- Name (required)
- Description
- Location
- Website URL
- Logo Image (PNG/SVG recommended, max 2MB)
- Active Status

### 2. Testimonials Management
- **List View**: `/admin/testimonials`
- **Create**: `/admin/testimonials/create`
- **Edit**: `/admin/testimonials/edit/{id}`
- **Delete**: With confirmation

#### Fields:
- Program (dropdown)
- Student Name (required)
- Previous Role
- Current Role
- Testimonial Message (required)
- Student Photo (max 2MB)
- Active Status

## How to Use

### Add a University
1. Go to `/admin/universities`
2. Click "Add University"
3. Fill in the details
4. Upload logo image
5. Check "Active" to show on website
6. Click "Save University"

### Add a Testimonial
1. Go to `/admin/testimonials`
2. Click "Add Testimonial"
3. Select program
4. Fill in student details
5. Upload student photo
6. Write testimonial message
7. Check "Active" to show on website
8. Click "Save Testimonial"

## Image Guidelines

### University Logos
- **Format**: PNG or SVG preferred
- **Size**: Max 2MB
- **Dimensions**: Square or wide format
- **Background**: Transparent recommended

### Testimonial Photos
- **Format**: JPG or PNG
- **Size**: Max 2MB
- **Dimensions**: Square (1:1 ratio)
- **Quality**: High resolution headshot

## Storage Location
- Images are stored in: `storage/app/public/`
- Universities: `storage/app/public/universities/`
- Testimonials: `storage/app/public/testimonials/`

## Important Notes

1. **Storage Link**: Make sure storage is linked:
   ```bash
   php artisan storage:link
   ```

2. **Permissions**: Ensure storage folder has write permissions

3. **Active Status**: Only active items show on the website

4. **Image Preview**: Preview shows before upload

5. **Fallback**: If no image, shows icon placeholder

## API Endpoints

### Universities
- GET `/api/v1/universities` - List all active universities

### Testimonials
- GET `/api/v1/testimonials` - List all active testimonials
- GET `/api/v1/programs/{id}/testimonials` - Testimonials by program

## Frontend Display

### Universities Section
- Horizontal scrolling carousel
- Shows logo or icon
- University name
- Smooth animations

### Testimonials Section
- Rotating carousel
- Shows photo or avatar
- Student name and role
- Testimonial message
- Auto-rotates every 5 seconds

## Troubleshooting

### Images Not Showing?
1. Check storage link: `php artisan storage:link`
2. Verify file permissions
3. Check browser console for errors
4. Ensure images are uploaded successfully

### Upload Fails?
1. Check file size (max 2MB)
2. Verify file format
3. Check server upload limits in php.ini
4. Ensure storage folder exists

## Files Created/Modified

### Controllers
- `app/Http/Controllers/Web/UniversityController.php`
- `app/Http/Controllers/Web/TestimonialController.php`
- `app/Http/Controllers/Api/V1/TestimonialController.php`

### Views
- `resources/views/admin/universities/index.blade.php`
- `resources/views/admin/universities/create.blade.php`
- `resources/views/admin/universities/edit.blade.php`
- `resources/views/admin/testimonials/index.blade.php`
- `resources/views/admin/testimonials/create.blade.php`

### Routes
- `routes/web.php` - Admin routes
- `routes/api.php` - API routes

### Frontend
- `resources/views/home.blade.php` - Updated to load from API

## Next Steps

1. Run migrations if needed
2. Link storage: `php artisan storage:link`
3. Access admin panel
4. Add universities and testimonials
5. Check frontend display

---

**Status**: ✅ Complete and Ready to Use
