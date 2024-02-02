
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/AdiUtamaPutra/omni-test.git

Switch to the repo folder

    cd omni-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
    
----------
# Handle Email Verification Using Mailtrap

Since our Laravel app will send a confirmation email, we need to set up the email configuration in the .env file.

For email testing purposes, we’ll use [Mailtrap Email Testing](https://mailtrap.io/email-sandbox/), an Email Sandbox that captures SMTP traffic from staging and allows developers to debug emails without the risk of spamming users.

The Email Sandbox is one of the SMTP drivers in Laravel. All you need to do is [sign up](https://mailtrap.io/register/signup?ref=header) and add your credentials to .env, as follows:

    MAIL_MAILER=smtp  
    MAIL_HOST=smtp.mailtrap.io  
    MAIL_PORT=2525  
    MAIL_USERNAME=<********> //Your Mailtrap username  
    MAIL_PASSWORD=<********> //Your Mailtrap password
    MAIL_ENCRYPTION=tls

For more on Mailtrap features and functions, read the [Mailtrap Getting Started Guide](https://help.mailtrap.io/article/12-getting-started-guide).
----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|
| Optional 	| Authorization    	| Token {JWT}      	|

Refer the [api specification](#api-specification) for more info.

----------