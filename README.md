# JomBarber - Centralized Barber Appointment Management System

## Group Information

**Group Name**: Section 1 - Group Matrix  
**Course Code**: BIIT2305 (Web Application Development)  
**Academic Institution**: International Islamic University Malaysia (IIUM)  

**Group Members** :
- AMMAR HAKIMI AZWARI BIN MOHAMAD HASLAN - 2415327 (Group Leader)
- MUHAMMAD ADIB BIN AZMI - 2415951
- MUHAMMAD HAZIQ BIN NASRI - 2415543
- MUHAMMAD MUKHRIZQ WAFIQ BIN MOHD MASRI - 2417469
- MUHAMMAD AKMAL BIN AHMAD ZAILANI - 2413967
- NIK NURUL FATIHAH BINTI WAN ZAMRI - 2416020

---

## Project Overview

### Introduction
JomBarber is a specialized, web-based centralized barber appointment management system engineered to modernize operations within the local grooming sector. Developed using the robust Laravel Model-View-Controller (MVC) architecture, the system provides an automated, real-time scheduler designed to eliminate physical waiting queues, optimize barber schedules, and enhance consumer convenience.


## Project Objectives

- **Primary Goal**: Create a functional, centralized barber appointment reservation platform connecting clients with specialized barbers.
- **Technical Goal**: Correctly implement the Laravel MVC architecture framework with secure session tracking and clean CRUD operations.
- **User Experience Goal**: Provide an intuitive, responsive user interface utilizing modular Blade structures for seamless booking actions.
- **Business Goal**: Enable efficient digital queue sequencing and programmatic schedule management for barbershop merchants.


## Target Users

- **Shop Clients/Customers**: Individuals searching for convenient, digital slot bookings to eliminate walk-in waiting periods.
- **Barbers/Merchants**: Specialized professionals seeking to organize daily time blocks and view incoming client queue flows.
- **System Administrators**: Management personnel overseeing user access control states and general platform configurations.


## Features and Functionalities

### Customer Features
- **User Registration & Login**: Secure user creation, input data validation rules, and session state initialization.
- **Dynamic Barber Browsing**: Interactive interface displaying active barber profiles, specialties, and skills.
- **Smart Booking Engine**: Seamless appointment scheduler with date picker layouts and localized parameter handling.
- **Automatic Datetime Conversion**: Real-time conversion of 12-hour frontend time formats into backend-compliant database inputs.
- **Sequential Ticket Tracking**: Immediate live calculations of specific queue placement tokens for any requested date.

### Admin & Backend Features
- **State-Protected Path Gateways**: Automatic guest middleware route shielding to block unauthorized booking panel access.
- **Relational Integrity Mapping**: Robust table linkage mapping profiles across multiple relational entities.
- **Queue Generation Logic**: Programmatic increments of daily booking indices to avoid booking index collisions.

---

## Technical Implementation

### Technology Stack
- **Backend Framework**: Laravel 12.x (MVC Architecture Pattern)
- **Frontend Engine**: Blade Template Layouts with CSS Structural Frameworks
- **Database Layer**: MySQL 8.x Persistent Storage Engine
- **Local Host Environment**: XAMPP Control Panel Ecosystem

### Database Design

#### Database Schema Overview
The persistent storage layer contains three primary relational tables managed through Eloquent ORM abstractions to handle appointments seamlessly:

- **`users`** - Stores client profiles, authentication strings, and hashed encryption credentials.
- **`barbers`** - Registers merchant profile details, talent specialties, and active operational availability statuses.
- **`appointments`** - Core transactional ledger tracking user selections, barber constraints, timestamps, and queue indices.

#### Key Relational Mappings:
- A **User** can place multiple appointments (**One-to-Many Relationship**).
- A **Barber** can accept multiple client assignments (**One-to-Many Relationship**).
- An **Appointment** belongs to one specific User and one specific Barber (**Belongs-To Inverse Relationships**).

---

## Laravel Components Implementation

### Routing Layout (`routes/web.php`)
```php
// Public Authentication Gateways
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected Client Routing Architecture (Middleware Encapsulated)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');
});
```
### Primary Controller Framework (app/Http/Controllers/)
### Text Explanation of Controller Mechanics:
- **`Controller.php`**: Acts as the abstract base parent layout file providing core helper attributes used throughout all application sub-controllers. It manages foundational code setups and global input verification methods required across your codebase.

- **`AuthController.php`**: Completely governs the application registration routines, login credential handling, field data validations (checking for unique email formats and required matching text fields), secure password cryptographic hash checks, and active session tracking states to safely manage client access.

- **`BookingController.php`**: Systematically drives the central barber booking engine paths. It processes customer inputs, manages backend 24-hour time conversions to match standard database inputs, fetches active list objects, and executes unique counter evaluations to calculate real-time queue tokens seamlessly.

### Data Model Configurations (**app/Models/**)
#### User Model Configuration (`User.php`)
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function appointments() {
        return $this->hasMany(Appointment::class, 'user_id');
    }
}