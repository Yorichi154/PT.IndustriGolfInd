<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Reservation;

class PaymentController extends Controller
{
    // Langkah 1: Menampilkan daftar metode pembayaran
    public function selectMethod($reservationId)
    {
        $paymentMethods = PaymentMethod::all();
        return view('payment.payment-method', compact('paymentMethods', 'reservationId'));
    }

    public function showForm(Request $request, $reservationId)
    {
        $paymentMethodId = $request->input('payment_method');
        $selectedMethod = PaymentMethod::findOrFail($paymentMethodId);

        $reservation = Reservation::findOrFail($reservationId);
        $car = $reservation->car;
        $price = $car->price_per_day;

        $paymentMethods = PaymentMethod::pluck('provider', 'id'); // untuk tampilan, opsional

        return view('payment.payment', compact('paymentMethods', 'reservationId', 'car', 'price', 'selectedMethod'));
    }




    // Langkah 3: Memproses pembayaran
    public function process(Request $request, $reservationId)
    {
        $request->validate([
            'payment_method' => 'required|exists:payment_methods,id',
            'terms_agreed' => 'accepted',
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $reservation = Reservation::findOrFail($reservationId);
        $method = PaymentMethod::find($request->payment_method);

        // Simpan bukti transfer
        if ($request->hasFile('payment_proof')) {
            $filename = time() . '_' . $request->file('payment_proof')->getClientOriginalName();
            $path = $request->file('payment_proof')->storeAs('payment_proofs', $filename, 'public');
            $reservation->payment_proof = $path;
        }

        $reservation->payment_method = $method->provider;
        $reservation->payment_status = 'Waiting Confirmation';
        $reservation->save();

        return redirect()->route('thankyou', ['reservation' => $reservation->id])
            ->with('success', 'Pembayaran berhasil!');
    }
}
