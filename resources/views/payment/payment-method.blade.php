@extends('layouts.myapp')

@section('content')
    <div class="max-w-2xl mx-auto mt-12 bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Pilih Metode Pembayaran</h2>

        <form method="POST" action="{{ route('payment.show', $reservationId) }}">
            @csrf

            @foreach ($paymentMethods as $method)
                <div class="border border-gray-300 p-4 rounded-xl mb-5 hover:border-orange-500 transition duration-300">
                    <label class="flex items-start space-x-4 cursor-pointer">
                        <input type="radio" name="payment_method" value="{{ $method->id }}" required
                            class="mt-1 accent-orange-500 w-5 h-5">
                        <div class="flex flex-col">
                            <span class="text-lg font-semibold text-gray-800">{{ $method->type }} -
                                {{ $method->provider }}</span>
                            <p class="text-sm text-gray-600 mt-1"><strong>Nama Akun:</strong> {{ $method->account_name }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>{{ $method->type === 'Bank Transfer' ? 'No. Rekening' : 'No. E-Wallet' }}:</strong>
                                {{ $method->account_number }}
                            </p>
                        </div>
                    </label>
                </div>
            @endforeach

            <button type="submit"
                class="w-full text-white bg-pr-400 p-3 rounded-lg font-bold hover:bg-black shadow-xl hover:shadow-none transition-all duration-300">
                🧾 Lanjut ke Form Pembayaran
            </button>
        </form>

        {{-- Tombol Bayar di Tempat --}}
        <form method="GET" action="{{ route('invoice', $reservationId) }}" class="mt-4">
            <button type="submit"
                class="w-full text-white bg-green-500 p-3 rounded-lg font-bold hover:bg-green-700 shadow-md hover:shadow-lg transition-all duration-300">
                💵 Bayar di Tempat (COD)
            </button>
        </form>

        {{-- Tombol Kembali --}}
        <a href="{{ route('home') }}"
            class="block w-full sm:w-auto text-center bg-gradient-to-r from-gray-100 to-gray-50 text-gray-800 font-semibold text-md px-6 py-3 rounded-xl mt-6 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:bg-gray-200 hover:text-gray-900 border border-gray-200 hover:border-gray-300 active:translate-y-0 active:shadow-sm">
            <div class="flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                <span>Kembali ke Beranda</span>
            </div>
        </a>
    </div>
@endsection
