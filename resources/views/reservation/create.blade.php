@extends('layouts.myapp')
@section('content')

<div class="mx-auto max-w-screen-xl bg-white rounded-md p-6 m-8">
    <div class="flex justify-between md:flex-row flex-col">
        {{-- -------------------------------------------- left -------------------------------------------- --}}
        <div class="md:w-2/3 md:border-r border-gray-800 p-2">
            <h2 class="ms-4 max-w-full font-car md:text-6xl text-4xl">{{ $car->brand }} {{ $car->model }} {{ $car->engine }}</h2>

            <div class="flex items-end mt-8 ms-4">
                <h3 class="font-car text-gray-500 text-2xl">Price:</h3>
                <p>
                    <span class="text-3xl font-bold text-pr-400 ms-3 me-1 border border-pr-400 p-2 rounded-md">
                        Rp {{ $car->price_per_day }}.000
                    </span>
                </p>
            </div>

            <div class="flex items-center justify-around mt-10 me-10">
                <div class="w-1/5 md:w-1/3 h-[0.25px] bg-gray-500"></div>
                <p>Order Informations</p>
                <div class="w-1/5 md:w-1/3 h-[0.25px] bg-gray-500"></div>
            </div>

            <div class="px-6 md:me-8">
                <form id="reservation_form" action="{{ route('car.reservationStore', ['car' => $car->id]) }}" method="POST">
                    @csrf
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="full-name" class="block text-sm font-medium text-gray-900">Full Name</label>
                            <input type="text" name="full-name" id="full-name" value="{{ $user->name }}"
                                class="mt-2 w-full rounded-md border py-1.5 px-3 shadow-sm focus:ring-2 focus:ring-pr-400">
                            @error('full-name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                            <input type="text" name="email" id="email" value="{{ $user->email }}"
                                class="mt-2 w-full rounded-md border py-1.5 px-3 shadow-sm focus:ring-2 focus:ring-pr-400">
                            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-full">
                            <label for="reservation" class="block text-sm font-medium text-gray-900">Reservation Dates</label>
                            <x-flatpickr range id="laravel-flatpickr" name="reservation_dates" class="w-full rounded-md" placeholder="Reservation Dates" />
                        </div>
                    </div>

                    {{-- Tombol Order Now Desktop --}}
                    <div class="mt-12 md:block hidden">
                        <button type="submit"
                            class="text-white bg-pr-400 p-3 w-full rounded-lg font-bold hover:bg-black shadow-xl hover:shadow-none">
                            Order Now
                        </button>
                    </div>

                    {{-- Tombol Order Now Mobile --}}
                    <div id="mobile_submit_button" class="mt-12 w-full md:hidden">
                        <button type="submit"
                            class="text-white bg-pr-400 p-3 w-full rounded-lg font-bold hover:bg-black shadow-xl hover:shadow-none">
                            Order Now
                        </button>
                    </div>
                </form>
            </div>
        </div>


        {{-- -------------------------------------------- right -------------------------------------------- --}}
        <div class="md:w-1/3 flex flex-col justify-start items-center">
            <div class="relative mx-3 mt-3 flex h-[200px] w-3/4 overflow-hidden rounded-xl shadow-lg">
                <img loading="lazy" class="h-full w-full object-cover" src="{{ $car->image }}" alt="product image" />
            </div>
            <p class="ms-4 max-w-full font-car text-xl mt-3 md:block hidden">
                {{ $car->brand }} {{ $car->model }} {{ $car->engine }}
            </p>

            <div class="w-full mt-8 ms-8">
                <p id="duration" class="font-car text-gray-600 text-lg ms-2">Estimated Duration:
                    <span class="mx-2 font-car text-md font-medium text-gray-700 border border-pr-400 p-2 rounded-md">-- days</span>
                </p>
            </div>

            <div class="w-full mt-8 ms-8">
                <p id="total-price" class="font-car text-gray-600 text-lg ms-2">Estimated Price: Rp
                    <span class="mx-2 font-car text-md font-medium text-gray-700 border border-pr-400 p-2 rounded-md">-- IDR</span>
                </p>
            </div>
        </div>
    </div>

    {{-- Error Toast --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: "{{ session('error') }}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    @endif
</div>

{{-- JavaScript untuk menghitung harga --}}
<script>
    $(document).ready(function () {
        const flatpickrElement = document.getElementById('laravel-flatpickr');

        if (flatpickrElement && flatpickrElement._flatpickr) {
            flatpickrElement._flatpickr.config.onChange.push(function (selectedDates) {
                if (selectedDates.length === 2) {
                    const start = selectedDates[0];
                    const end = selectedDates[1];
                    const duration = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                    const pricePerDay = {{ $car->price_per_day }};
                    const total = duration * pricePerDay * 1000;

                    $('#duration span').text(duration + ' days');
                    $('#total-price span').text(total.toLocaleString() + ' IDR');
                } else {
                    $('#duration span').text('-- days');
                    $('#total-price span').text('-- IDR');
                }
            });
        }
    });
</script>

@endsection
