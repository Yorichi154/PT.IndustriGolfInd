@extends('layouts.myapp')
@section('content')
    <main>
        <div class="bg-sec-100 ">
            {{-- hero --}}
            <div class="flex justify-center md:py-28 py-12 mx-auto max-w-screen-xl">
                <div class="flex  flex-col justify-center md:w-3/5  mx-12 md:ms-20 md:mx-0">
                    <h1 class=" md:text-start text-center  font-car font-bold text-gray-900 mb-8  md:text-7xl text-4xl ">
                        <span class="text-pr-400"> RENT GOLF CARS </span> EFFICIENT, QUICKLY, AND EASILY
                    </h1>
                    <div class="md:w-3/5 md:hidden  ">
                        <img loading="lazy" src="/images/mobilgolf 1.png" alt="home car">
                    </div>
                    <p class="text-justify md:mx-8 mx-0">Kami menyediakan layanan sewa mobil golf terpercaya, cepat, aman, dan nyaman untuk kebutuhan pribadi maupun bisnis Anda. Didukung oleh tim profesional, kami berkomitmen memberikan pengalaman transaksi yang mudah, nyaman, dan memuaskan bagi setiap pelanggan.</p>
                    <div class="flex justify-start mt-8 md:w-2/3 md:ms-0">
                        <a href="/cars">
                            <button class="bg-pr-400 p-2 border-2 border-white rounded-md text-white hover:bg-pr-500 w-32 md:me-12 md:mx-12 mx-7 font-bold ">GOLF CARS</button>
                        </a>
                        <a href="/contact_us">
                            <button class="border-2 border-pr-400 text-black w-32 p-2 rounded-md hover:bg-sec-400">CONTACT US</button>
                        </a>
                    </div>
                </div>
                <div class="md:w-3/5 hidden md:block  ">
                   <img src="/images/mobil.png" alt="home car" style="width: 576px; height: auto;">

                </div>
            </div>

            {{-- Cars Section --}}
            <div class="mx-auto max-w-screen-xl">
                <div class="flex align-middle justify-center">
                    <hr class=" mt-8 h-0.5 w-2/5 bg-pr-500">
                    <p class="my-2 mx-8  p-2 font-car font-bold text-pr-400 text-lg ">GOLF CARS</p>
                    <hr class=" mt-8 h-0.5 w-2/5 bg-pr-500">
                    <hr>
                </div>
                <div class="   md:mr-16 mr-4 mb-4 flex justify-end">
                    <a href="/cars">
                        <button class="border-2 border-pr-400 text-black w-16 p-1 rounded-md hover:bg-pr-400 hover:text-white">See All</button>
                    </a>
                </div>
            </div>

            <div class=" grid md:grid-cols-3  md:ps-4 justify-center p-2 gap-4 items-center mx-auto max-w-screen-xl ">
                @foreach ($cars as $car)
                    <div class="relative md:m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ route('car.reservation', ['car' => $car->id]) }}">
                            <img loading="lazy" class="object-cover" src="{{ $car->image }}" alt="product image" />
                        </a>
                        <div class="mt-4 px-5 pb-5">
                            <div>
                                <h5 class=" font-bold text-xl tracking-tight text-slate-900">{{ $car->brand }} {{ $car->model }} {{ $car->engine }}</h5>
                            </div>
                            <div class="mt-2 mb-5 flex items-center justify-between">
                                <p>
                                    <span class="text-3xl font-bold text-slate-900">{{ $car->price_per_day }}</span>
                                </p>
                            </div>
                            <a href="{{ route('car.reservation', ['car' => $car->id]) }}" class="flex items-center justify-center rounded-md bg-slate-900 hover:bg-pr-400 px-5 py-2.5 text-center text-sm font-medium text-white  focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg id="thisicon" class="mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <style>
                                        #thisicon {
                                            fill: #ffffff
                                        }
                                    </style>
                                    <path d="M184 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H96c-35.3 0-64 28.7-64 64v16 48V448c0 35.3 28.7 64 64 64H416c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H376V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H184V24zM80 192H432V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V192zm176 40c-13.3 0-24 10.7-24 24v48H184c-13.3 0-24 10.7-24 24s10.7 24 24 24h48v48c0 13.3 10.7 24 24 24s24-10.7 24-24V352h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V256c0-13.3-10.7-24-24-24z" />
                                </svg>
                                Reserve
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Our numbers section --}}
            <div class="mx-auto max-w-screen-xl mt-16 mb-32">
                <div>
                    <h2 class="text-center font-car text-3xl font-medium text-pr-400"> <span class=" text-gray-900">Our</span> Numbers</h2>
                </div>
                <div class="bg-gray-800 text-white  mt-6 rounded-md flex md:flex-row flex-col md:justify-evently items-center gap-6 md:gap-0  mx-16 max-w-screen-xl">
                    <div class="flex justify-around md:w-1/3 text-center my-4 h-16 align-middle md:border-b-0 md:border-r-2 border-b-2 pb-4 border-white">
                        <div class="flex flex-col justify-center">
                            <h3 class="font-car font-medium text-4xl">29</h3>
                            <p class="font-car  text-lg">Available Golf Cars</p>
                        </div>
                    </div>
                    <div class="flex justify-around md:w-1/3 text-center my-4 h-16 align-middle md:border-b-0 md:border-r-2 border-b-2 pb-4 border-white">
                        <div class="flex flex-col justify-center">
                            <h3 class="font-car font-medium text-4xl">2500 + </h3>
                            <p class="font-car  text-lg">Happy Customers</p>
                        </div>
                    </div>
                    <div class="flex justify-around md:w-1/3 text-center my-4 h-16 align-middle  border-b-2 pb-4 border-white md:border-b-0">
                        <div class="flex flex-col justify-center">
                            <h3 class="font-car font-medium text-4xl">1500 +</h3>
                            <p class="font-car  text-lg">Completed bookings</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Why us section  --}}
            <div class="mx-auto max-w-screen-xl ">
                <div>
                    <h2 class="text-center font-car text-3xl font-medium text-pr-400"> <span class=" text-gray-900">Mengapa</span> Memilih Kami? </h2>
                </div>
                <div class="mt-7 mb-16">
                    <p class="md:text-center text-xl text-justify mx-8 ">Kami menyediakan layanan penyewaan mobil golf yang praktis, aman, dan terpercaya. Dengan unit kendaraan yang selalu terawat dan harga yang kompetitif, kami siap memenuhi kebutuhan mobilitas Anda di area resort, lapangan golf, perumahan, hingga kawasan industri. Proses pemesanan mudah, dukungan pelanggan responsif, dan layanan ramah membuat pengalaman sewa Anda jadi lebih nyaman dan bebas repot. Kami hadir untuk memastikan setiap perjalanan Anda berjalan lancar dan menyenangkan.</p>
                </div>

                <div class=" grid md:grid-cols-3 md:p-12 p-4 gap-6 my-8 md:mx-auto mx-8 max-w-screen-xl border-[0.5px] border-gray-700 rounded-lg bg-white">
                    <div class="flex justify-center align-middle ">
                        <div class="bg-gray-800 p-3 rounded-lg mx-3 mb-6 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 512 512">
                                <style>
                                    svg {
                                        fill: #f49800
                                    }
                                </style>
                                <path d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-car font-bold text-gray-900 text-2xl">Customer Support</h3>
                            <p class="font-car text-gray-700 text-sm ">Kami berkomitmen untuk memberikan dukungan terbaik demi kenyamanan dan kepuasan Anda.</p>
                        </div>
                    </div>
                    <div class="flex justify-center align-middle ">
                        <div class="bg-gray-800 p-3 rounded-lg mx-3 mb-6 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 512 512">
                                <style>
                                    svg {
                                        fill: #f49b00
                                    }
                                </style>
                                <path d="M128 40c0-22.1 17.9-40 40-40s40 17.9 40 40V188.2c8.5-7.6 19.7-12.2 32-12.2c20.6 0 38.2 13 45 31.2c8.8-9.3 21.2-15.2 35-15.2c25.3 0 46 19.5 47.9 44.3c8.5-7.7 19.8-12.3 32.1-12.3c26.5 0 48 21.5 48 48v48 16 48c0 70.7-57.3 128-128 128l-16 0H240l-.1 0h-5.2c-5 0-9.9-.3-14.7-1c-55.3-5.6-106.2-34-140-79L8 336c-13.3-17.7-9.7-42.7 8-56s42.7-9.7 56 8l56 74.7V40zM240 304c0-8.8-7.2-16-16-16s-16 7.2-16 16v96c0 8.8 7.2 16 16 16s16-7.2 16-16V304zm48-16c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16s16-7.2 16-16V304c0-8.8-7.2-16-16-16zm80 16c0-8.8-7.2-16-16-16s-16 7.2-16 16v96c0 8.8 7.2 16 16 16s16-7.2 16-16V304z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-car font-bold text-gray-900 text-2xl">Quality Vehicle</h3>
                            <p class="font-car text-gray-700 text-sm "> Mobil-mobil terawat dan siap pakai, demi kenyamanan dan keamanan perjalanan Anda.</p>
                        </div>
                    </div>
                    <div class="flex justify-center align-middle ">
                        <div class="bg-gray-800 p-3 rounded-lg mx-3 mb-6 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 576 512">
                                <style>
                                    svg {
                                        fill: #f49b00
                                    }
                                </style>
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm67-267-67 67-27-27c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l43 43c9.4 9.4 24.6 9.4 33.9 0l83-83c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-car font-bold text-gray-900 text-2xl">Free Cancelation</h3>
                            <p class="font-car text-gray-700 text-sm "> Pembatalan gratis untuk kenyamanan Anda, serta fleksibel sesuai kebutuhan Anda..</p>
                        </div>
                    </div>
                    <div class="flex justify-center align-middle ">
                        <div class="bg-gray-800 p-3 rounded-lg mx-3 mb-6 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 576 512">
                                <style>
                                    svg {
                                        fill: #f49b00
                                    }
                                </style>
                               <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm67-267-67 67-27-27c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l43 43c9.4 9.4 24.6 9.4 33.9 0l83-83c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-car font-bold text-gray-900 text-2xl">Best Price</h3>
                            <p class="font-car text-gray-700 text-sm ">Harga bersaing dengan kualitas unggulan itu adalah janji kami untuk Anda.</p>
                        </div>
                    </div>
                    <div class="flex justify-center align-middle ">
                        <div class="bg-gray-800 p-3 rounded-lg mx-3 mb-6 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 576 512">
                                <style>
                                    svg {
                                        fill: #f49b00
                                    }
                                </style>
                                <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V285.7l-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-car font-bold text-gray-900 text-2xl">Easy Process</h3>
                            <p class="font-car text-gray-700 text-sm ">Mudah dari pemesanan hingga ambil sewa mobil tanpa ribet.</p>
                        </div>
                    </div>
                    <div class="flex justify-center align-middle">
                        <div class="bg-gray-800 p-3 rounded-lg mx-3 mb-6 mt-2">
                             <svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 512 512" style="fill:#f49b00;">
                                <style>
                                    svg {
                                        fill: #f49b00
                                    }
                                </style>
                                <path d="M472.7 189.1c-1.9-66.3-59.4-119.8-125.7-119.8-51.1 0-94.4 32.7-113.6 78.8-5.7-1.8-11.8-2.8-18.1-2.8-38.7 0-70 31.3-70 70 0 6.2 0.9 12.2 2.7 17.9C44.1 234.7 0 283.8 0 344c0 44.2 35.8 80 80 80h352c44.2 0 80-35.8 80-80 0-39.2-29.3-71.8-67.3-78.9zM255.1 334.8V220.3l-48 48-22.6-22.6 72-72 72 72-22.6 22.6-48-48v114.5h-11.8z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-car font-bold text-gray-900 text-2xl">Digital Services</h3>
                            <p class="font-car text-gray-700 text-sm ">Nikmati layanan digital untuk kemudahan maksimal sehingga  lebih efisien dan nyaman.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Orange car section --}}
            <div class=" relative -bottom-[1px] mx-auto max-w-screen-xl  ">
                <img loading="lazy" src="/images/home.png" alt="" class="w-full">
            </div>
        </div>
    </main>
@endsection