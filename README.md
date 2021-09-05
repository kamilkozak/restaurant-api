# Laravel REST API with Passport

## Steps

- Run `composer install`
- Copy `.env.example` file to `.env` and fill out your details.
- Run `php artisan key:generate`
- Run `php artisan migrate:fresh --seed`
- Run `php artisan passport:install`
- Authorize with the password grant token
  [https://laravel.com/docs/8.x/passport#requesting-password-grant-tokens](https://laravel.com/docs/8.x/passport#requesting-password-grant-tokens)

## Routes

```
# Public

GET   /api/v1/employees

GET   /api/v1/employees/:id

# Protected

PUT   /api/v1/employees/:id
@body: first_name, last_name, email

POST   /api/v1/employees
@body: first_name, last_name, email

DELETE   /api/v1/employees/:id

PUT   /api/v1/employees/:id/restaurants/:id

DELETE   /api/v1/employees/:id/restaurants/:id
