@extends('layouts.myapp')

@section('content')
<div class="mt-16">
    <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-center text-gray-900 font-car">Contact Us</h2>
    <p class="mb-8 font-light text-center text-gray-500 font-car lg:mb-16 dark:text-gray-400 sm:text-xl">
        Jika Anda mengalami kendala teknis, ingin memberikan masukan fitur beta, atau membutuhkan informasi paket Bisnis, silakan hubungi kami.
    </p>
</div>

<div class="flex md:flex-row flex-col justify-between max-w-screen-xl md:px-16 px-8 mx-auto gap-12">
    <!-- Contact Form -->
    <div class="md:w-1/2 order-last md:order-first mb-12">
        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8" id="contact-form">
            @csrf
            <div class="flex justify-between">
                <div class="w-full mr-5">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Nama Depan" required
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                        dark:focus:border-primary-500 dark:shadow-sm-light" />
                </div>
                <div class="w-full">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Nama Belakang" required
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                        dark:focus:border-primary-500 dark:shadow-sm-light" />
                </div>
            </div>

            <div class="flex justify-between">
                <div class="w-full mr-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukan Email Anda" required
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                        dark:focus:border-primary-500 dark:shadow-sm-light" />
                </div>
                <div class="w-full">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone Number</label>
                    <input type="tel" id="phone" name="phone_number" placeholder="+628123123123" required
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                        dark:focus:border-primary-500 dark:shadow-sm-light" />
                </div>
            </div>

            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                <select name="subject" id="subject"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 
                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                    dark:focus:border-primary-500 dark:shadow-sm-light">
                    <option value="0" disabled selected>Select subject</option>
                    <option value="Reservation">Reservation</option>
                    <option value="Payment">Payment</option>
                    <option value="Golf cars problem">Golf cars problem</option>
                    <option value="Cancellation">Cancellation</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                <textarea id="message" name="massege" rows="6" placeholder="Leave a comment..."
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm 
                    border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 
                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 
                    dark:focus:border-primary-500"></textarea>
            </div>

            <button type="submit"
                class="p-3 mb-16 font-bold border rounded-md border-pr-400 text-pr-400 hover:text-white hover:bg-pr-400">
                Send Message
            </button>
        </form>
    </div>

    <!-- Contact Info -->
    <div class="grid mx-auto text-center gap-4">
        <!-- Company Info -->
        <div>
            <div class="w-20 p-6 mx-auto mb-3 bg-gray-200 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 64 64" fill="#60646c">
                    <rect x="12" y="20" width="40" height="32" stroke="#60646c" stroke-width="2" fill="none" />
                    <rect x="20" y="28" width="8" height="8" fill="#60646c" />
                    <rect x="36" y="28" width="8" height="8" fill="#60646c" />
                    <rect x="20" y="40" width="8" height="8" fill="#60646c" />
                    <rect x="36" y="40" width="8" height="8" fill="#60646c" />
                    <polygon points="12,20 32,4 52,20" stroke="#60646c" stroke-width="2" fill="none" />
                </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-800 font-car">Company Information:</h2>
            <p class="text-sm font-light text-gray-700 font-car">PT. INDUSTRIGOLFINDONESIA</p>
            <p class="text-sm font-light text-gray-700 font-car">Indonesia</p>
        </div>

        <!-- Address -->
        <div>
            <div class="w-20 p-6 mx-auto mb-3 bg-gray-200 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 24 24" fill="#60646c">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/>
                </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-800 font-car">Address:</h2>
            <p class="text-sm font-light text-gray-700 font-car">Jagakarsa RT 013/005 Kelurahan Jagakarsa, Kecamatan Jagakarsa, Jakarta Selatan</p>
            <p class="text-sm font-light text-gray-700 font-car">12620</p>
        </div>

        <!-- Phone -->
        <div>
            <div class="w-20 p-6 mx-auto mb-3 bg-gray-200 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 24 24" fill="#60646c">
                    <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21 11.05 11.05 0 003.47.56 1 1 0 011 1v3.5a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.5a1 1 0 011 1 11.05 11.05 0 00.56 3.47 1 1 0 01-.21 1.11l-2.23 2.21z"/>
                </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-800 font-car">Call us:</h2>
            <p class="text-sm font-light text-gray-700 font-car">Ingin berbicara langsung dengan tim kami? Silakan hubungi +6287773333109</p>
        </div>

        <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8 md:hidden" />
    </div>
</div>
@endsection
