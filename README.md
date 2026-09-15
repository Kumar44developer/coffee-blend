# ☕ Coffee Blend

A full-stack coffee shop web application built with PHP and MySQL. Customers can browse the menu, place table bookings, add products to cart, checkout with PayPal, and leave reviews. A separate admin panel lets shop owners manage products, orders, bookings, and admin accounts.

---

## Features

**Customer Side**

- User registration and login with hashed passwords
- Browse coffee products with detail pages and related items
- Add to cart, adjust quantity, and remove items
- Checkout with billing details and PayPal integration
- Book a table by choosing date, time, and party size
- Write and submit product reviews
- Responsive design with smooth scroll animations

**Admin Panel**

- Secure admin login (separate from customers)
- Dashboard showing total products, orders, bookings, and admins
- Create, view, and delete products (with image uploads)
- View and delete customer orders
- View bookings and update their status
- Manage admin accounts

---

## Tech Stack

| Layer        | Technology                                       |
| ------------ | ------------------------------------------------ |
| Backend      | PHP 7+ (PDO with MySQL)                          |
| Database     | MySQL                                            |
| Frontend     | HTML5, CSS3, Bootstrap 4, SCSS                   |
| JavaScript   | jQuery 3, Owl Carousel, AOS, Magnific Popup      |
| Payments     | PayPal JavaScript SDK                            |
| Fonts        | Poppins, Josefin Sans, Great Vibes (Google Fonts) |
| Icons        | Flaticon, Ionicons, Icomoon, Open Iconic          |

---

## Project Structure

```
coffee-blend/
├── admin-panel/              # Admin dashboard & management
│   ├── admins/               # Admin login, registration, listing
│   ├── booking/              # Admin-side booking creation
│   ├── bookings-admins/      # View, update status, delete bookings
│   ├── config/               # Admin DB config
│   ├── layouts/              # Admin header & footer templates
│   ├── orders-admins/        # View, show details, delete orders
│   ├── products-admins/      # Create, view, delete products
│   ├── styles/               # Admin panel CSS
│   └── index.php             # Admin dashboard (stats overview)
│
├── auth/                     # Customer authentication
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── booking/
│   └── book.php              # Table reservation form handler
│
├── config/
│   └── config.php            # Database connection (PDO)
│
├── css/                      # Stylesheets
│   ├── bootstrap/            # Bootstrap 4 source
│   └── css/                  # Custom styles and vendor CSS
│
├── fonts/
│   └── flaticon/             # Custom icon font
│
├── includes/                 # Shared page templates
│   ├── header.php            # Navbar, meta tags, CSS imports
│   └── footer.php            # Footer, JS imports, loader
│
├── js/                       # JavaScript libraries & custom scripts
│   ├── jquery.min.js
│   ├── bootstrap.min.js
│   ├── owl.carousel.min.js
│   ├── aos.js
│   ├── main.js               # Custom app logic
│   └── ...                   # Other vendor scripts
│
├── products/                 # Product & cart pages
│   ├── product-single.php    # Product detail + add to cart
│   ├── cart.php              # Shopping cart
│   ├── checkout.php          # Billing form & order placement
│   ├── pay.php               # PayPal payment page
│   ├── delete-cart.php       # Clear cart after payment
│   └── delete-product.php    # Remove single cart item
│
├── reviews/
│   └── write-review.php      # Customer review submission
│
└── scss/
    └── bootstrap/            # Bootstrap SCSS source
```

---

## Database Schema

The application uses a MySQL database named `coffee-blend` with these tables:

| Table        | Purpose                                |
| ------------ | -------------------------------------- |
| `users`      | Customer accounts (username, email, password) |
| `admins`     | Admin accounts (adminname, email, password) |
| `products`   | Coffee products (name, price, description, type, image) |
| `cart`       | Temporary cart items per user          |
| `orders`     | Placed orders with billing and status  |
| `bookings`   | Table reservations with date and time  |
| `reviews`    | Customer-submitted reviews             |

---

## Getting Started

### Prerequisites

- **PHP** 7.0 or higher
- **MySQL** 5.7 or higher
- **Apache** with `mod_rewrite` enabled (XAMPP, WAMP, or MAMP recommended)

