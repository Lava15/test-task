# ![Online Constacs APP](logo.png)

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you
start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

    git clone https://github.com/Lava15/test-task

Switch to the repo folder

    cd test-task

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Start the local development with DOCKER with detached mode

    ./vendor/bin/sail build --no-cache && sail up -d

You can now access the server at http://localhost:{'YOUR-PORT'}

Generate a new application key

    ./vendor/bin/sail artisan key:generate

(**Set the database connection in .env before migrating**)
By default sail provides
    DB_DATABASE=sail
    DB_USERNAME=sail
    DB_PASSWORD=password

Run the database migrations

    ./vendor/bin/sail artisan migrate

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to
clean the database by running the following command

    ./vendor/bin/sail artisan migrate:refresh

## Database seeding

**Populate the database with seed data with relationships which includes users, contacts, emails, phone number,  and
follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.
**

Run the database seeder and you're done

    ./vendor/bin/sail artisan db:seed

## Launch crone Job. In order to start automated tasks

./vendor/bin/sail artisan schedule:run

## In order to check available tasks crone job, run following command

./vendor/bin/sail artisan schedule:list

## Launch Queues. In order to start queues tasks

./vendor/bin/sail artisan queue:work

## E-mail Service Mailpit

In order to use local mail service use port:8025

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/Api` - Contains all the api controllers
- `app/Http/Middleware` - Contains the JWT auth middleware
- `app/Http/Requests/Api` - Contains all the api form requests
- `app/RealWorld/Favorite` - Contains the files implementing the favorite feature
- `app/RealWorld/Filters` - Contains the query filters used for filtering api requests
- `app/RealWorld/Follow` - Contains the files implementing the follow feature
- `app/RealWorld/Paginate` - Contains the pagination class used to paginate the result
- `app/RealWorld/Slug` - Contains the files implementing slugs to articles
- `app/RealWorld/Transformers` - Contains all the data transformers
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
- `tests` - Contains all the application tests
- `tests/Feature/Api` - Contains all the api tests

## Environment variables

- `.env` - Environment variables can be set in this file

# Testing API

Run the laravel development server

    ./vendor/bin/sail up -d

The api can now be accessed at

    http://localhost:{'YOUR-PORT'}/api/1

# OBTAIN BEARER TOKEN

Run the command **./vendor/bin/sail artisan tinker**  to open the Tinker
Next, enter the command **use App\Models\User**
Create user object, and find by id
**$user = User::find(1)**

**$user->createToken('<token-name>')->plainTextToken**.
Replace <token-name> with a descriptive name for your token.
Finally, you will get displayed the bearer token in your terminal.
