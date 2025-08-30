@echo off
echo Minimal PHP to HTML Converter
echo =====================================

rem Change to the directory containing this batch file
cd /d "%~dp0"

rem Check if PHP is available
where php >nul 2>nul
if %ERRORLEVEL% neq 0 (
    echo PHP not found in PATH. Please make sure PHP is installed and added to your PATH.
    goto :EOF
)

echo Running PHP to HTML converter...
php minimal-build.php

echo.
echo Conversion completed!
echo HTML files have been generated in the build directory.
echo.

rem No pause at the end so the window closes automatically
