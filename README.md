# BookStore Assignment
Symfony based bookstore app for 99x assessment

## Assumptions
### System 
* PHP installed on the local machine (version 7.3+).
* MySQL DBMS is installed on the machine.
* Composer, Symfony binary, Node, npm and yarn are installed and configured with the path variables.

### Application
* User account system is not implemented as part of the solution. But the solution assumes that a user is already logged in (hard-coded user entry for invoice). This is made this way thinking that a user sub-system will arrive for the system.

## Setting up
These instructions are for setting up the database and the project up and running on a local dev environment.

### Importing the Dev Database
Importing the dev database. From the project root run:
```bash
./bin/console doctrine:database:create -e dev
```
```bash
./bin/console doctrine:database:import -e dev data/bookstore.sql
```

### Importing the Test Database
Importing the testing database. From the project root run:
```bash
./bin/console doctrine:database:create -e test
```
```bash
./bin/console doctrine:database:import -e test data/bookstore_test.sql
```

## Run the project
From the project root run the following commands one after the other
```bash
composer install
yarn install && yarn build
symfony serve
```

## Running tests
From the project root run the following command to run both unit and integration tests
```bash
php bin/phpunit
```
