@extends('layouts.myapp')

@section('content')
    <div class="grid place-items-center min-h-screen">
        <div class="border p-6 md:w-1/2 w-4/5 bg-sec-100 my-12">
            <h2 class="text-xl font-semibold text-center mb-6 text-gray-800">Reset Password</h2>

            @if (session('status'))
                <div class="p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-400 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address :</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5"
                        placeholder="example@email.com" required autofocus>
                    @error('email')
                        <span class="text-sm text-red-500">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit"
                    class="text-white bg-pr-400 hover:bg-pr-600 focus:ring-4 focus:outline-none focus:ring-pr-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-pr-600 dark:hover:bg-pr-700 dark:focus:ring-pr-800">
                    Send Password Reset Link
                </button>

                <div class="mt-4 text-center text-sm text-gray-600">
                    Remember your password? <a class="font-medium hover:text-pr-400" href="{{ route('login') }}">Login here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
