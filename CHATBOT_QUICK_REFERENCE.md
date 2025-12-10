# 🤖 Chatbot Quick Reference

## 🔗 URLs

| Purpose | URL |
|---------|-----|
| Full Chat Page | `http://localhost/chatbot` |
| API Endpoint | `POST /api/v1/chatbot/chat` |
| Home Page (with button) | `http://localhost/` |

## 📁 Files Created

### Backend
```
app/Http/Controllers/Api/ChatbotController.php
```

### Frontend
```
resources/views/chatbot.blade.php
resources/views/components/chatbot-button.blade.php
resources/views/components/chatbot-widget.blade.php
```

### Routes
```
routes/api.php (modified)
routes/web.php (modified)
```

### Navigation
```
resources/views/components/public-nav.blade.php (modified)
resources/views/home.blade.php (modified)
```

### Documentation
```
CHATBOT_GUIDE.md
CHATBOT_SETUP.md
CHATBOT_TESTING.md
CHATBOT_COMPLETE.md
CHATBOT_PREVIEW.md
CHATBOT_QUICK_REFERENCE.md (this file)
```

## 🎯 Sample Queries

### Greetings
```
"Hello"
"Hi there"
"Good morning"
```

### Program Search
```
"Show me all programs"
"List programs"
"What courses do you have?"
```

### Specific Programs
```
"Tell me about MBA programs"
"Show MBA courses"
"Business programs"
```

### Career Focus
```
"I want to advance my career"
"Career growth programs"
"Professional development"
```

### Budget
```
"Show affordable programs"
"Cheapest options"
"Budget-friendly courses"
"Premium programs"
```

### Duration
```
"2 year programs"
"6 month courses"
"Short duration programs"
```

### Mode
```
"Online programs"
"Offline courses"
"Distance learning"
"Hybrid programs"
```

### Universities
```
"Tell me about universities"
"Which universities?"
"Show all colleges"
```

### Help
```
"What can you do?"
"Help me"
"Show capabilities"
```

## 🔧 Quick Commands

### Clear Cache
```bash
php artisan route:clear
php artisan cache:clear
php artisan config:clear
```

### Check Routes
```bash
php artisan route:list | findstr chatbot
```

### Activate Programs
```sql
UPDATE programs SET is_active = 1;
```

### Check Programs
```sql
SELECT COUNT(*) FROM programs WHERE is_active = 1;
```

## 📦 Component Usage

### Floating Button
```blade
@include('components.chatbot-button')
```

### Inline Widget
```blade
@include('components.chatbot-widget')
```

### Full Page
```blade
<a href="{{ route('chatbot') }}">Open Chat</a>
```

## 🎨 Customization

### Change Colors
```blade
<!-- In chatbot.blade.php -->
from-indigo-600 to-purple-600
↓
from-blue-600 to-green-600
```

### Add Pattern
```php
// In ChatbotController.php
if (preg_match('/pattern/i', $message)) {
    return $this->yourMethod();
}
```

### Modify Welcome
```php
// In ChatbotController.php
return [
    'message' => "Your message",
    'suggestions' => ['Suggestion 1', 'Suggestion 2']
];
```

## 🐛 Troubleshooting

| Issue | Solution |
|-------|----------|
| 404 on /chatbot | `php artisan route:clear` |
| No programs | `UPDATE programs SET is_active = 1;` |
| API error | Check `storage/logs/laravel.log` |
| Styling broken | Verify Tailwind CDN loading |
| Button not showing | Add `@include('components.chatbot-button')` |

## 📊 API Format

### Request
```json
{
  "message": "Show me programs",
  "context": {}
}
```

### Response
```json
{
  "success": true,
  "response": "Message text...",
  "suggestions": ["Suggestion 1", "Suggestion 2"],
  "programs": [
    {
      "id": 1,
      "name": "Program Name",
      "university": "University",
      "duration": "2 years",
      "mode": "Online",
      "fees": "₹200,000.00"
    }
  ]
}
```

## ✅ Testing Checklist

- [ ] Visit `/chatbot`
- [ ] Send "Hello"
- [ ] Try "Show all programs"
- [ ] Test quick suggestions
- [ ] Check program cards
- [ ] Test on mobile
- [ ] Verify floating button
- [ ] Check navigation link

## 🎯 Key Features

✅ Natural language understanding  
✅ Smart program recommendations  
✅ Real-time responses  
✅ Typing indicators  
✅ Quick suggestions  
✅ Program cards with images  
✅ Mobile responsive  
✅ Floating button  
✅ Inline widget  
✅ Navigation integration  

## 📱 Access Methods

1. **Direct URL**: `/chatbot`
2. **Navigation**: Click "AI Assistant" in menu
3. **Floating Button**: Click button on home page
4. **Inline Widget**: Embedded on specific pages

## 🚀 Quick Start

1. Clear cache: `php artisan route:clear`
2. Visit: `http://localhost/chatbot`
3. Type: "Hello"
4. Follow suggestions
5. Explore features

## 📚 Documentation

| File | Purpose |
|------|---------|
| CHATBOT_GUIDE.md | Complete feature guide |
| CHATBOT_SETUP.md | Setup instructions |
| CHATBOT_TESTING.md | Testing procedures |
| CHATBOT_COMPLETE.md | Implementation summary |
| CHATBOT_PREVIEW.md | Visual preview |
| CHATBOT_QUICK_REFERENCE.md | This file |

## 💡 Tips

1. Start with simple queries
2. Use quick suggestions
3. Test different phrasings
4. Check mobile view
5. Monitor API responses
6. Customize as needed
7. Add to more pages
8. Track user queries

## 🎉 Ready!

Everything is set up and ready to use. Start chatting at:

**http://localhost/chatbot**

---

**Quick Help**: Type "What can you do?" in the chatbot for capabilities.
