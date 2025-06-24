@extends('layouts.myapp')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-10">
    <div class="w-full max-w-xl bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-10 text-center space-y-6">
        
        <!-- Icon Check -->
        <div class="flex justify-center">
            <svg class="w-20 h-20 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" 
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white">
            Terima kasih atas pesan Anda!
        </h2>

        <!-- Subtitle -->
        <p class="text-base md:text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
            Kami telah menerima pesan Anda dan akan segera menghubungi Anda kembali.
        </p>

        <!-- Button -->
         <a href="{{ route('home') }}"
                    class="inline-block px-8 py-3 text-sm font-semibold text-white transition bg-pr-400 rounded-md hover:bg-pr-500">
                    Kembali ke Beranda
                </a>
    </div>
</div>
@endsection
