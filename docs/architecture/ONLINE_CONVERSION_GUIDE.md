# Quick Guide: Convert Diagrams to JPG Online

## 🚀 Fastest Method (No Installation Required)

### Step 1: Go to Mermaid Live Editor
Open: **https://mermaid.live/**

### Step 2: Convert Each Diagram

#### Diagram 1: System Architecture
1. Open `docs/architecture/1-system-architecture.mmd`
2. Copy all content (Ctrl+A, Ctrl+C)
3. Paste into Mermaid Live Editor
4. Click "Actions" → "PNG" to download
5. Convert PNG to JPG using:
   - Windows Paint (Open PNG → Save As → JPG)
   - Online: https://convertio.co/png-jpg/

#### Diagram 2: Docker Architecture
1. Open `docs/architecture/2-docker-architecture.mmd`
2. Copy all content
3. Paste into Mermaid Live Editor
4. Download as PNG
5. Convert to JPG

#### Diagram 3: Database Schema
1. Open `docs/architecture/3-database-schema.mmd`
2. Copy all content
3. Paste into Mermaid Live Editor
4. Download as PNG
5. Convert to JPG

## 📋 All Diagrams Available

The following .mmd files are ready in `docs/architecture/`:
- `1-system-architecture.mmd` - Complete system overview
- `2-docker-architecture.mmd` - Docker container setup
- `3-database-schema.mmd` - Database relationships

## 🎨 Alternative Online Tools

### Option 1: Kroki
- URL: https://kroki.io/
- Supports Mermaid
- Direct PNG/SVG export

### Option 2: Draw.io
- URL: https://app.diagrams.net/
- File → Import → Text
- Paste Mermaid code
- Export as JPG directly

### Option 3: Mermaid Chart
- URL: https://www.mermaidchart.com/
- Professional diagram editor
- Direct export to multiple formats

## 🖼️ PNG to JPG Conversion

### Online Converters:
- https://convertio.co/png-jpg/
- https://www.iloveimg.com/convert-to-jpg
- https://cloudconvert.com/png-to-jpg

### Windows Built-in:
1. Open PNG in Paint
2. File → Save As
3. Choose "JPEG picture"
4. Save

## 📦 Automated Method (If you have Node.js)

```bash
# Run the batch file
convert-to-jpg.bat
```

This will:
1. Extract all diagrams
2. Install Mermaid CLI (if needed)
3. Convert to PNG automatically
4. Open the output folder

## ✅ Expected Output

After conversion, you should have:
```
docs/architecture/
├── 1-system-architecture.jpg
├── 2-docker-architecture.jpg
└── 3-database-schema.jpg
```

## 💡 Tips

- Use transparent background for better presentation
- Export at high resolution (2x or 3x)
- JPG quality: 90-95% for best results
- Consider PNG if you need transparency

## 🆘 Need Help?

If online conversion doesn't work:
1. Take a screenshot of the rendered diagram
2. Crop and save as JPG
3. Or use the automated script if you have Node.js installed
