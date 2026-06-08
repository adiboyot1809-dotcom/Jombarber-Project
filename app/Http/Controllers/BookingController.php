<?php
namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller {
    // 1. Home Dashboard Page
    public function index() {
        return view('home');
    }

    // 2. Browse Barbershops / Profiles
    public function browseBarbers() {
        $barbers = Barber::with('reviews')->get();
        return view('browse', compact('barbers'));
    }

    // 3. Show Booking Page form
    public function showBookingForm() {
        $barbers = Barber::where('availability_status', 'Available')->get();
        return view('booking', compact('barbers'));
    }

    // 4. Handle incoming Appointment Form Submissions
    // 4. Handle incoming Appointment Form Submissions
    public function storeAppointment(Request $request) {
        $request->validate([
            'barber_id' => 'required|exists:barbers,barber_id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string'
        ]);

        // CRITICAL FIX: Convert "10:00 AM" or "02:00 PM" into 24-hour format "10:00:00" or "14:00:00" for MySQL
        $formattedTime = date("H:i:s", strtotime($request->appointment_time));

        // Mocking queue numbering assignment sequentially
        $queueNum = Appointment::where('appointment_date', $request->appointment_date)->count() + 1;

        $appointment = Appointment::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'barber_id' => $request->barber_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $formattedTime, // Save the cleanly converted 24-hour time here
            'notes' => $request->notes,
            'queue_number' => $queueNum,
            'price' => 30.00 // Fixed proposal price matching Mockup 7.4
        ]);

        return redirect()->route('payment.page', $appointment->appointment_id);
    }

    // 5. Payment Summary Screen
    public function paymentPage($id) {
        $appointment = Appointment::with('barber')->findOrFail($id);
        return view('payment', compact('appointment'));
    }

    // 6. View Booked History List 
    public function myAppointments() {
        $appointments = Appointment::where('user_id', Auth::id())->with('barber')->orderBy('appointment_date', 'desc')->get();
        return view('my-appointments', compact('appointments'));
    }

    // 7. Process Cancel Action
    public function cancelAppointment($id) {
        $appointment = Appointment::where('user_id', Auth::id())->findOrFail($id);
        $appointment->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Appointment successfully cancelled.');
    }

    // 8. Review Management Page view
    public function showReviewForm() {
        $barbers = Barber::all();
        return view('rate-barber', compact('barbers'));
    }

    // 9. Save review records
    public function storeReview(Request $request) {
        $request->validate([
            'barber_id' => 'required|exists:barbers,barber_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'barber_id' => $request->barber_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->route('home')->with('success', 'Thank you for your rating submission!');
    }
}