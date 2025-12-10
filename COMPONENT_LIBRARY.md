# Component Library - Modern Design System

Quick reference for all reusable components in the modern design system.

---

## 🎨 Buttons

### Primary Button
```html
<button class="btn-primary">
    Get Started
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
    </svg>
</button>
```

**CSS:**
```css
.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.75rem;
    font-size: 1rem;
    font-weight: 600;
    color: white;
    background: #171717;
    border: none;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 250ms ease;
}

.btn-primary:hover {
    background: #525252;
    transform: translateY(-1px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}
```

### Secondary Button
```html
<button class="btn-secondary">
    Browse Programs
</button>
```

**CSS:**
```css
.btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.75rem;
    font-size: 1rem;
    font-weight: 600;
    color: #171717;
    background: transparent;
    border: 1.5px solid #171717;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 250ms ease;
}

.btn-secondary:hover {
    background: #171717;
    color: white;
}
```

### Accent Button
```html
<button class="btn-accent">
    Find My Program
</button>
```

**CSS:**
```css
.btn-accent {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.75rem;
    font-size: 1rem;
    font-weight: 600;
    color: white;
    background: #14B8A6;
    border: none;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 250ms ease;
}

.btn-accent:hover {
    background: #0D9488;
    transform: translateY(-1px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}
```

---

## 🎴 Cards

### Minimal Card
```html
<div class="card-minimal hover-lift">
    <div class="w-12 h-12 bg-neutral-900 rounded-lg flex items-center justify-center mb-4">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- Icon -->
        </svg>
    </div>
    <h3 class="heading-3 mb-2">Card Title</h3>
    <p class="body-base">Card description text goes here.</p>
</div>
```

**CSS:**
```css
.card-minimal {
    background: white;
    border: 1px solid #E5E5E5;
    border-radius: 0.75rem;
    padding: 2rem;
    transition: all 250ms ease;
}

.card-minimal:hover {
    border-color: #14B8A6;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.hover-lift {
    transition: transform 250ms ease, box-shadow 250ms ease;
}

.hover-lift:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}
```

---

## 📝 Typography

### Hero Headline
```html
<h1 class="heading-hero">
    Transform Your Future with
    <span class="accent-teal">Quality Education</span>
</h1>
```

**CSS:**
```css
.heading-hero {
    font-size: clamp(2.5rem, 5vw, 4.5rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.02em;
    color: #171717;
}

.accent-teal {
    color: #14B8A6;
}
```

### Heading 1
```html
<h2 class="heading-1">Section Headline</h2>
```

**CSS:**
```css
.heading-1 {
    font-size: clamp(2rem, 4vw, 3.5rem);
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: -0.01em;
    color: #171717;
}
```

### Heading 2
```html
<h3 class="heading-2">Subsection Headline</h3>
```

**CSS:**
```css
.heading-2 {
    font-size: clamp(1.5rem, 3vw, 2.5rem);
    font-weight: 600;
    line-height: 1.3;
    color: #171717;
}
```

### Heading 3
```html
<h4 class="heading-3">Card Title</h4>
```

**CSS:**
```css
.heading-3 {
    font-size: clamp(1.25rem, 2.5vw, 2rem);
    font-weight: 600;
    line-height: 1.4;
    color: #171717;
}
```

### Body Text
```html
<p class="body-large">Large body text for subheadlines</p>
<p class="body-base">Standard body text</p>
<p class="body-small">Small text for captions</p>
```

**CSS:**
```css
.body-large {
    font-size: 1.125rem;
    font-weight: 400;
    line-height: 1.7;
    color: #525252;
}

.body-base {
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.6;
    color: #525252;
}

.body-small {
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #A3A3A3;
}
```

---

## 🏷️ Badges

### Status Badge
```html
<div class="inline-flex items-center gap-2 px-3 py-1.5 bg-neutral-100 rounded-full">
    <span class="w-2 h-2 bg-accent-teal rounded-full animate-pulse"></span>
    <span class="text-xs font-semibold text-neutral-700">Trusted by 10,000+ Students</span>
</div>
```

### Feature Badge
```html
<div class="inline-flex items-center gap-2 px-3 py-1.5 bg-neutral-100 rounded-full">
    <svg class="w-4 h-4 text-accent-teal" fill="currentColor" viewBox="0 0 20 20">
        <!-- Icon -->
    </svg>
    <span class="text-xs font-semibold text-neutral-700">AI-Powered Matching</span>
</div>
```

---

## ✅ Icons

### Check Icon (Success)
```html
<svg class="w-5 h-5 text-accent-teal" fill="currentColor" viewBox="0 0 20 20">
    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
</svg>
```

### Arrow Right Icon
```html
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
</svg>
```

### Book Icon
```html
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
</svg>
```

---

## 📐 Layout Components

### Container
```html
<div class="container-clean">
    <!-- Content -->
</div>
```

**CSS:**
```css
.container-clean {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 2rem;
}

@media (max-width: 768px) {
    .container-clean {
        padding: 0 1rem;
    }
}
```

