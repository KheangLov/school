# School Laravel

## Installation

Wanna learn more about laravel visit => [Official Documentation](https://laravel.com/docs/6.x)


Clone the repository

    git clone https://github.com/KheangLov/school.git

Switch to the repo folder

    cd school

Install all the dependencies using composer

    composer install
    
Install node modules

    npm i
    or
    yarn

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

To make the browser reload when content changed (Don't forget to start the server using `artisan` first!)

    npm run watch `or` yarn watch

You can also now access the server at http://localhost:3000

**TL;DR command list**

    git clone https://github.com/KheangLov/school.git
    cd school
    composer install
    yarn
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
    npm run watch `or` yarn watch

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
