# Convert Architecture Diagrams to JPG

## Method 1: Online Mermaid Live Editor (Recommended)

### Steps:
1. Go to: https://mermaid.live/
2. Open `ARCHITECTURE_VISUAL.md`
3. Copy one diagram at a time (the code between ```mermaid and ```)
4. Paste into the Mermaid Live Editor
5. Click "Actions" → "PNG" or "SVG" to download
6. Convert PNG to JPG if needed using any image editor

### Diagrams to Convert:
- System Architecture
- API Architecture
- Database Schema
- Authentication Flow
- Request Lifecycle
- Docker Container Architecture
- Deployment Pipeline
- User Journey Flow
- Admin Workflow

## Method 2: Use VS Code Extension

### Steps:
1. Install "Markdown Preview Mermaid Support" extension
2. Open `ARCHITECTURE_VISUAL.md`
3. Right-click on preview → "Copy Image"
4. Paste into image editor and save as JPG

## Method 3: Use Command Line (Node.js)

### Install Mermaid CLI:
```bash
npm install -g @mermaid-js/mermaid-cli
```

### Convert diagrams:
```bash
# This script will be created for you
node convert-diagrams.js
```

## Method 4: Use PowerShell Script (Automated)

Run the provided PowerShell script:
```powershell
.\generate-architecture-images.ps1
```

This will:
1. Extract all Mermaid diagrams
2. Create individual .mmd files
3. Convert to PNG using mermaid-cli
4. Optionally convert to JPG

## Method 5: Use Draw.io

1. Go to: https://app.diagrams.net/
2. File → Import → Text
3. Paste Mermaid code
4. Export as JPG

## Quick Online Tools

- **Mermaid Live**: https://mermaid.live/
- **Kroki**: https://kroki.io/
- **Mermaid Ink**: https://mermaid.ink/

## After Conversion

All images will be saved to:
```
docs/architecture/
├── system-architecture.jpg
├── api-architecture.jpg
├── database-schema.jpg
├── authentication-flow.jpg
├── request-lifecycle.jpg
├── docker-architecture.jpg
├── deployment-pipeline.jpg
├── user-journey.jpg
└── admin-workflow.jpg
```
