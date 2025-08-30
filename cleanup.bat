@echo off
echo Cleaning up build scripts
echo =====================================

rem Change to the directory containing this batch file
cd /d "%~dp0"

echo Removing temporary build files...

rem Delete all unnecessary build scripts
if exist build-helpers.php del build-helpers.php
if exist build-v2.bat del build-v2.bat
if exist build-v2.php del build-v2.php
if exist build.bat del build.bat
if exist build.php del build.php
if exist build.ps1 del build.ps1
if exist debug-build.bat del debug-build.bat
if exist debug-build.php del debug-build.php
if exist final-build.bat del final-build.bat
if exist final-build.php del final-build.php
if exist php2html-v2.bat del php2html-v2.bat
if exist php2html-v2.php del php2html-v2.php
if exist php2html.bat del php2html.bat
if exist php2html.php del php2html.php
if exist simple-build.bat del simple-build.bat
if exist simple-build.php del simple-build.php

echo.
echo Cleanup completed!
echo Only the minimal-build files remain for HTML generation.
echo.

echo Renaming minimal-build files to build...
if exist minimal-build.php ren minimal-build.php build.php
if exist minimal-build.bat ren minimal-build.bat build.bat
if exist minimal-build-auto.bat ren minimal-build-auto.bat build-auto.bat

echo.
echo Done! Use build.bat or build-auto.bat to generate HTML files.
echo.
