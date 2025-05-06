# Curotec Challenge

Here is the instructions to run the current project on your local machine:

1. Install all PHP dependencies

`composer install`

2. Install all Javascript dependencies

`npm install`

3. Please guarantee that you have PostgreSQL installed on your OS:

```bash
# Update the package list
sudo apt update

# Install PostgreSQL
sudo apt install -y postgresql postgresql-contrib

# Verify the installation
psql --version
```

4. After ensuring that you have PostgreSQL, run this following command:

```bash
psql -U <env_username> -p

# After inserting your password, you will be inside psql. Then, insert these commands:
CREATE DATABASE IF NOT EXISTS `<name_of_env_database>;
\c <name_of_env_database>;
```

5. After this being set, please run the Laravel migrations:

`php artisan migrate`

6. Then, run the database seeders:

`php artisan db:seed`


