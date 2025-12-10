# AI Chatbot Guide

## Overview
An intelligent AI chatbot assistant that helps users find programs, get career guidance, and answer questions about your educational offerings.

## Features

### 🤖 Smart Conversations
- Natural language understanding
- Context-aware responses
- Intelligent program recommendations
- Career guidance and suggestions

### 🎯 Capabilities
1. **Program Search** - Find programs by name, type, or keywords
2. **Career Guidance** - Get recommendations based on career goals
3. **University Information** - Learn about partner universities
4. **Budget Filtering** - Find affordable or premium programs
5. **Duration Search** - Filter by program length
6. **Mode Filtering** - Online, offline, or hybrid options
7. **Comparison** - Compare different programs

## Usage

### Access the Chatbot
- **Direct URL**: `/chatbot`
- **Floating Button**: Available on the home page (bottom-right corner)

### Example Questions

**General Queries:**
- "Show me all programs"
- "What can you help with?"
- "Tell me about your universities"

**Program Search:**
- "Show me MBA programs"
- "I want to study business"
- "Find online courses"

**Career-Focused:**
- "I want to advance my career"
- "Programs for career growth"
- "Best for job opportunities"

**Budget-Based:**
- "Show affordable programs"
- "What are the cheapest options?"
- "Premium programs"

**Duration-Based:**
- "2 year programs"
- "Short duration courses"
- "6 month programs"

**Mode-Based:**
- "Online programs"
- "Campus-based courses"
- "Hybrid learning options"

## API Endpoint

### POST `/api/v1/chatbot/chat`

**Request:**
```json
{
  "message": "Show me MBA programs",
  "context": {}
}
```

**Response:**
```json
{
  "success": true,
  "response": "Great choice! MBA programs are perfect for career advancement...",
  "suggestions": [
    "Compare fees",
    "Which is best for career growth?",
    "Online or offline?"
  ],
  "programs": [
    {
      "id": 1,
      "name": "MBA in Business Management",
      "description": "...",
      "university": "University Name",
      "duration": "2 years",
      "mode": "Online",
      "fees": "₹200,000.00",
      "image": "/path/to/image.jpg"
    }
  ]
}
```

## Customization

### Adding New Response Patterns

Edit `app/Http/Controllers/Api/ChatbotController.php`:

```php
// Add new pattern in generateResponse method
if (preg_match('/your-pattern/i', $message)) {
    return $this->yourCustomMethod($message);
}
```

### Modifying Suggestions

Update the suggestions array in any response method:

```php
'suggestions' => [
    'Your custom suggestion 1',
    'Your custom suggestion 2',
    'Your custom suggestion 3'
]
```

### Styling

The chatbot UI can be customized in `resources/views/chatbot.blade.php`:
- Colors: Modify Tailwind classes
- Layout: Adjust the flex containers
- Animations: Update CSS animations

## Integration

### Add Floating Button to Any Page

Include the floating button component:

```blade
@include('components.chatbot-button')
```

### Embed Widget Inline

Add the inline widget to any page:

```blade
@include('components.chatbot-widget')
```

Example usage in a page:

```blade
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h2>Your Content Here</h2>
            <p>Page content...</p>
        </div>
        <div>
            @include('components.chatbot-widget')
        </div>
    </div>
</div>
```

### Embed in Layout

Add to your main layout file before `</body>`:

```blade
@include('components.chatbot-button')
```

## Technical Details

### Controller
- **Location**: `app/Http/Controllers/Api/ChatbotController.php`
- **Method**: `chat(Request $request)`
- **Returns**: JSON response with message, programs, and suggestions

### View
- **Location**: `resources/views/chatbot.blade.php`
- **Layout**: Extends `layouts.app`
- **Features**: Real-time chat, typing indicators, quick suggestions

### Routes
- **API**: `POST /api/v1/chatbot/chat`
- **Web**: `GET /chatbot`

## Features in Detail

### 1. Pattern Matching
The chatbot uses regex patterns to understand user intent:
- Greetings
- Program searches
- Career queries
- Budget questions
- Duration filters
- Mode preferences

### 2. Program Recommendations
Intelligently suggests programs based on:
- User query keywords
- Intent and outcome matching
- Featured programs
- Random selection for variety

### 3. Quick Suggestions
Dynamic suggestions based on:
- Previous conversation
- Available programs
- Common user queries

### 4. Program Display
Each program shows:
- Name and description
- University
- Duration
- Mode (online/offline)
- Fees
- Direct link to details

## Best Practices

1. **Keep Messages Clear**: Use simple, conversational language
2. **Provide Context**: Include relevant information in responses
3. **Offer Suggestions**: Always give users next steps
4. **Show Programs**: Visual program cards are more engaging
5. **Handle Errors**: Gracefully handle API failures

## Future Enhancements

Potential improvements:
- [ ] Multi-language support
- [ ] Voice input/output
- [ ] Chat history persistence
- [ ] User authentication integration
- [ ] Advanced NLP with machine learning
- [ ] Integration with CRM for lead capture
- [ ] Sentiment analysis
- [ ] A/B testing for responses

## Troubleshooting

### Chatbot Not Responding
1. Check API endpoint is accessible
2. Verify database has programs
3. Check browser console for errors
4. Ensure CSRF token is valid

### Programs Not Showing
1. Verify programs are marked as `is_active = true`
2. Check program relationships (university, intent, outcome)
3. Ensure images are accessible

### Styling Issues
1. Clear browser cache
2. Check Tailwind CDN is loading
3. Verify Font Awesome icons are loading

## Support

For issues or questions:
1. Check the console logs
2. Review the API response
3. Verify database records
4. Test with simple queries first

---

**Version**: 1.0  
**Last Updated**: December 2025
