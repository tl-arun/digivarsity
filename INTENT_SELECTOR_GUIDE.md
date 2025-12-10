# Intent Selector Component Guide

## Overview
I've created an interactive card selection interface that matches your design requirements. The component features three cards with smooth hover effects and animations.

## Features

### Design Elements
- **Hero Heading**: "What future are you ready to build today?" with gradient text
- **Three Interactive Cards**:
  1. Start My Learning Journey (Blue gradient - default active state)
  2. Build My Career While Studying (White with hover effect)
  3. Level Up Your Professional Skills (White with hover effect)

### Interactions
- **Hover Effects**: 
  - Cards lift up on hover (-translate-y-2)
  - White cards show blue gradient overlay on hover
  - Arrow icon appears and slides right on hover
  - Text color transitions from gray to white
  - Shadow increases for depth

- **Click Actions**: 
  - Each card is clickable and navigates to programs filtered by intent
  - Toast notification shows selected option

## Files Created

### 1. Component File
**Location**: `resources/views/components/intent-selector.blade.php`
- Reusable Blade component
- Can be included anywhere with `@include('components.intent-selector')`

### 2. Demo Page
**Location**: `resources/views/intent-demo.blade.php`
- Standalone demo page to preview the component
- Access at: `http://your-domain/intent-demo`

### 3. Integration
The component has been added to your home page after the Stats Section.

## How to Use

### View the Demo
1. Start your Laravel server: `php artisan serve`
2. Visit: `http://localhost:8000/intent-demo`
3. Hover over cards to see the effects
4. Click cards to test interactions

### Customize Content
Edit `resources/views/components/intent-selector.blade.php`:

```blade
<h3 class="text-2xl font-bold text-white">
    Your Custom Title<br/>Here
</h3>
<p class="text-white/90 text-base">
    Your custom description here
</p>
```

### Change Colors
The blue gradient can be customized:
```css
bg-gradient-to-br from-blue-600 to-indigo-700
```

Change to any Tailwind color:
```css
bg-gradient-to-br from-purple-600 to-pink-700
```

### Modify Click Behavior
In the component's script section:
```javascript
function handleIntentSelection(intent) {
    // Current: Navigate to programs page
    window.location.href = `/programs?intent=${intent}`;
    
    // Or: Open a modal
    // openIntentModal(intent);
    
    // Or: Scroll to section
    // document.getElementById('programs').scrollIntoView();
}
```

## Integration with Backend

### Programs Controller
Update your programs route to filter by intent:

```php
public function programs(Request $request)
{
    $query = Program::where('is_active', true);
    
    if ($request->has('intent')) {
        $query->whereHas('intent', function($q) use ($request) {
            $q->where('slug', $request->intent);
        });
    }
    
    $programs = $query->with(['university'])->get();
    return view('public.programs', compact('programs'));
}
```

## Responsive Design
- **Desktop**: 3 columns side by side
- **Tablet**: 3 columns (may stack on smaller tablets)
- **Mobile**: Single column stack

## Animation Details
- Cards fade in from bottom with staggered delays (0.1s, 0.2s, 0.3s)
- Smooth transitions on all hover effects (300ms duration)
- Arrow slides right on hover with transform
- Gradient overlay fades in smoothly

## Browser Support
- Modern browsers (Chrome, Firefox, Safari, Edge)
- Uses CSS Grid and Flexbox
- Tailwind CSS for styling
- Font Awesome for icons

## Next Steps

1. **Test the demo page** to see the component in action
2. **Customize the content** to match your specific intents
3. **Connect to your database** to dynamically load intent data
4. **Add analytics** to track which intents users select most

## Need Help?
- The component is fully responsive and accessible
- All hover states work on touch devices as click states
- Toast notifications provide user feedback
