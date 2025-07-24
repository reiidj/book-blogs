# 📚 BookBlog — A Minimalist Laravel Blog Platform

**BookBlog** is a lightweight blogging application built with Laravel 10+, featuring authentication, post CRUD, image uploads, and a clean, responsive interface powered by Tailwind CSS. It’s designed for simplicity, extensibility, and clean code.

## 🚀 Features  
- User authentication via **Laravel Breeze**  
- Full blog post management (Create, Read, Update, Delete)  
- Optional image uploads for posts  
- Public view for all blog entries  
- User-specific dashboard to manage own posts  
- Responsive UI styled with **Tailwind CSS** and a custom theme  

## 🧰 Tech Stack  
- **Backend:** Laravel 12, PHP 8.2
- **Frontend:** Tailwind CSS (with custom palette)  
- **Authentication:** Laravel Breeze  
- **Database:** SQLite (default; configurable to MySQL/PostgreSQL)  
- **Build Tools:** Vite  

## ⚙️ Installation & Setup  
```bash
# 1. Clone the repository  
git clone https://github.com/reiidj/book-blogs.git  
cd book-blogs  

# 2. Install PHP and Node dependencies  
composer install  
npm install  
npm run dev  

# 3. Set up environment and SQLite database  
cp .env.example .env  
touch database/database.sqlite  

# 4. Update .env file  
# Example:  
# DB_CONNECTION=sqlite  
# DB_DATABASE=/absolute/path/to/database/database.sqlite  

# 5. Generate application key  
php artisan key:generate  

# 6. Run migrations  
php artisan migrate  

# 7. Start local server  
php artisan serve  
```

## 📸 Screenshots

### Welcome Page  
<img width="1919" height="909" alt="image" src="https://github.com/user-attachments/assets/088dc748-a309-4f2b-a663-122c90dd7c1d" />


