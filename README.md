# BookBlog - Mini Laravel Blog Project

A simple blog application built with Laravel. It supports user authentication, post management (CRUD), image uploads, and a clean, responsive UI styled with Tailwind CSS.

---

## Features

- User registration and login (using Laravel Breeze)  
- Create, read, update, and delete posts  
- Optional image upload for posts  
- Public view of blog posts  
- User-specific dashboard to manage own posts  
- Clean and responsive UI with Tailwind CSS and custom color theme  

---

## Tech Stack

- Laravel 10+  
- PHP 8+  
- SQLite (default, but can be changed)  
- Tailwind CSS  
- Laravel Breeze (for authentication)  

---

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/reiidj/book-blogs.git
    cd book-blogs
    ```

2. Install PHP and Node dependencies:

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Setup environment file and SQLite database:

    ```bash
    cp .env.example .env
    touch database/database.sqlite
    ```

4. Edit `.env` file to configure the database connection:

    ```
    DB_CONNECTION=sqlite
    DB_DATABASE=/full/path/to/database/database.sqlite
    ```

5. Generate application key:

    ```bash
    php artisan key:generate
    ```

6. Run migrations to create database tables:

    ```bash
    php artisan migrate
    ```

7. Start the development server:

    ```bash
    php artisan serve
    ```

8. Visit the application at [http://localhost:8000](http://localhost:8000)

---

## Usage

- Register a new account or log in.  
- Create new blog posts with optional image uploads.  
- View all public posts on the public posts page.  
- Manage your posts from your user dashboard.

---

Feel free to contribute or report issues!
