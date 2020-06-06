Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019


images - Images used for index.php page 

Screenshots - Included screenshots used for the TestCaseScreenshots.docx file.

1.css - CSS files

2.css - CSS files

admin.php - If the entered password or username does not match with the information in the database, the user will be directed to this page after attempting to sign in with admin information.

adminpage.php - Admin page, the admin has the option to enter sponsor, vendor, or judge information. Clicking on the buttons will add their corresponding information to the group4 database in their corresponding tables. There is a sign out button on the top right that will destroy the session id associated with the admin upon clicking on it. An attempt to click on the back button will not redirect the admin back to the admin page as the session id will be destroyed on the sign out page, the admin will then be directed back to the index.php page.

group4_backup.sql - mySQL dump file with database creation and table creation, and drop tables if they already exists

index.php - Home page, Admin sign in, participant sign up, and participant sign options available. There are links to the left of the page that will direct the user to the location of the corresponding actions.  

prcinfo.php - The page the participant lands on after a successful sign in, here the user enters their full name, select from a drop menu of t shirt size, and food choice, upon clicking on the submit button, the information will be entered into the corresponding values in the participant table in the group4 database. 

register.php - This page handles registration, upon a successful registration ( username does not already exist in the group4 databse of participant table), the user will be directed to the prcinfo.php page, otherwise an error message will pop up stating that an username already exists. 

runfirst.php - The first file to run in order to create a template of the group4 database, and 5 corresponding tables with all data empty, except for the admin login information, not needed if importing group4_back.sql into phpmyadmin to preload database with pre-existing table data.

signin.php -  This page handles the signning in process, and automatically redirects the participant to the prcinfo.php page, additionally, session variables are assigned, and confirmation occurs to verify correct login credentials from the participant table in the group4 database. 

signout.php - Sign out page, participant or admin session id will be destroyed depending on who the user is. An attempt to use the back button to go back to the previous page will not work as the session id will be destroyed upon entering this page. The user is directed back to the index.php page if they click on the back button. 

TestCaseScreenshots.docx - Word document containing screenshots of test case inputs and expected outputs, with captions detailing each step. 

Team4PowerPoint.pptx - Power point presentation cosisting of context diagram, DFD-0 and E-R diagram, and gantt chart diagram. 

CSC350_Group4_System_Designs_Document.docx - Systems designs document consisting of  title page, table of contents, system
description, project timeline (gantt chart), separate timeline tasklist, context diagram, DFD-0,
use case with description, E-R diagram, at least one GUI diagram, data design and screenshots
of successful execution of testing cases

volunteer.php - Volunteer page that the volunteer can input the full name of a participant to pull up a list of information regarding the particular participant. 
