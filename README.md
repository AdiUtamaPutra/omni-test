# LARAVEL PROJECT TEST

> Laravel sample project test is a project intended for job entrance test needs.

> The criteria are:
> 1. Please setup laravel project with following requirements:
>     Has basic authentication to access the Dashboard
>     Has authentication for api
> 2. Create CRUD interface also acessible via api for user data followed by Unit test
> 3. Log every http request sent to the app
> 4. Send email for email confirmation after new user created. (Implement queue)
> 5. reate an api endpoint for mass user creation in single call. The endpoint must be capable to handle upto 1000 email & password in request body.

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

#Set the database connection in .env before migrating
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

#Run the database migrations
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

For more on Mailtrap features and functions, read the [Mailtrap Getting Started Guide](https://help.mailtrap.io/article/12-getting-started-guide).

----------
# Testing API

The REST API to the example app is described below.

## Authentication API (REGISTER)

The api can now be accessed at

```http
POST /api/register
```
Request parameter

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `name` | `string` | **Required**. Set Username For Login |
| `email` | `string` | **Required**. Set Email For Login |
| `password` | `string` | **Required**. Create Password For Login |
| `confirm_password` | `string` | **Required**. Confirm Password |

Responses Example

```javascript
{
  "data": {
        "name": "admin",
        "email": "admin@example.com",
        "updated_at": "2024-02-02T10:57:04.000000Z",
        "created_at": "2024-02-02T10:57:04.000000Z",
        "id": 3
    },
    "access_token": "1|4ygfzFd9L0x9us9VY9KqQyeN3KyLGSmnM0fciFxU4b6be08e",
    "token_type": "Bearer"
}
```

## Authentication API (LOGIN)

The api can now be accessed at

```http
POST /api/login
```
Request parameter

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `email` | `string` | **Required**. Set Email For Login |
| `password` | `string` | **Required**. Set Password For Login |

Request body (form-data)

| Key | Type | Description |
| :--- | :--- | :--- |
| `email` | `string` | **Required**. Set Email For Login |
| `password` | `string` | **Required**. Set Password For Login |

Responses Example

```javascript
{
    "message": "Login success",
    "access_token": "2|CpiQjpSvUO3B8b6xQBUCYR3CXuHKrdF8zTMjyKLGabd94a5e",
    "token_type": "Bearer"
}
```

## Authentication API (GET ALL USERS)

The api can now be accessed at

```http
GET /api/user
```
Request headers

| **Required** 	| **Key**       | **Value** |
|----------	|------------------	|------------------	|
| yes   	| Authorization    	| Token {Bearer Token} |

Token Example 

    7|K7clmhQqNEkdBfQ0fLV4HM4APvrrJUoNL9JSLxNKe8b6b5f9

Responses Example

```javascript
{
    "id": 5,
    "name": "admin",
    "email": "admin@example.com",
    "email_verified_at": null,
    "created_at": "2024-02-02T11:22:57.000000Z",
    "updated_at": "2024-02-02T11:22:57.000000Z"
}
```

## Authentication API (LOGOUT)

The api can now be accessed at

```http
POST /api/logout
```
Request headers

| **Required** 	| **Key**       | **Value** |
|----------	|------------------	|------------------	|
| yes   	| Authorization    	| Token {Bearer Token} |

Token Example 

    7|K7clmhQqNEkdBfQ0fLV4HM4APvrrJUoNL9JSLxNKe8b6b5f9

Responses Example

```javascript
{
    "message": "logout success"
}
```