<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function getBookings(){
        $bookings = Booking::with('guestType', 'room', 'roomType', 'bookingStatus')->get();

        return response()->json(['bookings' => $bookings]);
    }  

    public function addBooking(Request $request){
        $request->validate([
            'guest_firstname' => ['required', 'string', 'max:255'],
            'guest_middlename' => ['nullable', 'string', 'max:255'],
            'guest_lastname' => ['required', 'string', 'max:255'],
            'guest_email' => ['required', 'email', 'max:255', 'unique:bookings'],
            'guest_type_id' => ['required', 'exists:guest_types,id'],
            'room_id' => ['required', 'exists:rooms,id'],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'booking_status_id' => ['required', 'exists:booking_statuses,id'],
        ]);

        $booking = Booking::create([
            'guest_firstname' => $request->guest_firstname,
            'guest_middlename' => $request->guest_middlename,
            'guest_lastname' => $request->guest_lastname,
            'guest_email' => $request->guest_email,
            'guest_type_id' => $request->guest_type_id,
            'room_id' => $request->room_id,
            'room_type_id' => $request->room_type_id,
            'booking_status_id' => $request->booking_status_id,
        ]);

        return response()->json(['message' => 'Booking added successfully', 'booking' => $booking]);
    }

    public function editBooking(Request $request, $id){
        $request->validate([
            'guest_firstname' => ['required', 'string', 'max:255'],
            'guest_middlename' => ['nullable', 'string', 'max:255'],
            'guest_lastname' => ['required', 'string', 'max:255'],
            'guest_email' => ['required', 'email', 'max:255', 'unique:bookings,' . $id],
            'guest_type_id' => ['required', 'exists:guest_types,id'],
            'room_id' => ['required', 'exists:rooms,id'],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'booking_status_id' => ['required', 'exists:booking_statuses,id'],
        ]);

        $booking = Booking::find($id);

        if(!$booking){
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->update([
            'guest_firstname' => $request->guest_firstname,
            'guest_middlename' => $request->guest_middlename,
            'guest_lastname' => $request->guest_lastname,
            'guest_email' => $request->guest_email,
            'guest_type_id' => $request->guest_type_id,
            'room_id' => $request->room_id,
            'room_type_id' => $request->room_type_id,
            'booking_status_id' => $request->booking_status_id,
        ]);

        return response()->json(['message' => 'Booking updated successfully', 'booking' => $booking ]);
    }   

    public function deleteBooking($id){
        $booking = Booking::find($id);

        if(!$booking){
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
