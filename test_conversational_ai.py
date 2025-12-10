#!/usr/bin/env python3
"""Test conversational AI chatbot"""

import sys
import os
sys.path.insert(0, os.path.join(os.path.dirname(__file__), 'scripts'))

from chatbot_ai_openai import ConversationalChatbot

# Test data
test_programs = [
    {
        "id": 1,
        "name": "MBA in Business Management",
        "description": "Master of Business Administration program",
        "university": "Test University",
        "duration": "2 years",
        "mode": "Online",
        "fees": 200000,
        "is_featured": True
    },
    {
        "id": 2,
        "name": "Data Science Program",
        "description": "Learn data science and analytics",
        "university": "Tech University",
        "duration": "1 year",
        "mode": "Online",
        "fees": 150000,
        "is_featured": False
    }
]

print("🤖 Testing Conversational AI Chatbot")
print("=" * 60)

chatbot = ConversationalChatbot(test_programs, {})

# Test conversations (should NOT show programs, just chat)
conversations = [
    "Hello",
    "Is MBA good?",
    "Tell me about MBA programs",
    "I want to advance my career",
    "What about the fees?",
    "How long does it take?",
]

print("\n📝 CONVERSATIONAL TESTS (Should chat, not show programs):")
print("-" * 60)

for msg in conversations:
    print(f"\n👤 User: {msg}")
    result = chatbot.analyze(msg)
    print(f"🤖 Bot: {result['message'][:150]}...")
    print(f"💡 Suggestions: {result['suggestions'][:2]}")
    print(f"📚 Programs shown: {len(result['program_ids'])} (should be 0)")
    print()

# Test explicit program requests (SHOULD show programs)
program_requests = [
    "Show me all programs",
    "Show me MBA programs",
    "List available programs",
]

print("\n" + "=" * 60)
print("📋 PROGRAM DISPLAY TESTS (Should show programs):")
print("-" * 60)

for msg in program_requests:
    print(f"\n👤 User: {msg}")
    result = chatbot.analyze(msg)
    print(f"🤖 Bot: {result['message'][:100]}...")
    print(f"📚 Programs shown: {len(result['program_ids'])} (should be > 0)")
    print(f"   Program IDs: {result['program_ids']}")
    print()

print("=" * 60)
print("✅ All tests completed!")
print("\nKey Points:")
print("✓ Conversational queries should chat (0 programs)")
print("✓ Explicit 'show' requests should display programs")
print("✓ Bot provides helpful suggestions")
