# 🧪 Digivarsity - Complete Testing Guide

## ✅ System is Now Fully Populated with Fake Data!

### **What's Been Added:**
- ✅ 8 Universities (Harvard, Stanford, MIT, Oxford, Cambridge, IIM, IIT, XLRI)
- ✅ 10 Programs (MBA, Data Science, Finance, HR, etc.)
- ✅ 7 Intents (Career Advancement, Skill Development, etc.)
- ✅ 7 Outcomes (Leadership Role, Salary Hike, etc.)
- ✅ 25+ Testimonials (realistic student reviews)
- ✅ 15 Leads (with different statuses)
- ✅ 2 Admin Users (Admin & Counselor)

---

## 🚀 Step-by-Step Testing Guide

### **Step 1: Access the Home Page**

1. Open browser: **http://127.0.0.1:8000**
2. You should see:
   - Hero section with "Welcome to Digivarsity"
   - Statistics showing real numbers (10 programs, 8 universities, etc.)
   - 3 Featured programs with details
   - Professional design with Tailwind CSS

### **Step 2: Browse Programs**

1. Click "Explore Programs" or go to: **http://127.0.0.1:8000/programs**
2. You should see:
   - All 10 programs in a grid layout
   - Search box (try searching "MBA" or "Data")
   - Filter by Type dropdown (Online, ODL, Work-Linked, Executive)
   - Filter by University dropdown (Harvard, Stanford, etc.)
   - Sort by dropdown (Name, Fees Low to High, Fees High to Low)
3. **Test Filters:**
   - Select "Online" in Type filter → See only online programs
   - Select "Harvard University" → See only Harvard programs
   - Type "MBA" in search → See only MBA programs
   - Change sort to "Fees: Low to High" → Programs sorted by price

### **Step 3: View Program Details**

1. Click "View Details" on any program
2. You should see:
   - Complete program information
   - University name and details
   - Duration, Mode, Fees
   - Full description
   - Curriculum details
   - Eligibility criteria
   - Learning Intents (tags)
   - Career Outcomes (tags)
   - **Student Testimonials** (2-3 real testimonials)
   - **Lead Submission Form** on the right sidebar

### **Step 4: Submit a Lead (Test Form)**

1. On any program detail page, fill the form:
   - Name: "Test User"
   - Email: "test@example.com"
   - Phone: "9999999999"
   - Message: "I'm interested in this program"
2. Click "Submit Inquiry"
3. You should see:
   - Green success toast: "Thank you! We will contact you soon."
   - Form clears automatically
   - **No page refresh!**

### **Step 5: Login to Admin Panel**

1. Go to: **http://127.0.0.1:8000/login**
2. Enter credentials:
   ```
   Email: admin@digivarsity.com
   Password: password
   ```
