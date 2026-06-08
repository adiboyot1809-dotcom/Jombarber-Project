# JomBarber: A Centralized Barber Appointment & Service Management System

## Group Details (Section 1)
* **Ammar Hakimi Azwari Bin Mohamad Haslan** (2415327) - Group Leader
* **Muhammad Adib Bin Azmi** (2415951)
* **Muhammad Haziq Bin Nasri** (2415543)
* **Muhammad Mukhrizq Wafiq Bin Mohd Masri** (2417469)
* **Muhammad Akmal Bin Ahmad Zailani** (2413967)
* **Nik Nurul Fatihah Binti Wan Zamri** (2416020)

---

## 🚀 Project Overview
JomBarber is a Shariah-compliant web application designed using the Laravel Model-View-Controller (MVC) architecture. It bridges the gap between local barbershops and customers by offering an automatic queue numbering booking engine, interactive profiles, reservation tracking logs, and a dynamic rating system.

---

## 🛠️ System Architecture & Grading Checklist Fulfillments

### 1. Model-View-Controller (MVC) Implementation
* **Models (`app/Models/`):** Contains `User.php`, `Barber.php`, `Appointment.php`, and `Review.php` mapped through Eloquent Relationships.
* **Controllers (`app/Http/Controllers/`):** * `AuthController` manages state protection, secure logins, and validations.
  * `BookingController` processes reservations, dynamic 24-hour time formatting, and customer feedback.
* **Views (`resources/views/`):** Uses the Blade templating layout engine. Page content loads into a central frame located at `master/app.blade.php`.

### 2. Media Integration & Design Scheme
* **Media UI elements:** Employs crisp vector graphic styling via FontAwesome branding tags and image fallback slots for barbershops.
* **Theme Layout:** Uses high-contrast structural classes from Tailwind CSS (Slate, Blue, and Amber color accents) to recreate the custom UI mockups gracefully.

---

## ⚙️ Local Deployment Guide

To install and review this project locally, run the following commands in order:

```bash
# 1. Install dependencies
composer install

# 2. Configure environment database tags inside your .env file
# Ensure DB_DATABASE=jombarber_db is active

# 3. Create structural tables and populate mock data 
php artisan migrate:fresh --seed

# 4. Fire up the local webserver
php artisan serve