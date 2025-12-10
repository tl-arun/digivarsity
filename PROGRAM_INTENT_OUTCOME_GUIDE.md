# Program Intent & Outcome Feature Guide

## Overview
Programs now support selecting an Intent and Outcome that will be displayed as hero cards on the program details page.

## What Was Added

### 1. Database Changes
- Added `intent_id` and `outcome_id` columns to the `programs` table
- Both fields are nullable and have foreign key constraints

### 2. Model Updates
- Updated `Program` model to include `intent_id` and `outcome_id` in fillable fields
- Added `intent()` and `outcome()` relationships to the Program model

### 3. Admin Interface
- Added Intent and Outcome dropdown selectors in the program creation/edit form
- Dropdowns are populated from the intents and outcomes tables
- Both fields are optional

### 4. Program Details Page
- Created a new program details view at `/programs/{id}`
- Displays Intent and Outcome as beautiful hero cards at the top of the page
- Shows:
  - Intent card with icon, name, and description
  - Outcome card with icon, name, and description
  - Full program details including image, description, curriculum, eligibility
  - Program sidebar with fees, duration, mode, type
  - Student testimonials
  - Enrollment form

## How to Use

### Adding Intent/Outcome to a Program

1. Go to Admin → Programs
2. Click "Add Program" or edit an existing program
3. Fill in the program details
4. Select an Intent from the dropdown (optional)
5. Select an Outcome from the dropdown (optional)
6. Save the program

### Viewing Program Details

1. Go to the public Programs page
2. Click "View" on any program card
3. You'll see the Intent and Outcome displayed as hero cards at the top
4. Below that, all program details are shown

## Features

### Hero Section
- Animated gradient background
- Program name, university, and duration
- Intent card (blue theme) - shows what the student wants to achieve
- Outcome card (green theme) - shows what they will get after completion

### Program Details
- Program image
- About section
- Curriculum
- Eligibility criteria
- Sidebar with key details (fees, duration, mode, type)
- Enrollment button

### Enrollment
- Click "Enroll Now" to open enrollment modal
- Form captures: name, email, phone, message
- Automatically includes program_id, intent_id, and outcome_id
- Submits as a lead to the system

## API Changes

### Program Resource
Programs now include `intent` and `outcome` relationships when fetched:
```json
{
  "id": 1,
  "name": "MBA in Digital Marketing",
  "intent": {
    "id": 1,
    "name": "Career Advancement",
    "description": "Advance your career to the next level"
  },
  "outcome": {
    "id": 1,
    "name": "Leadership Role",
    "description": "Secure a leadership position in your field"
  }
}
```

## Testing

1. Create or edit a program and select an intent and outcome
2. Visit the program details page
3. Verify the intent and outcome cards are displayed
4. Test the enrollment form
5. Check that the lead is created with the correct intent_id and outcome_id

## Notes

- Intent and Outcome are optional fields
- If not selected, the hero cards won't be displayed
- The program details page will still show all other program information
- Make sure you have intents and outcomes created in the admin panel first
