## Project configuration

- clone  repository
- go to project directry on terminal
- composer install or update
  ```php
  composer install
  ```
  Or
  ```php
  composer update
  ```
- create .env from .env.example
- genarate aplication key
 ```php
  php artisan key:generate
  ```
- create a database with name acewareadmin
- config db credentials
- migrate table using the below command
  ```php
  php artisan migrate
  ```
- run the application
  ```php
  php artisan serve
  ```