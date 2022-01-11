## Setup

After pulling the repo, make sure to run composer update and composer install.
Have Sail working, if not then follow the steps here: https://laravel.com/docs/8.x#getting-started-on-windows
Navigate to the app directory in a Linux terminal. If you don't have a Linux terminal, you can download one here: https://www.microsoft.com/en-gb/p/ubuntu-2004-lts/9n6svws3rx71?activetab=pivot:overviewtab

Copy the .env.example file.
Change the name of the duplicate to .env.
Make sure Docker desktop is running, once it is the app can be started from the project root directory using ./vendor/bin/sail up
Once the app is running, check name of the mysql service on Docker.
Change DB_HOST to the name of the mysql service on Docker.
Change the DB_USERNAME to sail.
Change the DB_PASSWORD to password.

To use the seeder which creates and populates the database, run: ./vendor/bin/sail artisan migrate:fresh --seed
This will populate the database random users, documents, steps and notes.

## Endpoints

The api can be accessed using /api.
The routing for the api can be found in the api.php file.