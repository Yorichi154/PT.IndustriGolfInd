@extends('layouts.myapp')
@section('content')
    <div class="grid place-items-center">
        <div class="border p-5 md:w-1/2 w-4/5 bg-sec-100 my-12">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5 ">
                    @error('name')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5 ">
                    @error('email')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="flex md:flex-row flex-col justify-evenly px-6 py-4 items-center text-center">
                    <div class="grid grid-cols-3">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="m-3">
                                <input type="radio" name="avatar_option" value="/images/avatars/avatar_{{ $i }}.jpg"
                                    id="avatar_{{ $i }}" class="hidden">
                                <label for="avatar_{{ $i }}">
                                    <img loading="lazy" class="avatar w-12" src="/images/avatars/avatar_{{ $i }}.jpg" alt="">
                                </label>
                            </div>
                        @endfor
                    </div>
                    <div class="w-1/3 mb-2">
                        <p>OR</p>
                    </div>
                    <div>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input" type="file" name="avatar_choose">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password:</label>
                    <input type="password" id="password"
                        class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5"
                        name="password">
                    @error('password')
                        <span><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password:</label>
                    <input type="password" id="password-confirm"
                        class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5"
                        name="password_confirmation">
                </div>

                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-pr-300"
                            name="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                </div>

                <button type="submit"
                    class="text-white bg-pr-400 hover:bg-pr-600 focus:ring-4 focus:outline-none focus:ring-pr-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-pr-600 dark:hover:bg-pr-700 dark:focus:ring-pr-800">
                    Register
                </button>
            </form>
        </div>
    </div>

    <script>
        // Avatar selection border toggle
        var radios = document.querySelectorAll('input[type="radio"]');
        var images = document.querySelectorAll('.avatar');

        radios.forEach(function(radio, index) {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    images.forEach(function(image, imageIndex) {
                        if (imageIndex === index) {
                            image.classList.add('border', 'border-red-600', 'rounded-full', 'p-1');
                        } else {
                            image.classList.remove('border', 'border-red-600', 'rounded-full', 'p-1');
                        }
                    });
                }
            });
        });

        // Auto show password feature (delay 500ms)
        function setupAutoReveal(inputId, delay = 500) {
            const input = document.getElementById(inputId);
            let timer;

            input.addEventListener('input', function () {
                input.type = 'text';
                clearTimeout(timer);
                timer = setTimeout(() => {
                    input.type = 'password';
                }, delay);
            });
        }

        setupAutoReveal('password', 400);
        setupAutoReveal('password-confirm', 400);
    </script>
@endsection
