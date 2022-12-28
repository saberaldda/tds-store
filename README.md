<a href="https://github.com/saberaldda/TDS-store"> <h1 align="center">TDS-Store</h1></a>

## About

TDS-Store is an e-commerce store with dashboard for multi managers.

#
## Table of Contents

* [Screenshots](#screenshots)
* [Requirements](#requirements)
* [Dependencies](#dependencies)
* [Installation](#installation)
* [Contributing](#contributing)

<a name="screenshots"></a>
## Screens

![store Screens](https://raw.githubusercontent.com/saberaldda/TDS-store/main/storage/mockups/store_front.png)

Dashboard ![dashboard 1](https://raw.githubusercontent.com/saberaldda/TDS-store/main/storage/mockups/201_light_blue.png)

![dashboard 2](https://raw.githubusercontent.com/saberaldda/TDS-store/main/storage/mockups/rm355-pf-s73-card-laptop-01-mockup.png)

<a name="requirements"></a>
## Requirements

Package | Version
--- | ---
[Composer](https://getcomposer.org/) | V2.1.12+
[Php](https://www.php.net/)          | V8.0.2+
[Node](https://nodejs.org/en/)       | v18.12.0+
[Npm](https://nodejs.org/en/)        | V9.1.2+ 

<a name="dependencies"></a>
## dependencies

Package | Version
---- | ----
[amrshawky/laravel-currency](https://github.com/amrshawky/laravel-currency) | ^5.0
[arcanedev/log-viewer](https://github.com/ARCANEDEV/LogViewer) | ^9.0
[yoeriboven/laravel-log-db](https://github.com/yoeriboven/laravel-log-db) | ^1.0
[paypal/paypal-checkout-sdk](https://github.com/paypal/Checkout-PHP-SDK) | ^1.0
[pusher/pusher-php-server](https://github.com/pusher/pusher-http-php) | ^7.0

<a name="installation"></a>
## Installation

> **Warning**
> Make sure to follow the requirements first.

Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/saberaldda/TDS-store.git
    ```

1. Go into the project root directory
    ```sh
    cd TDS-store
    ```

1. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
1. Create database `tds_store` (you can change database name)

1. Go to `.env` file 
    - set database credentials 
        ```sh 
        DB_DATABASE=tds_store
        DB_USERNAME=root
        DB_PASSWORD=[YOUR PASSWORD]
        ```
    > Make sure to follow your database username and password

1. Install PHP dependencies 
    ```sh
    composer update
    ```

1. Generate key 
    ```sh
    php artisan key:generate
    ```

1. install front-end dependencies
    ```sh
    npm install && npm run dev
    ```

1. Run migration
    ```
    php artisan migrate
    ```
    
1. Run seeder

    > **Recommended**
    >  mail configuration in .env file before seeding.

    ```
    php artisan db:seed
    ```
    this command will create users (admin and normal user):
     > email: admin@tds.com , password: password

     > email: user@tds.com , password: password 

1. Run server 
   
    ```sh
    php artisan serve
    ```  

1. Visit [localhost:8000](http://localhost:8000) in your favorite browser.

    > Make sure to follow your Laravel local Development Environment.

1. notifications feature configuration (optional)
 - Go to [pusher](https://pusher.com)
 - Register your account, get API key and paste it into `.env` file.

1. mail feature configuration (optional)
 - Go to [mailtrap](https://mailtrap.io)
 - Register your account, get API key and paste it into `.env` file.


<a name="contributing"></a>
## Contributing
    > Pull requests are welcome.
