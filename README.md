## Installation of FE Interface

- In your terminal run `composer install`
- Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)
- In your terminal run `php artisan key:generate`
- Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
- Run `php artisan storage:link` to create the storage symlink (if you are using **Vagrant** with **Homestead** for development, remember to ssh into your virtual machine and run the command from there).
- Install NodeJs dependencies `npm install`
- Run the webpack `npm run watch`

## Usage

To start testing the Pro theme, register as a user or log in using one of the default users: 

- admin type - **admin@argon.com** with the password **secret**
- creator type - **creator@argon.com** with the password **secret** 
- member type - **member@argon.com** with the password **secret** 

