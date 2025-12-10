# Chatbot Testing Guide

## Quick Test

### 1. Access the Chatbot
```
http://localhost/chatbot
```

### 2. Test Queries

Try these sample questions:

#### Basic Greetings
- "Hello"
- "Hi there"
- "Good morning"

**Expected**: Welcome message with capabilities list

#### Program Search
- "Show me all programs"
- "List all courses"
- "What programs do you have?"

**Expected**: List of available programs with details

#### MBA Specific
- "Tell me about MBA programs"
- "Show MBA courses"
- "I want to do MBA"

**Expected**: MBA programs with comparison options

#### Career Guidance
- "I want to advance my career"
- "Help me grow professionally"
- "Career development programs"

**Expected**: Career-focused programs with ROI suggestions

#### Budget Queries
- "Show affordable programs"
- "What are the cheapest options?"
- "Budget-friendly courses"

**Expected**: Programs sorted by fees (ascending)

#### Duration Filters
- "2 year programs"
- "Show 6 month courses"
- "1 year programs"

**Expected**: Programs matching the duration

#### Mode Filters
- "Online programs"
- "Offline courses"
- "Distance learning"

**Expected**: Programs filtered by mode

#### University Info
- "Tell me about universities"
- "Which universities do you have?"
- "Show all colleges"

**Expected**: List of partner universities

#### Help
- "What can you do?"
- "Help me"
- "Show capabilities"

**Expected**: List of chatbot features

## API Testing

### Using cURL

```bash
curl -X POST http://localhost/api/v1/chatbot/chat \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"message": "Show me all programs"}'
```

### Using Postman

1. Create new POST request
2. URL: `http://localhost/api/v1/chatbot/chat`
3. Headers:
   - `Content-Type: application/json`
   - `Accept: application/json`
4. Body (raw JSON):
```json
{
  "message": "Show me MBA programs"
}
```

### Expected Response Format

```json
{
  "success": true,
  "response": "Message text here...",
  "suggestions": [
    "Suggestion 1",
    "Suggestion 2",
    "Suggestion 3"
  ],
  "programs": [
    {
      "id": 1,
      "name": "Program Name",
      "description": "Description...",
      "university": "University Name",
      "duration": "2 years",
      "mode": "Online",
      "fees": "₹200,000.00",
      "image": "/path/to/image.jpg",
      "is_featured": true
    }
  ],
  "context": {}
}
```

## UI Testing

### Visual Elements to Check

1. **Chat Header**
   - ✓ Robot icon visible
   - ✓ "Online - Ready to help" status
   - ✓ Gradient background

2. **Welcome Message**
   - ✓ Shows on page load
   - ✓ Lists capabilities
   - ✓ Has checkmark icons

3. **Quick Suggestions**
   - ✓ 4 suggestion buttons visible
   - ✓ Buttons are clickable
   - ✓ Updates after bot response

4. **Chat Input**
   - ✓ Placeholder text visible
   - ✓ Auto-resizes on typing
   - ✓ Enter key sends message
   - ✓ Shift+Enter adds new line

5. **Messages**
   - ✓ User messages on right (purple gradient)
   - ✓ Bot messages on left (white background)
   - ✓ Timestamps show "Just now"
   - ✓ Smooth animations

6. **Program Cards**
   - ✓ Image displays (if available)
   - ✓ Name, university, duration visible
   - ✓ Mode and fees badges
   - ✓ "View Details" link works

7. **Typing Indicator**
   - ✓ Shows while waiting for response
   - ✓ Three bouncing dots
   - ✓ Removes after response

### Interaction Testing

1. **Send Message**
   - Type message
   - Click Send or press Enter
   - Message appears on right
   - Input clears
   - Typing indicator shows
   - Bot response appears

2. **Quick Suggestions**
   - Click suggestion button
   - Message auto-fills
   - Sends automatically
   - New suggestions appear

3. **Scroll Behavior**
   - Auto-scrolls to bottom
   - Smooth scrolling
   - Custom scrollbar visible

4. **Responsive Design**
   - Test on mobile (< 768px)
   - Test on tablet (768px - 1024px)
   - Test on desktop (> 1024px)

## Browser Testing

Test in:
- ✓ Chrome/Edge (latest)
- ✓ Firefox (latest)
- ✓ Safari (latest)
- ✓ Mobile browsers

## Performance Testing

1. **Load Time**
   - Page loads in < 2 seconds
   - No console errors

2. **Response Time**
   - API responds in < 1 second
   - Typing indicator shows immediately

3. **Memory Usage**
   - No memory leaks after 50+ messages
   - Smooth scrolling maintained

## Error Handling

### Test Error Scenarios

1. **Empty Message**
   - Try sending empty message
   - Should not send

2. **API Failure**
   - Simulate network error
   - Should show error message
   - Should offer retry suggestions

3. **No Programs**
   - Test with empty database
   - Should show friendly message
   - Should offer alternatives

4. **Long Messages**
   - Send 1000+ character message
   - Should handle gracefully
   - Should validate max length

## Accessibility Testing

1. **Keyboard Navigation**
   - Tab through elements
   - Enter to send message
   - Escape to close (if modal)

2. **Screen Reader**
   - Test with NVDA/JAWS
   - All elements announced
   - Proper ARIA labels

3. **Color Contrast**
   - Text readable on backgrounds
   - Meets WCAG AA standards

## Integration Testing

1. **Floating Button**
   - Visible on home page
   - Bottom-right position
   - Links to /chatbot
   - Hover effect works

2. **Navigation**
   - Back button works
   - Close button returns home
   - Direct URL access works

3. **Program Links**
   - "View Details" opens program page
   - Correct program ID in URL
   - Page loads successfully

## Database Requirements

Ensure database has:
- ✓ Active programs (`is_active = true`)
- ✓ Programs with universities
- ✓ Programs with intents/outcomes
- ✓ Various durations and modes
- ✓ Different fee ranges

## Common Issues & Solutions

### Issue: No programs showing
**Solution**: 
```sql
UPDATE programs SET is_active = 1;
```

### Issue: Images not loading
**Solution**: Check image paths and public folder permissions

### Issue: API 404 error
**Solution**: Run `php artisan route:clear`

### Issue: CSRF token mismatch
**Solution**: Refresh page or clear browser cache

### Issue: Styling broken
**Solution**: Check Tailwind CDN is loading

## Test Checklist

- [ ] Chatbot page loads successfully
- [ ] Welcome message displays
- [ ] Can send messages
- [ ] Bot responds appropriately
- [ ] Programs display correctly
- [ ] Suggestions update dynamically
- [ ] Quick suggestion buttons work
- [ ] Typing indicator shows/hides
- [ ] Scroll behavior works
- [ ] Floating button visible on home
- [ ] Responsive on mobile
- [ ] No console errors
- [ ] API endpoint accessible
- [ ] Error handling works
- [ ] All test queries work

## Success Criteria

✅ **Functional**
- All queries return appropriate responses
- Programs display with correct information
- Suggestions are relevant and clickable
- Error handling is graceful

✅ **Performance**
- Page loads quickly
- API responds in < 1 second
- Smooth animations
- No lag with multiple messages

✅ **UX**
- Intuitive interface
- Clear visual hierarchy
- Helpful suggestions
- Easy to use

✅ **Accessibility**
- Keyboard navigable
- Screen reader friendly
- Good color contrast
- Responsive design

---

**Ready to Test!** Start with the basic queries and work through each category.
