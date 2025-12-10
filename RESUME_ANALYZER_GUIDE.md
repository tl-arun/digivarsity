# 🎯 AI Resume Analyzer Feature

## Overview
The AI Resume Analyzer is a powerful feature that allows users to upload their resumes and get personalized program recommendations based on their skills, experience, and qualifications.

## Features

### 1. **Resume Upload**
- Supports PDF, DOC, and DOCX formats
- Maximum file size: 5MB
- Optional contact information (name, email, phone)

### 2. **AI Analysis**
The system automatically extracts:
- **Keywords**: Professional terms and industry-specific words
- **Skills**: Technical and soft skills (Python, Java, Leadership, etc.)
- **Education**: Degrees and qualifications (Bachelor's, Master's, MBA, etc.)
- **Work Experience**: Years of experience
- **Highest Qualification**: Determined from education history

### 3. **Smart Matching**
Programs are matched based on:
- Keyword relevance (10 points per match)
- Skill alignment (8 points per match)
- Qualification level (15 points)
- Career goals (20 points)
- Preferred field (20 points)

### 4. **Personalized Recommendations**
- Top 6 matched programs
- Match score percentage
- Reasons for each match
- Program details (duration, fees, university)

## How It Works

### User Flow:
1. **Upload Resume** → User uploads their resume file
2. **AI Analysis** → System extracts text and analyzes content
3. **Set Preferences** (Optional) → User can specify career goals and preferred field
4. **View Results** → See matched programs with scores and reasons

### Technical Flow:
```
Resume Upload → Text Extraction → Keyword/Skill Analysis → 
Program Matching → Score Calculation → Display Results
```

## API Endpoints

### 1. Upload Resume
```
POST /api/v1/resume/upload
```

**Request:**
- `resume` (file, required): Resume file (PDF/DOC/DOCX)
- `name` (string, optional): User's name
- `email` (string, optional): User's email
- `phone` (string, optional): User's phone

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "analysis": {
      "keywords": ["management", "leadership", "business"],
      "skills": ["python", "project management", "communication"],
      "highest_qualification": "Master",
      "years_of_experience": 5,
      "education": ["Master", "Bachelor"],
      "work_experience": [{"years": 5}]
    },
    "matched_programs": [
      {
        "program_id": 1,
        "program_name": "MBA in Business Management",
        "university_name": "Harvard University",
        "match_score": 85,
        "reasons": [
          "Matches your interest in Management",
          "Aligns with your Leadership skills"
        ],
        "duration": "2 years",
        "fees": "₹15,00,000"
      }
    ]
  }
}
```

### 2. Update Preferences
```
POST /api/v1/resume/{id}/preferences
```

**Request:**
```json
{
  "career_goals": "Become a data scientist",
  "preferred_field": "technology"
}
```

**Response:**
```json
{
  "success": true,
  "matched_programs": [...]
}
```

## Database Schema

### `resume_analyses` Table
```sql
- id (bigint, primary key)
- name (string, nullable)
- email (string, nullable)
- phone (string, nullable)
- file_path (string)
- file_name (string)
- extracted_text (text, nullable)
- keywords (json, nullable)
- skills (json, nullable)
- highest_qualification (string, nullable)
- years_of_experience (integer, nullable)
- work_experience (json, nullable)
- education (json, nullable)
- matched_programs (json, nullable)
- career_goals (text, nullable)
- preferred_field (string, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

## Installation & Setup

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Create Storage Link (if not exists)
```bash
php artisan storage:link
```

### 3. Install PDF/Word Parsing Libraries (Optional)
For better text extraction:

```bash
# For PDF parsing
composer require smalot/pdfparser

# For Word document parsing
composer require phpoffice/phpword
```

## Usage on Home Page

The feature is prominently displayed on the home page with:

1. **Hero Section Button**: "Upload Resume Now" button
2. **Dedicated Section**: Full section explaining the feature
3. **Modal Interface**: Beautiful step-by-step modal for the entire process

### Opening the Modal
```javascript
openResumeModal()
```

### Closing the Modal
```javascript
closeResumeModal()
```

## Customization

### Adding More Skills/Keywords
Edit `ResumeAnalysisController.php`:

```php
private function extractSkills($text)
{
    $skillPatterns = [
        // Add your custom skills here
        'your_skill', 'another_skill'
    ];
}
```

### Adjusting Match Scoring
Edit the `matchPrograms()` method:

```php
// Keyword match
if (stripos($programText, $keyword) !== false) {
    $score += 10; // Adjust this value
}
```

## Security Features

- File type validation (only PDF, DOC, DOCX)
- File size limit (5MB)
- Secure file storage in `storage/app/public/resumes`
- CSRF protection on all forms
- Input sanitization

## Future Enhancements

1. **Advanced AI Integration**
   - OpenAI GPT for better analysis
   - Natural Language Processing (NLP)
   - Sentiment analysis

2. **Enhanced Matching**
   - Industry-specific matching
   - Salary expectations
   - Location preferences

3. **Resume Feedback**
   - Resume quality score
   - Improvement suggestions
   - ATS optimization tips

4. **Admin Dashboard**
   - View all uploaded resumes
   - Analytics and insights
   - Export data

## Troubleshooting

### Issue: Text extraction not working
**Solution**: Install PDF/Word parsing libraries:
```bash
composer require smalot/pdfparser phpoffice/phpword
```

### Issue: File upload fails
**Solution**: Check storage permissions:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Issue: No programs matched
**Solution**: 
- Ensure programs exist in database
- Check if programs are marked as active
- Verify program descriptions contain relevant keywords

## Support

For issues or questions, contact the development team or check the main documentation.

---

**Built with ❤️ for Digivarsity**
