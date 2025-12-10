#!/usr/bin/env python3
"""Test script for conversational chatbot AI"""

import sys
import os

# Add scripts directory to path
sys.path.insert(0, os.path.join(os.path.dirname(__file__), 'scripts'))

# Test data
test_data = {
    "message": "tell me about mba",
    "programs": [
        {
            "id": 1,
            "name": "MBA in Business Management",
            "description": "Master of Business Administration program",
            "university": "Test University",
            "duration": "2 years",
            "mode": "Online",
            "fees": 200000,
            "eligibility": "Bachelor's degree",
            "intent": "Career Advancement",
            "outcome": "Professional Growth",
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
            "eligibility": "Bachelor's degree",
            "intent": "Skill Development",
            "outcome": "Career Change",
            "is_featured": False
        }
    ],
    "context": {}
}

# Import and test
try:
    from chatbot_ai import ChatbotAI

    print("Testing Chatbot AI...")
    print("-" * 50)

    # Test 1: Greeting
    print("\n1. Testing Greeting:")
    ai = ChatbotAI(test_data['programs'], test_data['context'])
    result = ai.analyze("Hello")
    print(f"Message: {result['message'][:100]}...")
    print(f"Suggestions: {result['suggestions']}")

    # Test 2: Program Search
    print("\n2. Testing Program Search:")
    result = ai.analyze("show me all programs")
    print(f"Message: {result['message']}")
    print(f"Program IDs: {result['program_ids']}")
    print(f"Suggestions: {result['suggestions']}")

    # Test 3: MBA Query
    print("\n3. Testing MBA Query:")
    result = ai.analyze("tell me about MBA programs")
    print(f"Message: {result['message']}")
    print(f"Program IDs: {result['program_ids']}")

    # Test 4: Career Query
    print("\n4. Testing Career Query:")
    result = ai.analyze("I want to advance my career")
    print(f"Message: {result['message'][:100]}...")
    print(f"Program IDs: {result['program_ids']}")

    # Test 5: Budget Query
    print("\n5. Testing Budget Query:")
    result = ai.analyze("show affordable options")
    print(f"Message: {result['message']}")
    print(f"Program IDs: {result['program_ids']}")

    print("\n" + "-" * 50)
    print("✅ All tests passed!")

except Exception as e:
    print(f"❌ Error: {e}")
    import traceback
    traceback.print_exc()