3. Click "Login"
4. You should see:
   - Green toast: "Login successful!"
   - **Automatic redirect to dashboard** (http://127.0.0.1:8000/admin/dashboard)
   - No page refresh during login!

### **Step 6: Explore Dashboard**

1. You should see:
   - **4 Stat Cards:**
     - Total Programs: 10
     - Total Leads: 15+
     - Total Intents: 7
     - Total Outcomes: 7
   - **Leads by Status Chart** (visual breakdown)
   - **Top Programs by Leads** (top 5 programs)
   - **Quick Action Buttons**
   - User name and role in top right
   - Sidebar with all menu items

### **Step 7: Manage Programs**

1. Click "Programs" in sidebar
2. You should see:
   - Table with all 10 programs
   - Search box
   - "Add Program" button
3. **Test Search:**
   - Type "MBA" → See only MBA programs
   - Clear search → See all programs again
4. **Test Create:**
   - Click "Add Program"
   - Modal opens (no page refresh!)
   - Fill form:
     - Name: "Test Program"
     - Type: "online"
     - University: Select any
     - Duration: "1 year"
     - Fees: 100000
     - Description: "Test description"
   - Click "Save Program"
   - Green toast: "Program created successfully"
   - New program appears in table instantly!
5. **Test Edit:**
   - Click edit icon (pencil) on any program
   - Modal opens with pre-filled data
   - Change name to "Updated Program Name"
   - Click "Save Program"
   - Toast: "Program updated successfully"
   - Table updates instantly!
6. **Test Delete:**
   - Click delete icon (trash) on test program
   - Confirmation dialog appears
   - Click OK
   - Toast: "Program deleted successfully"
   - Program removed from table instantly!

### **Step 8: Manage Intents**

1. Click "Intents" in sidebar
2. You should see:
   - 7 intent cards in grid layout
   - "Add Intent" button
3. **Test Create:**
   - Click "Add Intent"
   - Fill form:
     - Name: "Test Intent"
     - Description: "Test description"
   - Click "Save"
   - New intent card appears instantly!
4. **Test Edit & Delete:**
   - Click edit icon → Modal opens
   - Click delete icon → Intent removed

### **Step 9: Manage Outcomes**

1. Click "Outcomes" in sidebar
2. You should see:
   - 7 outcome cards in grid layout
   - Same CRUD operations as Intents
3. Test create, edit, delete (same as Intents)

### **Step 10: Manage Universities**

1. Click "Universities" in sidebar
2. You should see:
   - 8 university cards (Harvard, Stanford, MIT, etc.)
   - "Add University" button
3. **Test Create:**
   - Click "Add University"
   - Fill form:
     - Name: "Test University"
     - Location: "Test City"
     - Website: "https://test.edu"
     - Description: "Test description"
   - Click "Save"
   - New university appears instantly!

### **Step 11: View Leads**

1. Click "Leads" in sidebar
2. You should see:
   - Table with 15+ leads
   - Filter by Status dropdown
   - Search box
3. **Test Filter:**
   - Select "new" in status filter
   - See only new leads
   - Select "converted" → See converted leads
4. **Test Search:**
   - Type a name in search box
   - Table filters instantly
5. You should see lead details:
   - Name, Email, Phone
   - Program name
   - Status badge (color-coded)
   - Source
   - Date

### **Step 12: View Users**

1. Click "Users" in sidebar
2. You should see:
   - 2 users (Admin & Counselor)
   - "Add User" button
3. **Test Create:**
   - Click "Add User"
   - Fill form with user details
   - Click "Save User"
   - User appears in table

### **Step 13: Test Logout**

1. Click "Logout" button in top right
2. You should see:
   - Loading overlay
   - Automatic redirect to login page
   - Token removed from localStorage

---

## 🎯 What to Look For (Quality Checks)

### **✅ UI/UX:**
- [ ] Clean, modern design
- [ ] Consistent colors (Indigo/Purple theme)
- [ ] Responsive layout (try resizing browser)
- [ ] Smooth animations
- [ ] Professional typography
- [ ] Icons display correctly

### **✅ Functionality:**
- [ ] No page refreshes during operations
- [ ] Toast notifications appear and disappear
- [ ] Loading overlays show during API calls
- [ ] Modals open and close smoothly
- [ ] Forms validate properly
- [ ] Search works instantly
- [ ] Filters work correctly
- [ ] Pagination works (if more than 15 items)

### **✅ Data:**
- [ ] All 10 programs display
- [ ] All 8 universities display
- [ ] All 7 intents display
- [ ] All 7 outcomes display
- [ ] Testimonials show on program details
- [ ] Leads show in admin panel
- [ ] Dashboard stats are accurate

### **✅ AJAX:**
- [ ] Create operations work without refresh
- [ ] Edit operations work without refresh
- [ ] Delete operations work without refresh
- [ ] Search filters without refresh
- [ ] Login redirects without refresh
- [ ] Logout redirects without refresh

---

## 🐛 Common Issues & Solutions

### **Issue: Login doesn't redirect**
**Solution:** 
- Open browser console (F12)
- Check for JavaScript errors
- Verify token is saved in localStorage
- Try clearing localStorage and login again

### **Issue: No data showing**
**Solution:**
- Run: `php artisan db:seed`
- Refresh the page
- Check browser console for API errors

### **Issue: 404 errors**
**Solution:**
- Ensure server is running: `php artisan serve`
- Check URL is correct
- Verify routes in `routes/web.php` and `routes/api.php`

### **Issue: CORS errors**
**Solution:**
- API and frontend are on same domain, no CORS needed
- If separated, configure CORS in Laravel

---

## 📊 Expected Data Counts

After seeding, you should have:
- **Programs:** 10
- **Universities:** 8
- **Intents:** 7
- **Outcomes:** 7
- **Testimonials:** 25+
- **Leads:** 15
- **Users:** 2 (Admin & Counselor)

---

## 🎬 Demo Scenario

### **Scenario: New Student Journey**

1. **Discovery:**
   - Student visits home page
   - Sees statistics and featured programs
   - Clicks "Explore Programs"

2. **Research:**
   - Browses all programs
   - Filters by "Online" type
   - Searches for "MBA"
   - Finds "MBA in Digital Marketing"

3. **Details:**
   - Clicks "View Details"
   - Reads program information
   - Checks curriculum and fees
   - Reads student testimonials

4. **Inquiry:**
   - Fills lead form
   - Submits inquiry
   - Receives confirmation

5. **Admin Follow-up:**
   - Admin logs in
   - Checks dashboard
   - Views new lead in Leads section
   - Contacts student

---

## ✅ Final Checklist

Before considering testing complete, verify:

- [ ] Home page loads with data
- [ ] Programs page shows all programs
- [ ] Program detail page shows complete info
- [ ] Lead form submits successfully
- [ ] Login works and redirects to dashboard
- [ ] Dashboard shows accurate statistics
- [ ] All CRUD operations work (Create, Read, Update, Delete)
- [ ] Search and filters work
- [ ] No page refreshes during operations
- [ ] Toast notifications appear
- [ ] Logout works and redirects to login
- [ ] All 10 programs visible
- [ ] All 8 universities visible
- [ ] Testimonials display on program pages
- [ ] Leads display in admin panel

---

## 🎉 Success Criteria

**System is working perfectly if:**
1. ✅ All pages load without errors
2. ✅ Data displays correctly
3. ✅ CRUD operations work via AJAX
4. ✅ No page refreshes
5. ✅ Authentication works
6. ✅ Redirects work automatically
7. ✅ UI is responsive and professional
8. ✅ All fake data is visible

---

**Status: ✅ READY FOR TESTING!**

Open your browser and start testing now: **http://127.0.0.1:8000**
