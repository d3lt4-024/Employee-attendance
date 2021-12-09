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

# Installation

**Clone it and create MySQL database and restore database from [this](/backup_db.sql).**

## Windows + Laragon

You should download an install [Laragon](https://laragon.org/download/index.html) if you do not already have a web
server setup. Laragon is a program that provides the WAMP environment (which stands for Windows, Apache, MySQL and PHP).
With Laragon, you can completely install the WAMP environment easily, quickly and conveniently as well as manage them.

First, you need to turn on apache in Laragon and access the apache httpd.conf file by right clicking on the Laragon
interface. Add new port to apache and enable mod_rewrite on apache by adding the following line at the end of the
httpd.conf file

```
Listen 1002
LoadModule rewrite_module modules/mod_rewrite.so
```

The number 1002 is port number. You can change to any other port you want, as long as the port doesn't have any services
deployed

Then you need to download source code of GraphSQLi Lab and paste into C:\laragon\www. Then go to C:
\laragon\etc\apache2\sites-enabled and create file Employee-attendance.conf with content:

```
<VirtualHost *:1002> 
    DocumentRoot "C:/laragon/www/Employee-attendance/"
    ServerName Employee-attendance.test
    ServerAlias *.Employee-attendance.test
    <Directory "C:/laragon/www/Employee-attendance/">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Finally, restart Laragon and point your browser to: `http://localhost:1002/` and login with username-password in [this](/username-password.txt)

## Linux

If you are using a Debian based Linux distribution, you will need to install the following packages (or their
equivalent):

```
apt-get -y install apache2 mariadb-server php php-mysqli php-gd libapache2-mod-php
```

After install package, go to /etc/apache2. Open and add the following line at the end of the ports.conf to open new port
with apache:

```
Listen 1002
```

Download source code of GraphSQLi Lab, paste into /var/www and change permission with

```
sudo chown www-data:www-data /var/www/Employee-attendance
sudo chmod -R 775 /var/www/Employee-attendance
```

Then go to /etc/apache2/sites-enabled, create file Employee-attendance.conf with content:

```
<VirtualHost *:1002> 
    DocumentRoot "/var/www/Employee-attendance"
    ServerName Employee-attendance.test
    ServerAlias *.Employee-attendance.test
    <Directory "/var/www/Employee-attendance">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
After that, run on terminal:

```
cd /etc/apache2/sites-available
sudo ln -s /etc/apache2/sites-enabled/Employee-attendance.conf
```

Finally, enable mod_rewrite and restart apache service with:

```
sudo a2enmod rewrite
sudo service apache2 restart
```

Finally, point your browser to: `http://localhost:1002/` and login with username-password in [this](/username-password.txt)

# Application Functionality and Features
1. 3 Role user: Admin-Manager-Employee. Manager manages all employee in department
2. User login-logout
3. Employee can: Calculate salary base on leave day form, Create leave day form
4. Manager can: Calculate salary base on leave day form, Create leave day form, Manage Employee in Department Accept leave day form from Employee in Department
5. Admin can: Check User online/offline, Accept leave day form from Manager in Department, Manage all Manager and Employee

# Bug and Incomplete Function
1. Bug in Edit information function. Password field will show sha256 of password as default value
2. Bug in Access Control. Manager in Department A can accpet leave day form form Employee in Department B.

# Note:
1. Read code carefully to understand regex fillter in Add ... Function.
2. I don't know when I will fix the above 2 bugs because of laziness.
3. Because I don't know well about Javascript so some function in front-end will very stupid :( 
