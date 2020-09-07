# ICUC PROJECT
This project is about creating Rest-Api endpoints for a law firm to perform CRUD (Create, Read, update, Delete) operations on client data. The project is created using PHP & MySQL.

## STEPS TO RUN
1) Using XAMPP:
	- Download XAMPP and run the Apache Server and MySql Server. You can use PhpMyAdmin console to view and create Database.
	- Create Database and Database Table using icucDb.sql file under /config folder. Copy contents of this file and paste in SQL editor and click Go.
	- Copy Project folder in htdocs/ under XAMPP installation directory.

## API ENDPOINTS (using XAMPP)
* `GET - http://localhost/icuc_project/api/read.php` Fetch ALL Records
* `GET - http://localhost/icuc_project/api/read.php/?id=1` Fetch One Record based on ID
* `POST - http://localhost/icuc_project/api/create.php` Create Record
* `PUT - http://localhost/icuc_project/api/update.php?id=1` Update all Records
* `DELETE - http://localhost/icuc_project/api/delete.php?id=1` Remove Records

	- e.g JSON Body for Create and Update:
		{
		    "first_name": "Test First Name",
		    "last_name": "Test Last Name",
		    "address": "Test address",
		    "phone_number": "***-***-****",
		    "assigned_lawyer": "Test Lawyer Name",
		    "notes": "Test notes"
		}	

2) Using Command Prompt:
	- Navigate to the PHP project folder.
	- RUN:
		php -S 127.0.0.1:8080
	- Run:
		mysql -u root -p
	- Create and use the new database from icucDb.sql file under /config folder:
		e.g source (path to the .sql file)
		e.g Use icucdb;
	- Use database queries to check table content and database information
		e.g. show databases;		

## API ENDPOINTS (using cmd)
* `GET - http://localhost:8080/api/read.php` Fetch ALL Records
* `GET - http://localhost:8080/api/read.php/?id=1` Fetch One Record based on ID
* `POST - http://localhost:8080/api/create.php` Create Record
* `PUT - http://localhost:8080/api/update.php?id=1` Update all Records
* `DELETE - http://localhost:8080/api/delete.php?id=1` Remove Records

	- e.g JSON Body for Create and Update:
		{
		    "first_name": "Test First Name",
		    "last_name": "Test Last Name",
		    "address": "Test address",
		    "phone_number": "***-***-****",
		    "assigned_lawyer": "Test Lawyer Name",
		    "notes": "Test notes"
		}

## Author
* Aakash Shukla		

