# Cookie Recipe Calculator

This is a simple web application built with Laravel that allows users to calculate the highest score of a cookie recipe based on given ingredients. Additionally, users can receive customize recipes to meet specific calorie requirements.

## Features

- Calculate the highest score of a cookie recipe based on provided ingredients.
- Customize recipes to meet specific calorie requirements.
- Ability to add, remove, and edit ingredients (commented out for later development).

## Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- MySQL or any other compatible database system

### Installation

1. Clone the repository:

```bash
  https://github.com/Zerof8/cookie_recipe
```
2. Navigate to the project directory:
```bash
    cd cookie_recipe_assignment
```
3. Install PHP dependencies:
```bash
    composer install
```
4. Copy the '.env.example' file to '.env':
```bash
    cp .env.example .env
```
5. Generate an application key:
```bash
    php artisan key:generate
```
6. Configure your database connection in the .env file.
7. Migrate the database:
```bash
  php artisan migrate
```
8. Optionally, seed the database with sample data:
```bash
  php artisan db:seed
```

## Usage

To run the application locally, use the following command:
```bash
  php artisan serve
```
The application will be accessible at http://localhost:8000 by default.

### Adding Ingredients
To add new ingredients, you can modify the config/ingredients.php file.
Each ingredient is represented as an associative array with properties such as name, capacity, durability, flavor, texture, and calories.

### Customization and Extension
(Commented-out)
- Database Structure: The project includes an unused database structure and seeders, allowing for easy extension and integration with a database-backed system.
- Support for New Ingredients: All functions used in this project are capable of handling new types of ingredients. Simply update the config/ingredients.php file with the new ingredients' properties.
- Add, Remove, and Edit Ingredients: The functionality to add, remove, and edit ingredients is available but commented out for later development. To enable it, uncomment the relevant sections in the views and controllers, then make sure to use the database structure instead of the current config one.
