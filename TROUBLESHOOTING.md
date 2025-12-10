# Troubleshooting Guide

## 🔍 Common Issues & Solutions

### Issue 1: Featured Programs Not Showing

**Symptoms:**
- Empty "Featured Programs" section
- "View All Programs" button shows but no cards

**Solutions:**

1. **Check if programs are marked as featured:**
```bash
php artisan tinker --execute="echo App\Models\Program::where('is_featured', true)->count() . ' featured programs'"
```

2. **Mark programs as featured:**
```bash
php artisan tinker --execute="App\Models\Program::limit(6)->update(['is_featured' => true])"
```

3. **Verify migration ran:**
```bash
php artisan migrate:status | findstr is_featured
```

4. **Run migration if pending:**
```bash
php artisan migrate
```

---

### Issue 2: Universities Not Showing

**Symptoms:**
- Empty universities carousel
- No university logos

**Solutions:**

1. **Check active universities:**
```bash
php artisan tinker --execute="echo App\Models\University::where('is_active', true)->count() . ' active universities'"
```

2. **Activate universities:**
```bash
php artisan tinker --execute="App\Models\University::update(['is_active' => true])"
```

3. **Add sample universities:**
   - Go to: `http://localhost:8000/admin/universities`
   - Click "Add University"
   - Fill details and upload logo
   - Check "Active"
   - Save

---

### Issue 3: Testimonials Not Showing

**Symptoms:**
- Empty testimonials section
- No student photos or messages

**Solutions:**

1. **Check active testimonials:**
```bash
php artisan tinker --execute="echo App\Models\Testimonial::where('is_active', true)->count() . ' active testimonials'"
```

2. **Activate testimonials:**
```bash
php artisan tinker --execute="App\Models\Testimonial::update(['is_active' => true])"
```

3. **Add sample testimonials:**
   - Go to: `http://localhost:8000/admin/testimonials`
   - Click "Add Testimonial"
   - Fill details and upload photo
   - Check "Active"
   - Save

---

### Issue 4: Images Not Loading

**Symptoms:**
- Broken image icons
- 404 errors for images

**Solutions:**

1. **Link storage:**
```bash
php artisan storage:link
```

2. **Check storage link exists:**
```bash
dir public\storage
```

3. **Verify file permissions:**
```bash
icacls storage /grant Everyone:F /T
```

4. **Check image paths:**
   - Images should be in: `storage/app/public/`
   - Accessed via: `/storage/filename.jpg`

---

### Issue 5: API Errors

**Symptoms:**
- Console errors
- "Failed to fetch" messages
- Empty sections

**Solutions:**

1. **Check API routes:**
```bash
php artisan route:list --path=api/v1
```

2. **Test API directly:**
```bash
curl http://localhost:8000/api/v1/programs?is_featured=1
curl http://localhost:8000/api/v1/universities
curl http://localhost:8000/api/v1/testimonials
```

3. **Clear cache:**
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

4. **Check .env file:**
```
APP_URL=http://localhost:8000
```

---

### Issue 6: JavaScript Errors

**Symptoms:**
- Console errors
- Animations not working
- Sections not loading

**Solutions:**

1. **Check browser console (F12)**
   - Look for red errors
   - Note the error message

2. **Common fixes:**
```bash
# Clear browser cache
Ctrl + Shift + Delete

# Hard reload
Ctrl + Shift + R

# Clear Laravel cache
php artisan optimize:clear
```

3. **Verify JavaScript loaded:**
   - View page source
   - Check for `<script>` tags
   - Verify no 404 errors

---

### Issue 7: Styles Not Applied

**Symptoms:**
- Plain text, no colors
- No layout
- Broken design

**Solutions:**

1. **Check Tailwind CDN:**
```html
<!-- Should be in <head> -->
<script src="https://cdn.tailwindcss.com"></script>
```

2. **Clear browser cache:**
```
Ctrl + Shift + Delete
```

3. **Hard reload:**
```
Ctrl + Shift + R
```

4. **Check network tab:**
   - Verify CSS files load
   - No 404 errors

---

### Issue 8: Database Connection

**Symptoms:**
- "Connection refused"
- "Database not found"
- 500 errors

**Solutions:**

1. **Check .env file:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=digivarsity
DB_USERNAME=root
DB_PASSWORD=
```

2. **Test connection:**
```bash
php artisan tinker --execute="DB::connection()->getPdo()"
```

3. **Start database:**
   - XAMPP: Start MySQL
   - Check port 3306 is free

---

### Issue 9: Server Not Starting

**Symptoms:**
- "Address already in use"
- Can't access localhost:8000

**Solutions:**

1. **Kill existing process:**
```bash
# Find process on port 8000
netstat -ano | findstr :8000

# Kill process (replace PID)
taskkill /PID <PID> /F
```

2. **Use different port:**
```bash
php artisan serve --port=8001
```

3. **Check XAMPP:**
   - Apache should be running
   - Port 80 should be free

---

### Issue 10: Admin Panel Not Accessible

**Symptoms:**
- 404 on /admin routes
- "Route not found"

**Solutions:**

1. **Check routes:**
```bash
php artisan route:list --path=admin
```

2. **Clear route cache:**
```bash
php artisan route:clear
php artisan cache:clear
```

3. **Verify web.php:**
   - Check admin routes exist
   - Verify middleware

---

## 🧪 Complete Reset (Nuclear Option)

If nothing works, try this:

```bash
# 1. Clear everything
php artisan optimize:clear

# 2. Re-run migrations
php artisan migrate:fresh

# 3. Link storage
php artisan storage:link

# 4. Seed data (if you have seeders)
php artisan db:seed

# 5. Mark programs as featured
php artisan tinker --execute="App\Models\Program::limit(6)->update(['is_featured' => true])"

# 6. Restart server
php artisan serve
```

---

## 📞 Still Having Issues?

### Check These Files:

1. **routes/web.php** - Admin routes
2. **routes/api.php** - API routes
3. **.env** - Configuration
4. **resources/views/home.blade.php** - Frontend
5. **app/Models/Program.php** - Model

### Useful Commands:

```bash
# View logs
type storage\logs\laravel.log

# Check PHP version
php -v

# Check Laravel version
php artisan --version

# List all routes
php artisan route:list

# Check database
php artisan db:show

# Run tests
php artisan test
```

---

**Last Updated**: December 5, 2024
