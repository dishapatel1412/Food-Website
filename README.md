## Order Food on Rails

**Order Food on Rails** is a Laravel-based food ordering application designed for travelers. The platform allows users to find restaurants near railway stations and order food while traveling.

## Features
- Search for restaurants near railway stations  
- View restaurant menus and dish details  
- Add food items to the cart and place orders  
- Secure online payment options  
- Mobile-friendly and responsive UI  

## Installation Guide
Follow these steps to set up the project on your local machine:

## Clone the Repository

git clone https://github.com/dishapatel1412/food-website.git
cd food-website

## Install PHP dependencies

composer install
npm install

## Copy the .env.example file to .env

cp .env.example .env

- Change the default configuration of database as needed

## Generate application key

php artisan key:generate

## Run database migrations and seed the database

php artisan migrate --seed

## Start the laravel development server

php artisan serve

Now, open your browser and visit:
- http://127.0.0.1:8000/
