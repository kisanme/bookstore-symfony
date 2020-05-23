# BookStore Assignment
Symfony based bookstore app for 99x assessment

## Assumptions
### System 
* PHP installed on the local machine (version 7.3+).
* MySQL DBMS is installed on the machine.
* Composer, Symfony binary, Node, npm and yarn are installed and configured with the path variables.
* Git is already installed, configured and knowledge to donwload this repository exists.

### Application
* User account system is not implemented as part of the solution. But the solution assumes that a user is already logged in (hard-coded user entry for invoice). This is made this way thinking that a user sub-system will arrive for the system.
* The admin sub system is not implemented as part of the solution. But it is thought as a future improvement where you can create, delete and manage books; view the invoices and have reporting tools integrated to have useful reports.
* Books are added into the database by default. For now new books are entered via the DBMS.

## Setting up
These instructions are for setting up the database and the project up and running on a local dev environment.

### Making changes to the .env and .env.test files
The following needs to be modified in the `.env` and `.env.test` files:
* MySQL username (`mysql_user`)
* MySQL password (`mysql_username`)
* Name of the database (`db_name` and `db_name_test`) {optional, if you don't have databases named `bookstore` and `bookstore_test` already}
Modify the entry which looks like:
```
# In .env file
DATABASE_URL=mysql://root:kisan@127.0.0.1:3306/bookstore?serverVersion=5.7

# In .env.test file
DATABASE_URL=mysql://root:kisan@127.0.0.1:3306/bookstore_test?serverVersion=5.7

# Replace with your credentials
# In .env file
DATABASE_URL=mysql://mysql_username:mysql_password@127.0.0.1:3306/db_name?serverVersion=5.7

# In .env.test file
DATABASE_URL=mysql://mysql_username:mysql_password@127.0.0.1:3306/db_name_test?serverVersion=5.7

```

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
