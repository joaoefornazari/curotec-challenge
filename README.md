# Curotec Challenge

Here is the instructions to run the current project on your local machine:

1. Install all PHP dependencies

```bash
composer install
```

2. Install all Javascript dependencies

```bash
npm install
```

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

```bash
php artisan migrate
```

6. Then, run the database seeders:

```bash
php artisan db:seed
```

7. Then, open two terminals and run the following commands:

```bash
# Terminal 1
npm run dev

# Terminal 2
php artisan serve
```

This should allow you to run the project seamlessly at `localhost:8000`. If you find any problems while using it, please reach out to me on my [email](mailto:joaoefornazari@gmail.com?subject=Curotec%20Challenge%20Bug%20Found).
