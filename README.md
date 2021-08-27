## Installation of FE Interface

- In your terminal run `composer install`
- create a MySQL Database
- Copy `.env.example` to `.env` and update the configurations (mainly the database configuration)
- In your terminal run `php artisan key:generate`
- Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
- Run `php artisan storage:link` to create the storage symlink (if you are using **Vagrant** with **Homestead** for development, remember to ssh into your virtual machine and run the command from there).
- Install NodeJs dependencies `npm install`
- Make sure you have truffle installed `npm install -g truffle`
- Install a solidity complier `npm install -g solc`
- Run the webpack `npm run watch`
- Run `php artisan serve`


## Compile & Migrate the contract using Truffle
- Navigate to the solidity/clients folder and run the following commands:
    1. `npm i web3 --save`
    2. `npm i lite-server --save-dev`
    3. `npm i jquery`
    3. `truffle compile`
    4. `truffle migrate`

## Usage

To start testing the Pro theme, register as a user or log in using one of the default users: 

- **jsmith@degenerates.com** with the password **secret**
- **jbrown@degenerates.com** with the password **secret** 
- **gdavis@degenerates.com** with the password **secret** 