### Installation

1. **Clone the repository** into your web server's root directory:

   ```bash
   git clone https://github.com/Kumar44developer/coffee-blend.git
   ```

2. **Create the database.** Open phpMyAdmin or your MySQL client and create a database:

   ```sql
   CREATE DATABASE `coffee-blend`;
   ```

3. **Create the required tables:**

   ```sql
   USE `coffee-blend`;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL,
       password VARCHAR(255) NOT NULL
   );

   CREATE TABLE admins (
       id INT AUTO_INCREMENT PRIMARY KEY,
       adminname VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL,
       password VARCHAR(255) NOT NULL
   );

   CREATE TABLE products (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       price DECIMAL(10,2) NOT NULL,
       description TEXT,
       type VARCHAR(100),
       image VARCHAR(255)
   );

   CREATE TABLE cart (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       image VARCHAR(255),
       price DECIMAL(10,2) NOT NULL,
       pro_id INT NOT NULL,
       description TEXT,
       quantity INT DEFAULT 1,
       user_id INT NOT NULL
   );

   CREATE TABLE orders (
       id INT AUTO_INCREMENT PRIMARY KEY,
       first_name VARCHAR(255) NOT NULL,
       last_name VARCHAR(255) NOT NULL,
       state VARCHAR(100),
       street_address VARCHAR(255),
       town VARCHAR(100),
       zip_code VARCHAR(20),
       phone VARCHAR(50),
       user_id INT NOT NULL,
       status VARCHAR(50) DEFAULT 'Pending',
       total_price DECIMAL(10,2)
   );

   CREATE TABLE bookings (
       id INT AUTO_INCREMENT PRIMARY KEY,
       first_name VARCHAR(255) NOT NULL,
       last_name VARCHAR(255) NOT NULL,
       date VARCHAR(50),
       time VARCHAR(50),
       phone VARCHAR(50),
       message TEXT,
       user_id INT NOT NULL
   );

   CREATE TABLE reviews (
       id INT AUTO_INCREMENT PRIMARY KEY,
       review TEXT NOT NULL,
       username VARCHAR(255) NOT NULL
   );
   ```

4. **Configure the database connection.** Edit `config/config.php` if your MySQL credentials differ from the defaults:

   ```php
   define("HOST", "localhost");
   define("DBNAME", "coffee-blend");
   define("USER", "root");
   define("PASS", "");
   ```

5. **Set the application URL.** Open `includes/header.php` and update the `APPURL` constant to match your local setup:

   ```php
   define("APPURL", "http://localhost/coffee-blend");
   ```

6. **Start your server** (Apache + MySQL) and visit:

   ```
   http://localhost/coffee-blend
   ```

---

## Usage

| Action              | URL                                           |
| ------------------- | --------------------------------------------- |
| Homepage            | `http://localhost/coffee-blend`                |
| Login               | `http://localhost/coffee-blend/auth/login.php` |
| Register            | `http://localhost/coffee-blend/auth/register.php` |
| Admin Panel         | `http://localhost/coffee-blend/admin-panel`    |

---

## PayPal Setup

The payment page uses the PayPal JavaScript SDK in sandbox mode. To use your own PayPal account:

1. Go to the [PayPal Developer Dashboard](https://developer.paypal.com/)
2. Create a sandbox app and copy the **Client ID**
3. Replace the `client-id` value in `products/pay.php`

---

## Built With

- [Bootstrap 4](https://getbootstrap.com/) — Responsive grid and components
- [Owl Carousel](https://owlcarousel2.github.io/OwlCarousel2/) — Touch-friendly content slider
- [AOS](https://michalsnik.github.io/aos/) — Animate On Scroll library
- [Magnific Popup](https://dimsemenov.com/plugins/magnific-popup/) — Lightbox and modal dialogs
- [PayPal SDK](https://developer.paypal.com/docs/checkout/) — Client-side payment processing

---

## License

This project uses the [Colorlib](https://colorlib.com) Coffee template, licensed under [CC BY 3.0](https://creativecommons.org/licenses/by/3.0/). The Colorlib attribution link in the footer must be retained.

---

## Author

**Kumar44developer** — [GitHub Profile](https://github.com/Kumar44developer)
