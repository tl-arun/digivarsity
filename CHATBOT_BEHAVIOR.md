# 🤖 Chatbot Behavior Reference

## Quick Overview

Your chatbot now **chats first, shows programs only when asked**.

## 🗣️ Conversational Queries (No Programs Shown)

| User Says | Bot Response |
|-----------|--------------|
| "Hello" | Greets and asks about goals |
| "Is MBA good?" | Discusses MBA benefits, career growth |
| "Tell me about MBA" | Explains MBA advantages, asks questions |
| "I want career growth" | Asks about current field, aspirations |
| "What about fees?" | Discusses budget, payment options |
| "How long?" | Explains duration options |
| "Online or offline?" | Discusses learning modes |

**Result**: Bot provides information, asks questions, gives suggestions. **NO programs displayed**.

## 📋 Display Queries (Programs Shown)

| User Says | Bot Response |
|-----------|--------------|
| "Show me programs" | Displays all programs |
| "Show MBA programs" | Displays MBA programs |
| "List programs" | Displays programs |
| "Display programs" | Displays programs |
| "See programs" | Displays programs |
| "View programs" | Displays programs |
| "Find programs" | Displays programs |
| "Give me programs" | Displays programs |

**Result**: Bot displays program cards with details.

## 🎯 Keywords That Trigger Program Display

```
show, list, display, see, view, find, search, give me, recommend
```

If user message contains these + "program", programs are shown.

## 💬 Example Flows

### Flow 1: Conversational
```
User: "Is MBA worth it?"
Bot: Discusses MBA value, ROI, career benefits
     Asks: "What would you like to know?"
     
User: "What are the fees?"
Bot: Discusses budget, payment plans
     Suggests: "Show me affordable programs"
     
User: "Show me affordable programs"
Bot: Displays program cards sorted by fees
```

### Flow 2: Direct
```
User: "Show me all programs"
Bot: Displays all program cards immediately
```

## ✅ Testing

### Test Conversation (Should NOT show programs):
```
"Hello"
"Is MBA good?"
"Tell me about MBA"
"I want career growth"
"What about fees?"
```

### Test Display (SHOULD show programs):
```
"Show me programs"
"Show MBA programs"
"List all programs"
```

## 🚀 Quick Start

1. Visit: `http://localhost/`
2. Click AI button
3. Type: "Is MBA good?"
4. Bot chats (no programs)
5. Type: "Show me MBA programs"
6. Bot displays programs

---

**Remember**: Chat first, show programs only when asked! 🎯
