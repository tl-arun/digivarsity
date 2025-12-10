#!/bin/bash

# Script to update all indigo/purple/pink colors to blue theme
# This updates all blade files in the resources/views directory

echo "Updating theme colors from purple/indigo to blue..."

# Find all blade files and update color references
find resources/views -name "*.blade.php" -type f -exec sed -i \
    -e 's/indigo-600/blue-600/g' \
    -e 's/indigo-700/blue-700/g' \
    -e 's/indigo-800/blue-800/g' \
    -e 's/indigo-900/blue-900/g' \
    -e 's/indigo-500/blue-500/g' \
    -e 's/indigo-400/blue-400/g' \
    -e 's/indigo-300/blue-300/g' \
    -e 's/indigo-200/blue-200/g' \
    -e 's/indigo-100/blue-100/g' \
    -e 's/indigo-50/blue-50/g' \
    -e 's/purple-600/blue-700/g' \
    -e 's/purple-700/blue-800/g' \
    -e 's/purple-500/blue-600/g' \
    -e 's/purple-400/blue-500/g' \
    -e 's/purple-300/blue-400/g' \
    -e 's/purple-200/blue-300/g' \
    -e 's/purple-100/blue-100/g' \
    -e 's/purple-50/blue-50/g' \
    -e 's/pink-600/blue-600/g' \
    -e 's/pink-500/blue-500/g' \
    -e 's/from-indigo-600 to-purple-600/bg-blue-600 hover:bg-blue-700/g' \
    -e 's/from-purple-600 to-pink-600/from-blue-600 to-blue-800/g' \
    -e 's/bg-gradient-to-r from-indigo-600 to-purple-600/bg-blue-600 hover:bg-blue-700/g' \
    {} \;

echo "Theme colors updated successfully!"
echo "All indigo, purple, and pink colors have been replaced with blue shades."
