# Employee Attendance Web Application.
Simple employee attendance Web application project.
</br>
Language: PHP MVC, Javascript
</br>
Database: MySQL
</br>
Front-end Template: [Oscar - HTML Bootstrap 4 Admin Template](https://themeforest.net/item/oscar-the-ultimate-bootstrap-admin-template/20324506)

# Application Requirements
1. PHP 5.1.0 or above
2. MySQL
3. Apache Server

# Installation Instructions
1. Clone it
2. Create MySQL database and restore database from [this](/backup_db.sql)
3. Copy source code folder to /var/www/html.
4. Login with username-password in [this](/username-password.txt)

# Application Functionality and Features
1. 3 Role user: Admin-Manager-Employee. Manager manages all employee in department
2. User login-logout
3. Employee can: Calculate salary base on leave day form, Create leave day form
4. Manager can: Calculate salary base on leave day form, Create leave day form, Manage Employee in Department Accept leave day form from Employee in Department
5. Admin can: Check User online/offline, Accept leave day form from Manager in Department, Manage all Manager and Employee

# Bug and Incomplete Function
1. Bug in Edit information function. Password field will show md5 of password as default value
2. Bug in Access Control. Manager in Department A can accpet leave day form form Employee in Department B.

# Note:
1. Read code carefully to understand regex fillter in Add ... Function.
2. I don't know when I will fix the above 2 bugs because of laziness.
3. Because I don't know well about Javascript so some function in front-end will very stupid :( 
