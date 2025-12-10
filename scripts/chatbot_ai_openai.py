#!/usr/bin/env python3
"""
AI Chatbot with OpenAI Integration
Uses GPT for natural conversations about programs
"""

import sys
import json
import os
from typing import List, Dict, Any

# Try to import OpenAI
try:
    import openai
    HAS_OPENAI = True
except ImportError:
    HAS_OPENAI = False

class ConversationalChatbot:
    def __init__(self, programs: List[Dict], context: Dict):
        self.programs = programs
        self.context = context
        self.api_key = os.getenv('OPENAI_API_KEY', '')

        if HAS_OPENAI and self.api_key:
            openai.api_key = self.api_key

    def analyze(self, message: str) -> Dict[str, Any]:
        """Main analysis function"""
        message_lower = message.lower()

        # Check if user explicitly wants to see programs
        show_programs = self._should_show_programs(message_lower)

        if show_programs:
            return self._show_programs_response(message_lower)
        else:
            # Have a conversation using AI
            return self._conversational_response(message)

    def _should_show_programs(self, message: str) -> bool:
        """Detect if user wants to see actual programs"""
        show_keywords = [
            'show me', 'show', 'list', 'display', 'see programs',
            'view programs', 'available programs', 'what programs',
            'which programs', 'find programs', 'search programs',
            'give me programs', 'recommend programs'
        ]

        return any(keyword in message for keyword in show_keywords)

    def _conversational_response(self, message: str) -> Dict:
        """Generate conversational response using AI or fallback"""

        # Try OpenAI first
        if HAS_OPENAI and self.api_key:
            try:
                return self._openai_response(message)
            except Exception as e:
                print(f"OpenAI error: {e}", file=sys.stderr)

        # Fallback to rule-based conversation
        return self._rule_based_conversation(message)

    def _openai_response(self, message: str) -> Dict:
        """Use OpenAI GPT for natural conversation"""

        # Prepare context about available programs
        program_summary = self._get_program_summary()

        system_prompt = f"""You are a helpful educational counselor assistant for Digivarsity.
You help students find the right educational programs through friendly conversation.

Available programs summary:
{program_summary}

Guidelines:
1. Be conversational and friendly
2. Ask clarifying questions to understand their needs
3. Provide information about programs when asked
4. Only suggest showing programs when user explicitly asks to see them
5. Help them make informed decisions
6. Keep responses concise (2-3 paragraphs max)
7. Use emojis sparingly for friendliness

When user asks about programs (like "is MBA good?"), discuss the benefits, career prospects,
and ask what they want to know more about. Don't show program list unless they ask to "show" or "see" programs."""

        response = openai.ChatCompletion.create(
            model="gpt-3.5-turbo",
            messages=[
                {"role": "system", "content": system_prompt},
                {"role": "user", "content": message}
            ],
            max_tokens=300,
            temperature=0.7
        )

        ai_message = response.choices[0].message.content

        # Generate smart suggestions
        suggestions = self._generate_suggestions(message, ai_message)

        return {
            'message': ai_message,
            'suggestions': suggestions,
            'program_ids': []
        }

    def _rule_based_conversation(self, message: str) -> Dict:
        """Fallback conversational responses without showing programs"""
        message_lower = message.lower()

        # Greeting
        if any(word in message_lower for word in ['hi', 'hello', 'hey', 'greetings']):
            return {
                'message': "Hello! 👋 I'm here to help you find the perfect educational program. I can discuss different programs, career paths, and help you make the right choice.\n\nWhat are you interested in learning about? Or tell me about your career goals!",
                'suggestions': [
                    'Tell me about MBA programs',
                    'I want to advance my career',
                    'What programs do you have?',
                    'I need career guidance'
                ],
                'program_ids': []
            }

        # MBA discussion
        if 'mba' in message_lower:
            return {
                'message': "MBA programs are excellent for career advancement! 🎓\n\n" +
                    "An MBA typically offers:\n" +
                    "• Leadership and management skills\n" +
                    "• Career growth opportunities (30-50% salary increase on average)\n" +
                    "• Strong professional network\n" +
                    "• Versatility across industries\n\n" +
                    "Is MBA right for you? It depends on your career goals, experience, and aspirations.\n\n" +
                    "What specifically would you like to know about MBA programs? Or would you like to see our available MBA programs?",
                'suggestions': [
                    'Show me MBA programs',
                    'What are the fees?',
                    'Is MBA worth it for my career?',
                    'What are eligibility requirements?'
                ],
                'program_ids': []
            }

        # Career discussion
        if any(word in message_lower for word in ['career', 'job', 'professional', 'growth', 'advance']):
            return {
                'message': "Career advancement is a great goal! 💼\n\n" +
                    "To help you better, I'd like to understand:\n" +
                    "• What's your current field or industry?\n" +
                    "• What are your career aspirations?\n" +
                    "• Are you looking to switch careers or advance in your current field?\n\n" +
                    "Based on your goals, I can recommend programs that align with your career path. We have programs in business, technology, management, and more.\n\n" +
                    "Tell me more about what you're looking for!",
                'suggestions': [
                    'I want to switch careers',
                    'I want to move into management',
                    'Show me career-focused programs',
                    'What fields do you cover?'
                ],
                'program_ids': []
            }

        # Budget discussion
        if any(word in message_lower for word in ['fee', 'cost', 'price', 'afford', 'budget', 'expensive', 'cheap']):
            return {
                'message': "I understand budget is an important consideration! 💰\n\n" +
                    "Our programs range from affordable options to premium programs with extensive features. Many programs also offer:\n" +
                    "• Flexible payment plans\n" +
                    "• EMI options\n" +
                    "• Scholarship opportunities\n\n" +
                    "The investment in education often pays off through career growth and increased earning potential.\n\n" +
                    "Would you like to see programs within a specific budget range?",
                'suggestions': [
                    'Show affordable programs',
                    'Show all programs with fees',
                    'Tell me about EMI options',
                    'What about scholarships?'
                ],
                'program_ids': []
            }

        # Duration discussion
        if any(word in message_lower for word in ['duration', 'long', 'time', 'year', 'month', 'how long']):
            return {
                'message': "Program duration is an important factor! ⏱️\n\n" +
                    "We offer programs of various lengths:\n" +
                    "• Short-term (6 months - 1 year) - Quick skill upgrades\n" +
                    "• Medium-term (1-2 years) - Comprehensive learning\n" +
                    "• Long-term (2+ years) - In-depth mastery\n\n" +
                    "The right duration depends on your goals, availability, and learning pace.\n\n" +
                    "What timeframe works best for you?",
                'suggestions': [
                    'Show short-term programs',
                    'Show 2-year programs',
                    'I need flexible duration',
                    'Show all programs'
                ],
                'program_ids': []
            }

        # Online/Mode discussion
        if any(word in message_lower for word in ['online', 'offline', 'campus', 'distance', 'remote', 'mode']):
            return {
                'message': "Great question about learning modes! 💻\n\n" +
                    "We offer different learning formats:\n" +
                    "• Online - Study from anywhere, flexible schedule\n" +
                    "• Campus-based - Traditional classroom experience\n" +
                    "• Hybrid - Best of both worlds\n\n" +
                    "Online programs are popular for working professionals, while campus programs offer more networking opportunities.\n\n" +
                    "Which learning mode suits your lifestyle?",
                'suggestions': [
                    'Show online programs',
                    'Show campus programs',
                    'Tell me more about online learning',
                    'Show all programs'
                ],
                'program_ids': []
            }

        # Help/Capabilities
        if any(word in message_lower for word in ['help', 'what can you', 'capabilities', 'do']):
            return {
                'message': "I'm here to help you find the perfect educational program! 🎯\n\n" +
                    "I can help you with:\n" +
                    "• Discussing different programs and their benefits\n" +
                    "• Understanding career paths and opportunities\n" +
                    "• Comparing programs based on your needs\n" +
                    "• Answering questions about fees, duration, and eligibility\n" +
                    "• Providing personalized recommendations\n\n" +
                    "Just chat with me naturally, and I'll guide you to the right program!",
                'suggestions': [
                    'Tell me about MBA',
                    'I want career guidance',
                    'What programs do you offer?',
                    'Show me all programs'
                ],
                'program_ids': []
            }

        # Default conversational response
        return {
            'message': "I'd love to help you find the right program! 😊\n\n" +
                "To better assist you, could you tell me:\n" +
                "• What are you interested in studying?\n" +
                "• What are your career goals?\n" +
                "• Any specific requirements (budget, duration, mode)?\n\n" +
                "Feel free to ask me anything about our programs, and I'll provide detailed information!",
            'suggestions': [
                'Tell me about MBA programs',
                'I want to advance my career',
                'Show me all programs',
                'What fields do you cover?'
            ],
            'program_ids': []
        }

    def _show_programs_response(self, message: str) -> Dict:
        """Show actual programs when explicitly requested"""

        # Determine what type of programs to show
        if 'mba' in message:
            programs = [p for p in self.programs if 'mba' in p['name'].lower() or 'business' in p['name'].lower()]
            msg = "Here are our MBA programs:"
        elif 'affordable' in message or 'cheap' in message or 'budget' in message:
            programs = sorted([p for p in self.programs if p.get('fees')], key=lambda x: float(x['fees']))[:6]
            msg = "Here are our most affordable programs:"
        elif 'online' in message:
            programs = [p for p in self.programs if p.get('mode') and 'online' in p['mode'].lower()]
            msg = "Here are our online programs:"
        elif 'career' in message or 'professional' in message:
            programs = [p for p in self.programs if p.get('is_featured') or (p.get('outcome') and 'career' in p['outcome'].lower())][:6]
            msg = "Here are programs great for career advancement:"
        else:
            programs = self.programs[:6]
            msg = f"Here are {len(programs)} programs I think you'll find interesting:"

        program_ids = [p['id'] for p in programs]

        return {
            'message': msg + "\n\nTake a look at these options. Feel free to ask me questions about any of them!",
            'suggestions': [
                'Tell me more about these',
                'Compare fees',
                'Which is best for me?',
                'Show more programs'
            ],
            'program_ids': program_ids
        }

    def _get_program_summary(self) -> str:
        """Get summary of available programs for AI context"""
        if not self.programs:
            return "No programs currently available."

        summary = f"Total programs: {len(self.programs)}\n"

        # Count by type
        mba_count = len([p for p in self.programs if 'mba' in p['name'].lower()])
        if mba_count > 0:
            summary += f"MBA programs: {mba_count}\n"

        # Modes
        online_count = len([p for p in self.programs if p.get('mode') and 'online' in p['mode'].lower()])
        if online_count > 0:
            summary += f"Online programs: {online_count}\n"

        return summary

    def _generate_suggestions(self, user_message: str, ai_response: str) -> List[str]:
        """Generate contextual suggestions"""
        suggestions = []

        message_lower = user_message.lower()

        if 'mba' in message_lower:
            suggestions = [
                'Show me MBA programs',
                'What are the fees?',
                'Is it worth it?',
                'Eligibility requirements?'
            ]
        elif 'career' in message_lower:
            suggestions = [
                'Show career-focused programs',
                'What about MBA?',
                'I want to switch careers',
                'Management programs'
            ]
        else:
            suggestions = [
                'Show me all programs',
                'Tell me about MBA',
                'Career advancement options',
                'What do you recommend?'
            ]

        return suggestions[:4]


def main():
    try:
        # Get input from command line
        if len(sys.argv) < 2:
            raise ValueError("No input provided")

        input_data = json.loads(sys.argv[1])
        message = input_data.get('message', '')
        programs = input_data.get('programs', [])
        context = input_data.get('context', {})

        # Initialize conversational AI
        chatbot = ConversationalChatbot(programs, context)

        # Analyze and generate response
        result = chatbot.analyze(message)

        # Output result as JSON
        print(json.dumps(result))

    except Exception as e:
        # Return error response
        error_response = {
            'message': "I'd love to chat with you! Could you tell me more about what you're looking for in an educational program?",
            'suggestions': ['Tell me about MBA', 'Career guidance', 'Show programs', 'What can you help with?'],
            'program_ids': [],
            'error': str(e)
        }
        print(json.dumps(error_response))
        sys.exit(0)  # Don't fail, just return friendly response


if __name__ == '__main__':
    main()