### Section
```html
<section class="section-spacing">
    <div class="container-clean">
        <!-- Content -->
    </div>
</section>
```

**CSS:**
```css
.section-spacing {
    padding: 6rem 0;
}

@media (max-width: 768px) {
    .section-spacing {
        padding: 4rem 0;
    }
}
```

### Grid
```html
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Grid items -->
</div>
```

---

## 🎬 Animations

### Fade In
```html
<div class="fade-in">
    <!-- Content -->
</div>
```

**CSS:**
```css
.fade-in {
    animation: fadeIn 0.6s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
```

### Slide Up
```html
<div class="slide-up">
    <!-- Content -->
</div>
```

**CSS:**
```css
.slide-up {
    animation: slideUp 0.6s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
```

### Scroll Animation (JavaScript)
```javascript
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.fade-in, .slide-up').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
    observer.observe(el);
});
```

---

## 🎨 Color Utilities

### Text Colors
```html
<p class="text-neutral-900">Primary text</p>
<p class="text-neutral-600">Secondary text</p>
<p class="text-neutral-400">Tertiary text</p>
<p class="text-accent-teal">Accent text</p>
```

### Background Colors
```html
<div class="bg-white">White background</div>
<div class="bg-neutral-50">Light gray background</div>
<div class="bg-neutral-900">Dark background</div>
```

---

## 📏 Spacing Utilities

### Margin
```html
<div class="mb-4">Margin bottom 1rem</div>
<div class="mt-8">Margin top 2rem</div>
<div class="my-12">Margin vertical 3rem</div>
```

### Padding
```html
<div class="p-4">Padding 1rem</div>
<div class="px-6">Padding horizontal 1.5rem</div>
<div class="py-8">Padding vertical 2rem</div>
```

### Gap
```html
<div class="flex gap-4">Flex with 1rem gap</div>
<div class="grid gap-8">Grid with 2rem gap</div>
```

---

## 🔲 Dividers

### Horizontal Divider
```html
<hr class="divider-clean">
```

**CSS:**
```css
.divider-clean {
    height: 1px;
    background: #E5E5E5;
    border: none;
    margin: 3rem 0;
}
```

---

## 📱 Responsive Utilities

### Show/Hide on Mobile
```html
<div class="hidden md:block">Hidden on mobile, visible on desktop</div>
<div class="block md:hidden">Visible on mobile, hidden on desktop</div>
```

### Responsive Grid
```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- 1 column mobile, 2 tablet, 3 desktop -->
</div>
```

### Responsive Text
```html
<h1 class="text-2xl md:text-4xl lg:text-6xl">
    Responsive heading
</h1>
```

---

## 🎯 Common Patterns

### Feature Card
```html
<div class="card-minimal hover-lift">
    <div class="w-12 h-12 bg-neutral-900 rounded-lg flex items-center justify-center mb-4">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
    </div>
    <h3 class="heading-3 mb-2">Quality Programs</h3>
    <p class="body-base">Curated courses from top universities worldwide</p>
</div>
```

### Stat Display
```html
<div class="text-center space-y-2">
    <div class="text-5xl font-bold text-neutral-900">10K+</div>
    <div class="text-sm font-medium text-neutral-600">Students</div>
    <div class="text-xs text-neutral-500">Lives transformed</div>
</div>
```

### CTA Section
```html
<div class="max-w-3xl mx-auto text-center space-y-8">
    <h2 class="heading-2">Ready to Transform Your Future?</h2>
    <p class="body-large">Join thousands of students who are already learning</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <button class="btn-accent">Get Started</button>
        <button class="btn-secondary">Learn More</button>
    </div>
</div>
```

---

## 🎨 Quick Copy-Paste Components

### Navigation Link
```html
<a href="#" class="text-sm font-medium text-neutral-600 hover:text-neutral-900 transition-colors">
    Link Text
</a>
```

### Icon Button
```html
<button class="w-10 h-10 bg-neutral-900 rounded-lg flex items-center justify-center hover:bg-neutral-700 transition-colors">
    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <!-- Icon -->
    </svg>
</button>
```

### Input Field
```html
<input type="text" 
       class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:outline-none focus:border-accent-teal transition-colors"
       placeholder="Enter text">
```

### Checkbox
```html
<label class="flex items-center gap-2 cursor-pointer">
    <input type="checkbox" class="w-4 h-4 text-accent-teal border-neutral-300 rounded focus:ring-accent-teal">
    <span class="text-sm text-neutral-700">Checkbox label</span>
</label>
```

---

## 📚 Usage Tips

1. **Always use container-clean** for consistent max-width and padding
2. **Use section-spacing** for consistent vertical rhythm
3. **Stick to the color palette** - don't introduce new colors
4. **Maintain white space** - don't crowd elements
5. **Use hover-lift** for interactive cards
6. **Keep animations subtle** - fade-in and slide-up only
7. **Test on mobile** - always check responsive behavior

---

**Need more components?** Refer to `MODERN_DESIGN_GUIDE.md` for complete design system documentation.
