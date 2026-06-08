<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        // Create a test user matching standard credentials sequence
        User::create([
            'name' => 'Ammar Hakimi',
            'email' => 'student@iium.edu.my',
            'password' => Hash::make('password123')
        ]);

        // Inject initial mockups entries
        Barber::create([
            'name' => 'The Gentleman\'s Den',
            'specialization' => 'Premium grooming experience • 456 Oak Avenue',
            'availability_status' => 'Available'
        ]);

        Barber::create([
            'name' => 'Classic Cuts',
            'specialization' => 'Traditional barbershop with modern amenities • 122 Main Street',
            'availability_status' => 'Available'
        ]);

        Barber::create([
            'name' => 'Urban Styles',
            'specialization' => 'Trendy cuts and modern styles • 789 Style Blvd',
            'availability_status' => 'Available'
        ]);
    }
}