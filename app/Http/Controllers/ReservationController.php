<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'guests' => 'required|integer|min:1|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        // Logic to store reservation would go here.
        // For now, we will just redirect back with a success message.

        return redirect()->route('home')->with('success', 'Terima kasih! Reservasi Anda telah kami terima. Kami akan menghubungi Anda segera untuk konfirmasi.');
    }
}
