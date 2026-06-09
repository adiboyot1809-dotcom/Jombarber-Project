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
```

### Barber Model Configuration (`Barber.php`)
```php
class Barber extends Model {
    use HasFactory;

    protected $primaryKey = 'barber_id';
    protected $fillable = ['name', 'specialty', 'status'];

    public function appointments() {
        return $this->hasMany(Appointment::class, 'barber_id');
    }
}
```

### Appointment Model Configuration (`Appointment.php`)
```php
class Appointment extends Model {
    use HasFactory;

    protected $primaryKey = 'appointment_id';
    protected $fillable = ['user_id', 'barber_id', 'appointment_date', 'appointment_time', 'queue_number', 'price'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barber() {
        return $this->belongsTo(Barber::class, 'barber_id');
    }
}
```
### Views & User Interface Architecture
```text
resources/views/
├── master/
│   └── app.blade.php        # Centralized base structural layout configuration
├── auth/
│   ├── login.blade.php      # Validated user access logging panel
│   └── register.blade.php   # Secure client profile registration page
└── booking/
    ├── dashboard.blade.php  # Core interface showing active schedules and barber lists
    └── create.blade.php     # Date-time interactive reservation selection grid
```
## User Authentication & Security Measures
### Core Security Defenses
- **Cryptographic Hashing**: All passwords undergo strong, standard processing prior -to storage injection.

- **CSRF Tokens Guarding**: Every active form incorporates automatic verification checks to completely block cross-site validation exploits.

- **Route Access Shielding**: Middleware handles access permissions, instantly forcing unauthenticated traffic back to the login wall.

- **Data Ingestion Sanitization**: Requests undergo server-side field verification to prevent malformed injections.

## Installation and Setup Instructions
### Prerequisites
- PHP >= 8.2

- Composer Dependency Manager

- MySQL Server Engine (via XAMPP Control Panel)

## Step-by-Step Installation Protocol
1. Clone and Enter Repository Root
```Bash
git clone [https://github.com/adiboyot1809-dotcom/Jombarber-Project.git](https://github.com/adiboyot1809-dotcom/Jombarber-Project.git)
cd Jombarber-Project
```
2. Package Dependency Ingestion
```Bash
composer install
```
3. Environment Workspace Standardization
```Bash
cp .env.example .env
```
4. Cryptographic Security Key Generation
```Bash
php artisan key:generate
```
5. Database Initialization & Seeding
```Bash
php artisan migrate:fresh --seed
```
6. Execute Local Server Development Engine
```Bash
php artisan serve
```
## Challenges Faced and Solutions
### Challenge 1: AM/PM Datetime Normalization
- **Problem**: Frontend interfaces output standard 12-hour text parameters (e.g., 02:00 PM) which violate native MySQL 24-hour storage constraints (14:00:00), throwing unexpected exceptions.

- **Solution**: Engineered a transformation filter within the BookingController using PHP's standard parsing utilities to cast dates safely before model persistence checks.

### Challenge 2: Deterministic Queue Allocations
- **Problem**: Managing concurrent schedules while assigning clean, incremental ticket tracking index codes for individual barbers on the same day.

- **Solution**: Developed a mathematical verification query tracking row counts for any unique combination:
Queue Number = (Total Scheduled Appointments on Chosen Date) + 1

## Learning Outcomes
### Technical Mastery
- **Laravel Framework** Execution: Deep understanding of true decoupled MVC development flows and Eloquent relationship mappings.

- **Relational Integrity Operations**: Structuring clear primary/foreign key connections across transaction records.

- **Git Version Control Management**: Resolving history non-fast-forward blocks, remote origin conflicts, and tracking files correctly through command line flags.

### Team Dynamics
- Collaborating across shared objectives to hit precise university rubric presentation standards before the strict Week 14 deadline.

## References
1. Laravel Documentation. (2026). Laravel Framework Reference Guide. Available at: https://laravel.com/docs

2. MySQL Reference Documentation. (2026). Relational Data Handling Manuals. Available at: https://dev.mysql.com/doc/

3. IIUM Academic Guidelines. (2026). BIIT2305 Web Application Development Rubrics.

## Conclusion
The JomBarber project successfully demonstrates a full-stack MVC appointment system using Laravel. It balances strict model-view segregation rules, verified authentication safeguards, and real-time query counters to solve concrete queuing inefficiencies within local service shops.

- Project Completion Date: 12 June 2026

- Course: BIIT 2305 Web Application Development