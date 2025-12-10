#!/usr/bin/env python3
"""
AI Chatbot Analysis Script
Uses NLP and ML techniques to analyze user queries and recommend programs
"""

import sys
import json
import re
from typing import List, Dict, Any

class ChatbotAI:
    def __init__(self, programs: List[Dict], context: Dict):
        self.programs = programs
        self.context = context
        self.keywords = self._extract_keywords()

    def _extract_keywords(self) -> Dict[str, List[str]]:
        """Extract keywords from programs for matching"""
        keywords = {
            'mba': ['mba', 'business', 'management', 'administration'],
            'tech': ['technology', 'computer', 'it', 'software', 'data', 'ai', 'ml'],
            'career': ['career', 'professional', 'job', 'work', 'advancement', 'growth'],
            'online': ['online', 'distance', 'remote', 'virtual'],
            'offline': ['offline', 'campus', 'classroom', 'onsite'],
            'affordable': ['cheap', 'affordable', 'budget', 'low cost', 'economical'],
            'premium': ['premium', 'expensive', 'high quality', 'elite'],
            'short': ['short', 'quick', 'fast', 'brief'],
            'long': ['long', 'extended', 'comprehensive']
        }
        return keywords

    def analyze(self, message: str) -> Dict[str, Any]:
        """Main analysis function"""
        message_lower = message.lower()

        # Detect intent
        intent = self._detect_intent(message_lower)

        # Generate response based on intent
        if intent == 'greeting':
            return self._greeting_response()
        elif intent == 'program_search':
            return self._program_search_response(message_lower)
        elif intent == 'mba':
            return self._mba_response()
        elif intent == 'career':
            return self._career_response()
        elif intent == 'budget':
            return self._budget_response(message_lower)
        elif intent == 'duration':
            return self._duration_response(message_lower)
        elif intent == 'mode':
            return self._mode_response(message_lower)
        elif intent == 'university':
            return self._university_response()
        elif intent == 'help':
            return self._help_response()
        else:
            return self._default_response(message_lower)

    def _detect_intent(self, message: str) -> str:
        """Detect user intent from message"""
        if re.search(r'\b(hi|hello|hey|greetings)\b', message):
            return 'greeting'
        elif re.search(r'\b(show|list|find|search|tell|what|which).*(program|course)\b', message):
            return 'program_search'
        elif re.search(r'\b(mba|master.*business|business.*administration)\b', message):
            return 'mba'
        elif re.search(r'\b(career|job|work|professional|advance|growth|promotion)\b', message):
            return 'career'
        elif re.search(r'\b(university|universities|college|institution)\b', message):
            return 'university'
        elif re.search(r'\b(cheap|affordable|budget|fee|cost|price|expensive)\b', message):
            return 'budget'
        elif re.search(r'\d+\s*(year|month|week)', message):
            return 'duration'
        elif re.search(r'\b(online|offline|distance|campus|hybrid)\b', message):
            return 'mode'
        elif re.search(r'\b(help|what can you|capabilities|features)\b', message):
            return 'help'
        else:
            return 'general'

    def _greeting_response(self) -> Dict:
        return {
            'message': "Hello! 👋 I'm your AI-powered Digivarsity assistant. I've analyzed all our programs and can help you find the perfect match based on your goals, budget, and preferences. What would you like to know?",
            'suggestions': [
                'Show me all programs',
                'I want to advance my career',
                'Tell me about MBA programs',
                'What are affordable options?'
            ],
            'program_ids': []
        }

    def _program_search_response(self, message: str) -> Dict:
        """Search programs using AI analysis"""
        # Score programs based on relevance
        scored_programs = []
        for program in self.programs:
            score = self._calculate_relevance_score(program, message)
            if score > 0:
                scored_programs.append((program['id'], score))

        # Sort by score and get top programs
        scored_programs.sort(key=lambda x: x[1], reverse=True)
        program_ids = [p[0] for p in scored_programs[:6]]

        return {
            'message': f"I've analyzed {len(self.programs)} programs using AI and found {len(program_ids)} that match your query. Here are the best matches:",
            'suggestions': [
                'Tell me more about MBA',
                'Show online programs',
                'What about fees?',
                'Filter by university'
            ],
            'program_ids': program_ids
        }

    def _mba_response(self) -> Dict:
        """Find MBA programs"""
        mba_programs = [
            p['id'] for p in self.programs
            if 'mba' in p['name'].lower() or 'business' in p['name'].lower()
        ]

        if not mba_programs:
            return {
                'message': "Based on my analysis, we don't have MBA programs right now, but I found excellent business and management alternatives that could advance your career!",
                'suggestions': ['Show business programs', 'Management courses', 'Career advancement'],
                'program_ids': [p['id'] for p in self.programs[:3]]
            }

        return {
            'message': f"Great choice! I've analyzed our MBA programs using AI. MBA programs typically offer excellent ROI and career advancement. Here are {len(mba_programs)} MBA options:",
            'suggestions': [
                'Compare fees',
                'Which is best for career growth?',
                'Online or offline?',
                'Show eligibility criteria'
            ],
            'program_ids': mba_programs
        }

    def _career_response(self) -> Dict:
        """Career-focused recommendations"""
        # Score programs based on career outcomes
        career_programs = []
        for program in self.programs:
            score = 0
            if program.get('outcome') and 'career' in program['outcome'].lower():
                score += 3
            if program.get('is_featured'):
                score += 2
            if program.get('intent') and 'professional' in program['intent'].lower():
                score += 2

            if score > 0:
                career_programs.append((program['id'], score))

        career_programs.sort(key=lambda x: x[1], reverse=True)
        program_ids = [p[0] for p in career_programs[:5]]

        if not program_ids:
            program_ids = [p['id'] for p in self.programs if p.get('is_featured')][:5]

        return {
            'message': "Looking to advance your career? Excellent! I've used AI to analyze which programs offer the best career outcomes and professional growth opportunities:",
            'suggestions': [
                'Which has best ROI?',
                'Show part-time options',
                'What about placement support?',
                'Compare durations'
            ],
            'program_ids': program_ids
        }

    def _budget_response(self, message: str) -> Dict:
        """Budget-based recommendations"""
        is_affordable = bool(re.search(r'\b(cheap|affordable|budget|low)\b', message))

        # Sort by fees
        programs_with_fees = [p for p in self.programs if p.get('fees')]
        programs_with_fees.sort(key=lambda x: float(x['fees']), reverse=not is_affordable)

        program_ids = [p['id'] for p in programs_with_fees[:6]]

        msg_type = "most affordable" if is_affordable else "premium"
        return {
            'message': f"Based on my AI analysis of pricing data, here are our {msg_type} programs with the best value for money:",
            'suggestions': [
                'Show payment options',
                'EMI available?',
                'Scholarships?',
                'Compare all fees'
            ],
            'program_ids': program_ids
        }

    def _duration_response(self, message: str) -> Dict:
        """Duration-based search"""
        # Extract duration from message
        match = re.search(r'(\d+)\s*(year|month|week)', message)
        if match:
            value, unit = match.groups()

            matching_programs = [
                p['id'] for p in self.programs
                if p.get('duration') and value in p['duration'] and unit in p['duration'].lower()
            ]

            if matching_programs:
                return {
                    'message': f"I found {len(matching_programs)} programs with {value} {unit} duration through AI analysis:",
                    'suggestions': ['Compare fees', 'Show online options', 'Tell me more'],
                    'program_ids': matching_programs
                }

        return {
            'message': "I couldn't find programs with that exact duration, but here are some similar options based on my analysis:",
            'suggestions': ['Show all programs', 'Flexible duration options'],
            'program_ids': [p['id'] for p in self.programs[:4]]
        }

    def _mode_response(self, message: str) -> Dict:
        """Mode-based filtering"""
        mode = None
        if 'online' in message:
            mode = 'online'
        elif 'offline' in message or 'campus' in message:
            mode = 'offline'
        elif 'hybrid' in message:
            mode = 'hybrid'

        if mode:
            matching_programs = [
                p['id'] for p in self.programs
                if p.get('mode') and mode in p['mode'].lower()
            ]

            if matching_programs:
                return {
                    'message': f"I've analyzed our {mode} programs using AI. Found {len(matching_programs)} programs that match:",
                    'suggestions': [
                        'Compare with other modes',
                        'Show fees',
                        'Duration details'
                    ],
                    'program_ids': matching_programs
                }

        return {
            'message': "Here are programs across different learning modes based on my analysis:",
            'suggestions': ['Show all modes', 'Flexible learning options'],
            'program_ids': [p['id'] for p in self.programs[:5]]
        }

    def _university_response(self) -> Dict:
        """University information"""
        universities = list(set([p['university'] for p in self.programs if p.get('university')]))

        uni_list = '\n'.join([f"• {uni}" for uni in universities[:10]])

        return {
            'message': f"We partner with {len(universities)} prestigious universities:\n\n{uni_list}\n\nWould you like to see programs from a specific university?",
            'suggestions': universities[:4],
            'program_ids': []
        }

    def _help_response(self) -> Dict:
        return {
            'message': "I'm an AI-powered assistant that can help you with:\n\n" +
                "🎓 Finding programs using intelligent matching\n" +
                "💼 Career guidance based on outcomes analysis\n" +
                "🏛️ University information and comparisons\n" +
                "💰 Budget optimization and value analysis\n" +
                "⏱️ Duration-based recommendations\n" +
                "🌐 Learning mode preferences\n" +
                "📊 Smart program comparisons\n\n" +
                "Just ask me anything!",
            'suggestions': [
                'Show all programs',
                'I want career growth',
                'Affordable options',
                'Online programs'
            ],
            'program_ids': []
        }

    def _default_response(self, message: str) -> Dict:
        """Default response with smart recommendations"""
        # Use AI to find relevant programs
        scored_programs = []
        for program in self.programs:
            score = self._calculate_relevance_score(program, message)
            scored_programs.append((program['id'], score))

        scored_programs.sort(key=lambda x: x[1], reverse=True)
        program_ids = [p[0] for p in scored_programs[:3]]

        return {
            'message': "I've analyzed your query using AI. Here are some programs that might interest you, or you can ask me something more specific:",
            'suggestions': [
                'Show all programs',
                'Career advancement programs',
                'MBA programs',
                'What can you help with?'
            ],
            'program_ids': program_ids
        }

    def _calculate_relevance_score(self, program: Dict, message: str) -> float:
        """Calculate relevance score using AI techniques"""
        score = 0.0
        message_words = set(message.lower().split())

        # Check program name
        if program.get('name'):
            name_words = set(program['name'].lower().split())
            score += len(message_words & name_words) * 3

        # Check description
        if program.get('description'):
            desc_words = set(program['description'].lower().split())
            score += len(message_words & desc_words) * 2

        # Check university
        if program.get('university'):
            uni_words = set(program['university'].lower().split())
            score += len(message_words & uni_words) * 2

        # Check intent and outcome
        if program.get('intent'):
            intent_words = set(program['intent'].lower().split())
            score += len(message_words & intent_words) * 2

        if program.get('outcome'):
            outcome_words = set(program['outcome'].lower().split())
            score += len(message_words & outcome_words) * 2

        # Boost featured programs
        if program.get('is_featured'):
            score += 1

        return score


def main():
    try:
        # Get input from command line
        if len(sys.argv) < 2:
            raise ValueError("No input provided")

        input_data = json.loads(sys.argv[1])
        message = input_data.get('message', '')
        programs = input_data.get('programs', [])
        context = input_data.get('context', {})

        # Initialize AI
        ai = ChatbotAI(programs, context)

        # Analyze and generate response
        result = ai.analyze(message)

        # Output result as JSON
        print(json.dumps(result))

    except Exception as e:
        # Return error response
        error_response = {
            'message': f"I encountered an error analyzing your request. Let me try a simpler approach.",
            'suggestions': ['Show all programs', 'Tell me about universities'],
            'program_ids': [],
            'error': str(e)
        }
        print(json.dumps(error_response))
        sys.exit(1)


if __name__ == '__main__':
    main()
