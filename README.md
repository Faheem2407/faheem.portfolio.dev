<p align="center">
    <h1 align="center">Laravel Portfolio Template</h1>
</p>

## Introduction 

<p> A Laravel admin panel setup, admin login & logout, profile settings and system information management, and many more for managing custom portfolio. </p>

## Contributor 

-   <a href="https://github.com/Faheem2407" target="_blank">MD.Abed Hasan Fahim</a>

## Installation 

To Install & Run This Project You Have To Follow the following Steps:

```sh
git clone https://github.com/Faheem2407/Custom-Portfolio-Template.git
```

```sh
cd Custom-Portfolio-Template.git
```

```sh
composer update
```

Open your `.env` file and change the database name (`DB_DATABASE`) to whatever you have, the username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration

```sh
php artisan key:generate
```

```sh
php artisan migrate:fresh --seed
```

```sh
php artisan optimize:clear
```

```sh
php artisan serve
```
For Admin Login `http://127.0.0.1:8000/admin` <br>
Admin gmail = `admin@admin.com` & password = `12345678`


