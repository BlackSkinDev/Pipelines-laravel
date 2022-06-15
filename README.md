## Description
This project demostrates how to use Pipelines in laravel.
Basically, using laravel pipelines you can pass an object between several classes in a fluid way to perform any type of task and finally return the resulting value once all the “tasks” have been executed.

In this project, I used the concept of Pipelines to filter products and categories depending on type of filters selected


## Running the APP
To run the project, you must have:
- **PHP** (https://www.php.net/downloads)
- **MySQL** (https://dev.mysql.com/downloads/installer)

Clone the repository to your local machine using the command
```console
$ git clone *remote repo url*
```

Create an `.env` file using the command. You can use this config or change it for your purposes.

```console
$ cp .env.example .env
```

### Environment
Configure environment variables in `.env` for dev environment based on your MYSQL database configuration and mailtrap credentials

```  
DB_CONNECTION=<YOUR_MYSQL_TYPE>
DB_HOST=<YOUR_MYSQL_HOST>
DB_PORT=<YOUR_MYSQL_PORT>
DB_DATABASE=<YOUR_DB_NAME>
DB_USERNAME=<YOUR_DB_USERNAME>
DB_PASSWORD=<YOUR_DB_PASSWORD>

```

### Installation
Install the dependencies and start the server

```console
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
```


You should be able to visit your app at http://localhost:8000

