## Installation of FE Interface

- You need to install [PHP 7.4.15](https://www.php.net/)
- Open your terminal and navigate to the project's folder. Make sure you name the folder `degenerates`.
- In your terminal run `composer install`
- create an empty MySQL Database (v8 recommended)
- Copy `.env.example` to `.env` and update the following configurations:
    1. ODDS_API_KEY
    2. ETHERSCAN_API_KEY
    3. ETHERSCAN_CLIENT_ADDRESS
    4. MNEMONIC
    5. DB_DATABASE
    6. DB_USERNAME
    7. DB_PASSWORD

- In your terminal run `php artisan key:generate`
- Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
- Run `php artisan storage:link` to create the storage symlink (if you are using **Vagrant** with **Homestead** for development, remember to ssh into your virtual machine and run the command from there).
- Install NodeJs dependencies `npm install`
- Make sure you have truffle installed `npm install -g truffle`
- Install a solidity complier `npm install -g solc`
- Run the webpack `npm run watch`
- Run `php artisan serve`


## Compile & Migrate the contract using Truffle
- Navigate to the solidity/client folder and run the following commands:
    1. `npm i web3 --save`
    2. `npm i lite-server --save-dev`
    3. `npm i jquery`
    3. `truffle compile`
    4. `truffle migrate`


## Copy the JSON files of the contracts
Create a symbolic link of the **solidity/build/contracts** folder and save it to **public/degenerates/**


## Usage

To start testing the degenerates sporting bet app, register as a user or log in using one of the default users: 

- **jsmith@degenerates.com** with the password **secret**
- **jbrown@degenerates.com** with the password **secret** 
- **gdavis@degenerates.com** with the password **secret** 
