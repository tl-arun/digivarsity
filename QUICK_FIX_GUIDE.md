# Quick Fix Guide - If Something Still Doesn't Work

## 🚨 Emergency Fixes

### If Testimonials Not Showing on Homepage

**Run this command:**
```bash
php artisan cache:clear
```

**Then refresh browser:**
```
Ctrl + Shift + R
```

### If Sidebar Not Showing on Admin Pages

**Clear views:**
```bash
php artisan view:clear
```

**Then visit:**
```
http://localhost:8000/admin/universities
```

### If Featured Programs Not Showing

**Check if programs are marked:**
```bash
php artisan tinker --execute="echo App\Models\Program::where('is_featured', true)->count()"
```

**If 0, mark some:**
```bash
php artisan tinker --execute="App\Models\Program::limit(6)->update(['is_featured' => true])"
```

## 🔍 Quick Diagnostics

### Check All Data
```bash
php artisan tinker --execute="
echo 'Featured Programs: ' . App\Models\Program::where('is_featured', true)->count() . PHP_EOL;
echo 'Active Universities: ' . App\Models\University::where('is_active', true)->count() . PHP_EOL;
echo 'Active Testimonials: ' . App\Models\Testimonial::where('is_active', true)->count() . PHP_EOL;
"
```

**Expected Output:**
```
Featured Programs: 6
Active Universities: 8
Active Testimonials: 25
```

### Test All APIs
```bash
# Test featured programs
curl http://localhost:8000/api/v1/programs?is_featured=1

# Test universities
curl http://localhost:8000/api/v1/universities

# Test testimonials
curl http://localhost:8000/api/v1/testimonials
```

**All should return:** `"success": true`

## 🎯 Quick Access URLs

### Admin Pages
- Dashboard: `http://localhost:8000/admin/dashboard`
- Programs: `http://localhost:8000/admin/programs`
- Universities: `http://localhost:8000/admin/universities`
- Testimonials: `http://localhost:8000/admin/testimonials`
- Outcomes: `http://localhost:8000/admin/outcomes`
- Intents: `http://localhost:8000/admin/intents`

### Public Pages
- Homepage: `http://localhost:8000`
- Programs: `http://localhost:8000/programs`

## ⚡ One-Command Fix All

**Run this to fix most issues:**
```bash
php artisan optimize:clear && php artisan migrate && php artisan storage:link
```

## 🔄 Reset Everything (Nuclear Option)

**If nothing works, run this:**
```bash
# Clear everything
php artisan optimize:clear

# Re-run migrations
php artisan migrate

# Link storage
php artisan storage:link

# Mark programs as featured
php artisan tinker --execute="App\Models\Program::limit(6)->update(['is_featured' => true])"

# Activate all universities
php artisan tinker --execute="App\Models\University::update(['is_active' => true])"

# Activate all testimonials
php artisan tinker --execute="App\Models\Testimonial::update(['is_active' => true])"
```

## 📞 Check Logs

**If errors persist, check logs:**
```bash
type storage\logs\laravel.log
```

**Look for the latest error at the bottom**

## ✅ Verification Checklist

Run these checks in order:

1. **Server Running?**
   ```bash
   # Should show "Laravel development server started"
   php artisan serve
   ```

2. **Database Connected?**
   ```bash
   php artisan tinker --execute="DB::connection()->getPdo()"
   ```

3. **Storage Linked?**
   ```bash
   dir public\storage
   ```

4. **Migrations Run?**
   ```bash
   php artisan migrate:status | findstr is_featured
   ```

5. **Data Exists?**
   ```bash
   php artisan tinker --execute="echo App\Models\Program::count()"
   ```

## 🎨 Browser Issues

### Clear Browser Cache
```
1. Press Ctrl + Shift + Delete
2. Select "Cached images and files"
3. Click "Clear data"
```

### Hard Reload
```
Ctrl + Shift + R
```

### Check Console
```
1. Press F12
2. Go to Console tab
3. Look for red errors
```

### Check Network
```
1. Press F12
2. Go to Network tab
3. Reload page
4. Check if API calls return 200
```

## 🚀 Quick Test

**Run this to test everything:**
```bash
# Test APIs
curl http://localhost:8000/api/v1/programs?is_featured=1 2>$null | ConvertFrom-Json | Select-Object success
curl http://localhost:8000/api/v1/universities 2>$null | ConvertFrom-Json | Select-Object success
curl http://localhost:8000/api/v1/testimonials 2>$null | ConvertFrom-Json | Select-Object success
```

**All should show:** `success : True`

---

**If still not working after all this, check:**
- `ALL_FIXES_COMPLETE.md` - Complete fix documentation
- `TROUBLESHOOTING.md` - Detailed troubleshooting
- `storage/logs/laravel.log` - Error logs
