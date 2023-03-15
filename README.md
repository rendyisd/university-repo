# Getting started

## Installation

Clone the repository

    git clone https://github.com/rendyisd/university-repo.git

Switch to the repo folder

    cd university-repo

Install all the dependencies using composer

    composer install

Install node modules

    npm install

Copy the example env file and make the required configuration changes in the .env file

    copy .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve
    
Compile the application's assets

    npm run dev

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/rendyisd/university-repo.git
    cd university-repo
    composer install
    npm install
    copy .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations**

    php artisan migrate
    php artisan serve
    npm run dev