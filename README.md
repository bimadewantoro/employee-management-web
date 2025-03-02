# Employee Management System

This is an Employee Management System built with Laravel and Filament. It allows you to manage employee records, including their personal information, job details, and more.

## Demo

You can access the demo of the application at [https://employee-management-web-main-gw6ehi.laravel.cloud/](https://employee-management-web-main-gw6ehi.laravel.cloud/)

-   **Email:** admin@gmail.com
-   **Password:** admin1234

## Features

-   Add, edit, view, and delete employee records
-   Filter and search employees by various criteria
-   Export employee data
-   Role-based access control
-   Upload and manage employee profile pictures

## Installation

1. Clone the repository:

    ```sh
    git clone git@github.com:bimadewantoro/employee-management-web.git
    cd employee-management-web
    ```

2. Install dependencies:

    ```sh
    composer install
    npm install
    ```

3. Copy the example environment file and configure the environment variables:

    ```sh
    cp .env.example .env
    ```

4. Generate an application key:

    ```sh
    php artisan key:generate
    ```

5. Run the migrations:

    ```sh
    php artisan migrate
    ```

6. Run the seeders:

    ```sh
    php artisan db:seed
    ```

7. Create a super-admin user account:

    ```sh
    php artisan shield:super-admin
    ```

8. Serve the application:
    ```sh
    php artisan serve
    ```

## Usage

-   Access the application at `http://localhost:8000`
-   Log in with your credentials
-   Navigate to the Employees section to manage employee records

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

[MIT license](https://opensource.org/licenses/MIT).
