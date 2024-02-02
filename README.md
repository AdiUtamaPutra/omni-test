# Getting started

> Laravel sample website with content retrieving from [prismic.io](https://prismic.io)

This project runs with Laravel version 10.

## Getting started

Assuming you've already installed on your machine: PHP (>= 8.0.0) and [Node.js](https://nodejs.org).

``` bash
# Clone the repository
git clone https://github.com/AdiUtamaPutra/omni-test.git

#Switch to the repo folder
cd omni-test

# install dependencies
composer install
npm install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

#Run the database migrations (**Set the database connection in .env before migrating**)
php artisan migrate

# build CSS and JS assets
npm run dev

```

Then launch the server:

``` bash
php artisan serve
```

The Laravel sample project is now up and running! Access it at http://localhost:8000.

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

