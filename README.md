<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Hotel Management

Laravel based application that let customer view Room facilities, price and availability of the room according to their check-in and check-out date and book the room of their choice. 
A full admin panel created to perform all CRUD operations for managing hotel rooms.

## Technology Stack
- Laravel 10
- Eloquent ORM
- Blade Templates
- Database Migration/Seeding
- Authentication

## Demo

- Reservation
![userside](https://github.com/ramezcode1/hotelManagement/assets/135148978/fc2feeb3-c21c-4dc4-83b8-2dc115225386)


- Dashboard
  ![dashboard](https://github.com/ramezcode1/hotelManagement/assets/135148978/f876a480-efb4-4482-b78f-bbc9859d4e53)


## Features

User Side:
- user authentication. 
- Filter all available rooms based on check-in and check-out dates.
- "My Bookings" page to view all bookings. 
- Update user profile
- user input validation

Admin Side:
- Admin Login 
- Dashboard for Adding a new Room, edit room details and set the visibility to visible/hidden. 
- display all Bookings

### How to use

- Clone the repository with git clone
- Copy .env.example file to .env and edit database credentials there
- Run composer install
- Run php artisan key:generate
- Run php artisan migrate --seed (it has some seeded data for testing)
- php artisan serve

## Default User account
- email:       user@gmail.com
- password:    Password@1

## Default Admin account
- email:       admin@gmail.com
- password:    Password@1

## ER Diagram
![ERD](https://github.com/ramezcode1/hotelManagement/assets/135148978/01e6c289-e7b1-4847-932c-be6270ef47ee)

# hotel-reservation-system-laravel
# hotel-reservation-system-laravel
# hotel-reservation-system-laravel
# hotel-reservation-system-laravel
