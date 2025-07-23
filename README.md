BookBlog - Mini Laravel Blog Project
This is a simple blog application built with Laravel. It supports user authentication, post management (CRUD), image uploads, and a clean, responsive UI styled with Tailwind CSS.

Features
User registration and login (using Laravel Breeze)

Create, read, update, and delete posts

Optional image upload for posts

Public view of blog posts

User-specific dashboard to manage own posts

Clean and responsive UI with Tailwind CSS and custom color theme

Tech Stack
Laravel 10+

PHP 8+

SQLite (default, but can be changed)

Tailwind CSS

Laravel Breeze (for authentication)

Installation
Clone this repository:

bash
Copy
Edit
git clone https://github.com/reiidj/book-blogs.git
cd book-blogs
Install dependencies:

bash
Copy
Edit
composer install
npm install
npm run dev
Copy .env.example to .env and configure your database settings. By default, it uses SQLite.

bash
Copy
Edit
cp .env.example .env
touch database/database.sqlite
Then update .env:

pgsql
Copy
Edit
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/database/database.sqlite
Generate app key:

bash
Copy
Edit
php artisan key:generate
Run migrations:

bash
Copy
Edit
php artisan migrate
Serve the app:

bash
Copy
Edit
php artisan serve
Access your app at http://localhost:8000

Usage
Register a new account or login.

Create new blog posts with optional image uploads.

View all public posts on the public posts page.

Manage your posts from the user dashboard.
