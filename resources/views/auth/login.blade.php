@extends('layouts.myapp')

@section('content')
    <div class="grid place-items-center h-screen">
        <div class="md:w-1/2 w-4/5 p-4 bg-white border border-gray-200 rounded-lg shadow -mt-48">
            <form class="space-y-6" method="POST" action="{{ route('admin.login') }}">
                @csrf

                <h5 class="text-xl font-medium text-gray-900">Sign in as Admin</h5>

                {{-- Email --}}
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                    <input type="email" id="email" name="email" 
                        value="{{ old('email') ? old('email') : 'test_admin@email.com' }}"
                        class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5"
                        placeholder="test_admin@email.com">
                    @error('email')
                        <span><strong class="text-red-500">{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                    <input type="password" id="password" name="password"
                        class="input-animate bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Demo for test: pass1234" value="pass1234">
                    @error('password')
                        <span><strong class="text-red-500">{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full text-white bg-pr-400 hover:bg-pr-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Login to admin dashboard
                </button>
            </form>
        </div>
    </div>

    {{-- Reveal Password While Typing --}}
    <script>
        const pwField = document.getElementById('password');
        let typingTimer;

        pwField.addEventListener('input', function () {
            pwField.type = 'text'; // Show while typing

            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                pwField.type = 'password'; // Hide again
            }, 400);
        });
    </script>
@endsection
