# Nakayoku

## Prerequisites
* PHP 8+
* Composer

## Installation
After cloning the repo in your machine, please follow below steps.

``` bash

Make .env file from example
cp .env.example .env

# Create a database named 'CII'
$ CREATE DATABASE CII CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# install app's dependencies
$ composer install

# Generate laravel APP_KEY
$ php artisan key:generate

# DB seed
$ php artisan migrate:fresh --seed
