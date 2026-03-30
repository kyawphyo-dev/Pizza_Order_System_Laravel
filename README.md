# 🍕 Pizza Order System (Laravel)

A full-stack web application for ordering pizzas online, built with Laravel.
This project includes a customer-facing website and an admin dashboard for managing products and orders.

---

## 🚀 Features

### 👤 Customer Site

-   Browse pizza menu
-   View categories (Pizza, Drinks, Desserts,combo-deals)
-   Make Reservation (For Dine in)
-   Add items to cart
-   Customize pizzas with toppings
-   Place orders(Can choose between Deliver or Pickup)
-   Real time status for booking, and Order
-   User authentication (Register / Login)
-   Update profile information (name, email)
-   Manage address and phone number
-   Change password

---

### 🛠️ Admin Dashboard

#### 📊 Dashboard & Reports

-   View order reports (Today, Weekly, Monthly, Overall)
-   Earnings overview with charts and statistics
-   Booking reports with the same time filters
-   Summary cards (Total Orders, Pending, Confirmed, Cancelled, Earnings)

---

#### 🍕 Menu Management

-   Manage menu items:
    -   Pizzas
    -   Soft Drinks
    -   Desserts
    -   Combo Deals
-   Perform full CRUD operations:
    -   Add, Edit, Update, Delete
-   View all menu lists

---

#### 📦 Order Management

-   View orders by:
    -   Today
    -   Weekly
    -   Monthly
    -   Overall
-   View detailed order information
-   Update order status:
    -   Pending
    -   Confirm
    -   Ready
    -   Picked Up / Delivered
    -   Cancel
-   Search orders

---

#### 📅 Booking Management

-   Same functionality as order system:
    -   Time-based reports
    -   Status management
    -   View booking details

---

#### 👤 User & Profile Management

-   Update profile (name, email, phone, address)
-   Change password securely
-   Upload profile image

---

#### 🛡️ Role Management (Super Admin)

-   Create new admin accounts
-   Promote user → admin
-   Downgrade admin → user

---

#### 💳 Payment Management

-   Create and manage payment methods

---

## 🧱 Tech Stack

-   Backend: Laravel (PHP)
-   Frontend: Blade Template, Bootstrap
-   Database: MySQL
-   Authentication: Laravel Auth System

---

## 🎨 UI Disclaimer

The frontend design is based on a free template from BootstrapMade.
It has been customized and integrated with Laravel backend functionality.

---

## 🔐 Demo Accounts

### 👤 Customer

You can create user account by yourself even with fake email

### 🛠️ Admin

Email: [superadmin@example.com](mailto:admin@example.com)
Password: superadmin1234

---

## ⚙️ Installation Guide

Clone the repository:

```bash
git clone https://github.com/kyawphyo-dev/Pizza_Order_System_Laravel.git
cd Pizza_Order_System_Laravel
```

Install dependencies:

```bash
composer install
```

Setup environment:

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`, then run:

```bash
php artisan migrate
php artisan serve
```

---

## 📸 Screenshots

Not avaliable yet

-   Customer homepage
-   Menu page
-   Cart / Checkout
-   Admin dashboard

---

## 🌐 Live Demo

Not avaliable yet

---

## 📚 Learning Outcomes

-   Applied Laravel MVC architecture
-   Built CRUD operations for multiple entities
-   Designed relational database (pizza, toppings, orders)
-   Implemented authentication and authorization
-   Developed admin dashboard with role-based structure

---

## 👨‍💻 Author

Kyaw Phyo Win
Aspiring Full-Stack Developer
