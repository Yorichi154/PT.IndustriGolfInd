@extends('layouts.myapp')
@section('content')
    <div class="max-w-2xl mx-auto mt-6 sm:mt-10 bg-white p-4 sm:p-8 rounded-xl shadow-md">
        <h2 class="text-xl sm:text-2xl font-bold mb-6 text-gray-800">🧾 Konfirmasi Pembayaran</h2>

        <form method="POST" action="{{ route('payment.process', $reservationId) }}" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <input type="hidden" name="payment_method" value="{{ $selectedMethod->id }}">

            {{-- Detail Metode Pembayaran --}}
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                <p class="text-lg font-semibold text-gray-700 mb-2">Metode: {{ $selectedMethod->type }}</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p><span class="font-medium">Provider:</span> {{ $selectedMethod->provider }}</p>
                    <p><span class="font-medium">Nama Akun:</span> {{ $selectedMethod->account_name }}</p>
                    <p>
                        <span class="font-medium">
                            {{ $selectedMethod->type === 'Bank Transfer' ? 'No. Rekening' : 'No. E-Wallet' }}:
                        </span>
                        {{ $selectedMethod->account_number }}
                    </p>
                </div>
            </div>

            {{-- Upload Bukti --}}
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Unggah Bukti Transfer (JPG/PNG)</label>

                <div class="mt-1">
                    <!-- Hidden file input -->
                    <input type="file" name="payment_proof" id="payment_proof" accept="image/jpeg,image/png"
                        class="hidden">

                    <!-- Custom upload area -->
                    <label for="payment_proof"
                        class="flex flex-col items-center justify-center w-full p-6 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-orange-400 hover:bg-orange-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-orange-400 mb-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <p class="text-sm text-gray-600 text-center">
                            <span class="font-medium text-orange-500">Klik untuk upload</span> atau drag & drop
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Format JPG atau PNG (max 5MB)</p>
                    </label>

                    <!-- Preview container -->
                    <div id="payment_proof_preview" class="mt-3 hidden text-center">
                        <img id="preview_image" class="max-w-full h-auto max-h-60 rounded-md" src="#"
                            alt="Preview bukti transfer">
                        <button type="button" onclick="removeImage()"
                            class="mt-2 text-sm text-red-500 hover:text-red-700">Hapus gambar</button>
                    </div>

                    {{-- Terms --}}
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="terms_agreed" required
                                class="focus:ring-orange-400 h-4 w-4 text-orange-500 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms_agreed" class="text-gray-600">
                                Saya menyetujui <a href="#" class="underline text-blue-500 hover:text-blue-700">syarat
                                    dan ketentuan</a>
                            </label>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                        class="w-full text-white bg-pr-400 p-3 rounded-lg font-bold hover:bg-black shadow-xl hover:shadow-none transition-all duration-300">
                        ✅ Konfirmasi & Kirim Bukti Pembayaran
                    </button>
        </form>

        {{-- Back Home --}}
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

    <script>
        document.getElementById('payment_proof').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('payment_proof_preview');
            const previewImage = document.getElementById('preview_image');
            const uploadLabel = document.querySelector('label[for="payment_proof"]');

            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Hide upload area
                    uploadLabel.classList.add('hidden');

                    // Show preview container
                    previewContainer.classList.remove('hidden');
                    previewImage.src = e.target.result;

                    // Apply frame styling
                    previewImage.classList.add(
                        'block',
                        'mx-auto',
                        'border-4',
                        'border-gray-200',
                        'p-2',
                        'bg-white',
                        'shadow-md',
                        'rounded-lg',
                        'object-contain',
                        'max-h-80'
                    );

                    // Add matted frame effect
                    previewContainer.classList.add(
                        'p-4',
                        'bg-gray-50',
                        'rounded-xl',
                        'border',
                        'border-gray-100'
                    );
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        function removeImage() {
            const uploadLabel = document.querySelector('label[for="payment_proof"]');
            const previewContainer = document.getElementById('payment_proof_preview');
            const previewImage = document.getElementById('preview_image');

            // Reset file input
            document.getElementById('payment_proof').value = '';

            // Show upload area again
            uploadLabel.classList.remove('hidden');

            // Hide preview container
            previewContainer.classList.add('hidden');

            // Remove all frame styling
            previewImage.classList.remove(
                'block',
                'mx-auto',
                'border-4',
                'border-gray-200',
                'p-2',
                'bg-white',
                'shadow-md',
                'rounded-lg',
                'object-contain',
                'max-h-80'
            );

            previewContainer.classList.remove(
                'p-4',
                'bg-gray-50',
                'rounded-xl',
                'border',
                'border-gray-100'
            );
        }
    </script>
