<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API Documentation

## 💁‍♀️ Allowed HTTP request
- **GET**: To retrieve data from the API.
- **POST**: To send data to the API (create new data).
- **PUT**: To update existing data on the API.
- **DELETE**: To delete data from the API.

## 📝 Description Of Usual Server Responses
- **200 OK**: Request was successful.
- **404 Not Found**: Requested data was not found.

## 📚 Books Attributes
- **id (BIGINT)**: Unique identifier (Primary Key).
- **title (VARCHAR)**: Book Title.
- **description (TEXT)**: Book Description.
- **author (VARCHAR)**: Author Name.
- **created_at (TIMESTAMP)**: Timestamp when the book was created.
- **updated_at (TIMESTAMP)**: Timestamp when the book was last updated.
