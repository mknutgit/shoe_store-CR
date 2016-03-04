# _Hair Salon_

#### _This is a tracker of stylists working at the salon and the customers who see each stylist, 3-4-16_

#### By _**Matt Knutson**_

## Description

_The Assignment:

Write a program to list out local shoe stores and the brands of shoes they carry. Make a Store class and a Brand class.

Create a database called shoes and a testing database called shoes_test, and remember to follow proper naming conventions for your tables and columns. As you create your tables, copy all MySQL commands into your readme file.
Build full CRUD functionality for Stores. Create, Read (all and singular), Update, Delete (all and singular).
Allow a user to create Brands that are assigned to a Store. Don't worry about building out updating or deleting for brands.
There is a many-to-many relationship between brands and shoe stores, so many shoe stores can carry many brands and a brand of shoes can be carried in many stores. Create a join table to store these relationships.
When a user is viewing a single store, list out all of the brands that have been added so far to that store and allow them to add a brand to that store. Create a method to get the brands sold at a store, and use a join statement in it.
When a user is viewing a single Brand, list out all of the Stores that carry that brand and allow them to add a Store to that Brand. Use a join statement in this method too.
When you are finished with the assignment, make sure to export your databases and commit the .sql files for both the app database and the test database._


## Setup/Installation Requirements

* _Clone the repository from github_
* _Import the database to phpMyAdmin_
* _In terminal, run "composer install" to get silex and twig engaged_
* _Enter localhost:8000 into your browser to see the application_

## Mysql commands Used

_CREATE DATABASE shoes;_
_USE shoes;_
_CREATE TABLE stores(id serial PRIMARY KEY, store_name VARCHAR (255));_
_CREATE TABLE brands (id serial PRIMARY KEY, brand_name VARCHAR (255));_
_CREATE TABLE stores_brands (id serail PRIMARY KEY, store_id INT, brand_id INT);_

## Known Bugs

_None_

## Support and contact details

_You can contact me via github with any questions_

## Technologies Used

_HTML, CSS, Bootstrap, phpunit, silex, twig, composer, mysql_

### License

*MIT*

Copyright (c) 2016 **_Matt Knutson_**
