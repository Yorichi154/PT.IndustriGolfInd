@extends('layouts.myapp')

@section('content')
    <div class="grid place-items-center h-screen">
        <div class="border p-5 md:w-1/2 w-4/5 bg-sec-100 -mt-48">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Your email
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="bg-pr-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pr-500 focus:border-pr-500 block w-full p-2.5"
                        placeholder="Enter your email" required autofocus>
                    @error('email')
                        <span>
                            <strong class="text-red-500">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit"
                    class="text-white bg-pr-400 hover:bg-pr-600 focus:ring-4 focus:outline-none focus:ring-pr-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Send Password Reset Link
                </button>

                <div class="mt-4">
                    <a class="text-sm text-gray-600 hover:text-blue-600 hover:cursor-pointer" href="{{ route('login') }}">
                        Back to login
                    </a>
                </div>
            </form>

            @if (session('status'))
                <div class="mt-4 text-green-600 font-medium">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
@endsection
