# Laravel 5.8 Bike service application

This application is for owners of Bike service stations. It helps the owners to list all the services
they offer. Customers can choose one or more services to book.

## Specifications
Bike station owner:

- Should be able to create / edit / delete all his services and their details
- View a list of all bookings ( pending, ready for delivery and completed)
- View details of each booking
- Receive an email whenever a booking is made

Customers:

- Book a service at a particular date
- See the status of his booking
- See all his previous bookings
- Receive an email as soon as his booking is ready for delivery

## Requirements
```bash
PHP >= 7.2.5
xampp - window Local server
```
## Installation

Clone repo.

```bash
https://github.com/thiruraje/bike-service.git
```
Install Composer

[Download Composer](https://getcomposer.org/download/)

composer update/install
```bash
composer install
```

## How to setting
Start the xampp server and create the database. 

Go into .env file change Database name,user name,password.Change the email credentials in the .enc file and config/mail.php file.
```bash
php artisan migrate
```
In the db:seed have a default owner user name and password.
```bash
php artisan db:seed
```
```bash
user name : owner@gmail.com
password : 123456
```


Generating a New Application Key
```bash
php artisan key:generate
```
Run the project
```bash
php artisan serve
```
