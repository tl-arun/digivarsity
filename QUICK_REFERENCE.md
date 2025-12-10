# Quick Reference Card

## 🚀 Quick Start (3 Steps)

```bash
# 1. Run migration
php artisan migrate

# 2. Link storage
php artisan storage:link

# 3. Start server
php artisan serve
```

## 📍 Admin URLs

| Section | URL |
|---------|-----|
| Universities | `/admin/universities` |
| Testimonials | `/admin/testimonials` |
| Programs | `/admin/programs` |
| Dashboard | `/admin/dashboard` |

## 🎯 Key Features

### Featured Programs
- Toggle in admin: Check "Featured" box
- Shows on homepage automatically
- Limit: 6 programs displayed

### Universities
- Upload logo (PNG/SVG)
- Shows in scrolling carousel
- Auto-displays when active

### Testimonials
- Upload student photo
- Auto-rotates every 5 seconds
- Shows when active

## 📊 Homepage Sections (Top to Bottom)

1. **Navigation** - Sticky header
2. **Hero** - Gradient with CTAs
3. **Stats** - Animated counters
4. **Features** - 6 feature cards
5. **Featured Programs** - 3-6 programs
6. **Universities** - Scrolling carousel
7. **Testimonials** - Rotating carousel
8. **AI Resume CTA** - Upload section
9. **Footer** - Links & contact

## 🎨 Design System

### Colors
- Primary: `#6366F1` (Indigo)
- Secondary: `#8B5CF6` (Purple)
- Accent: `#EC4899` (Pink)

### Fonts
- Family: Inter
- Weights: 400, 600, 800

### Spacing
- Scale: Tailwind (4px base)
- Sections: `py-24` (96px)

## 🔧 Common Commands

```bash
# Clear cache
php artisan cache:clear

# Clear views
php artisan view:clear

# Clear config
php artisan config:clear

# Run all clears
php artisan optimize:clear
```

## 📁 Image Locations

```
storage/app/public/
├── universities/     # University logos
├── testimonials/     # Student photos
└── programs/         # Program images
```

## 🐛 Quick Fixes

### Images not showing?
```bash
php artisan storage:link
```

### Changes not reflecting?
```bash
php artisan cache:clear
php artisan view:clear
```

### Database issues?
```bash
php artisan migrate:fresh
```

## 📱 Responsive Breakpoints

- Mobile: `< 640px`
- Tablet: `640px - 1024px`
- Desktop: `> 1024px`

## ✅ Pre-Launch Checklist

- [ ] Run migrations
- [ ] Link storage
- [ ] Add 3+ universities
- [ ] Add 3+ testimonials
- [ ] Mark 3-6 programs as featured
- [ ] Test on mobile
- [ ] Check all links
- [ ] Verify images load
- [ ] Test forms
- [ ] Check API endpoints

## 🎯 API Quick Reference

```javascript
// Featured Programs
GET /api/v1/programs?is_featured=1&limit=6

// Universities
GET /api/v1/universities

// Testimonials
GET /api/v1/testimonials
```

## 💡 Pro Tips

1. **Images**: Use WebP for better performance
2. **Content**: Keep testimonials 2-3 sentences
3. **Featured**: Rotate featured programs monthly
4. **Mobile**: Always test on mobile first
5. **Cache**: Clear cache after major changes

---

**Need Help?** Check `COMPLETE_SETUP_GUIDE.md` for detailed instructions.
