# 🚀 Quick Start: Resume Analyzer

## What's New?

✅ **Fixed**: Resume upload error  
✅ **Added**: Text input option - users can describe their goals instead of uploading resume  
✅ **Enhanced**: Better error handling and validation  
✅ **Improved**: UI with tabs and quick prompts  

## How It Works

### Option 1: Upload Resume
1. Click "Upload Resume Now" button on home page
2. Select "Upload Resume" tab
3. Choose your PDF/DOC/DOCX file
4. Click "Analyze My Resume"

### Option 2: Describe Goals (NEW!)
1. Click "Upload Resume Now" button on home page
2. Select "Describe Goals" tab
3. Type your background, skills, and career goals
4. Use quick prompts for help
5. Click "Analyze My Resume"

## Example Text Input

```
I'm a software engineer with 5 years of experience in Python, 
Java, and cloud computing. I have a Bachelor's degree in Computer 
Science and I'm currently working on machine learning projects. 

I want to transition into a leadership role and learn more about 
business strategy, team management, and product development. 

I'm looking for programs that can help me develop my management 
and business skills while leveraging my technical background.
```

## What Gets Analyzed?

- 🎯 **Keywords**: Professional terms (management, technology, business)
- 💼 **Skills**: Technical & soft skills (Python, leadership, communication)
- 🎓 **Education**: Degrees (Bachelor's, Master's, MBA, PhD)
- ⏱️ **Experience**: Years of work experience
- 🚀 **Goals**: Career aspirations and objectives

## Program Matching

Programs are scored based on:
- Keyword relevance (10 points each)
- Skill alignment (8 points each)
- Qualification level (15 points)
- Career goals match (20 points)
- Preferred field match (20 points)

**Top 6 programs** are recommended with:
- Match percentage
- Reasons for match
- Program details (duration, fees, university)

## Quick Prompts

### 1. Career Change
"I want to change my career path"
- Helps you describe career transition goals

### 2. Skill Upgrade
"I want to upgrade my skills"
- Focuses on skill development needs

### 3. Leadership
"I want to move into leadership"
- Emphasizes management aspirations

## Admin Dashboard

View all analyses at: **`/admin/resume-analyses`**

Features:
- 📊 Statistics (total uploads, today, this week, avg score)
- 🔍 Search and filter
- 👁️ View detailed analysis
- 📥 Download resumes
- 📈 Analytics

## API Usage

### Upload Resume
```bash
curl -X POST http://localhost:8000/api/v1/resume/upload \
  -H "X-CSRF-TOKEN: your-token" \
  -F "resume=@/path/to/resume.pdf" \
  -F "name=John Doe" \
  -F "email=john@example.com"
```

### Submit Text Input
```bash
curl -X POST http://localhost:8000/api/v1/resume/upload \
  -H "X-CSRF-TOKEN: your-token" \
  -F "user_input=I'm a software engineer..." \
  -F "name=John Doe" \
  -F "email=john@example.com"
```

## Files Changed

1. ✅ `app/Http/Controllers/ResumeAnalysisController.php` - Added text input support
2. ✅ `database/migrations/2025_12_04_000001_create_resume_analyses_table.php` - Made fields nullable
3. ✅ `resources/views/components/resume-analyzer-modal.blade.php` - Added tabs and text input
4. ✅ `routes/api.php` - Added resume analysis routes
5. ✅ `routes/web.php` - Added admin route
6. ✅ `resources/views/home.blade.php` - Added resume analyzer section

## Testing Checklist

- [ ] Open home page
- [ ] Click "Upload Resume Now"
- [ ] Test file upload (PDF)
- [ ] Test text input
- [ ] Try quick prompts
- [ ] Submit and view results
- [ ] Check matched programs
- [ ] Add preferences
- [ ] View final recommendations

## Common Issues & Solutions

### ❌ "Error uploading resume"
✅ Check file size (max 5MB) and format (PDF/DOC/DOCX)

### ❌ "No programs matched"
✅ Be more specific, include skills and goals

### ❌ Modal not opening
✅ Check browser console, ensure JavaScript loaded

### ❌ CSRF token error
✅ Refresh page, check meta tag in layout

## Next Steps

1. **Test the feature** on your local environment
2. **Add more programs** to database for better matching
3. **Customize keywords** in controller for your industry
4. **Install PDF/Word parsers** for better text extraction:
   ```bash
   composer require smalot/pdfparser phpoffice/phpword
   ```

## Support

- 📖 Full Guide: `RESUME_ANALYZER_GUIDE.md`
- 🔧 Fix Details: `RESUME_ANALYZER_FIXED.md`
- 💬 Questions? Check Laravel logs: `storage/logs/laravel.log`

---

**Ready to use!** 🎉
