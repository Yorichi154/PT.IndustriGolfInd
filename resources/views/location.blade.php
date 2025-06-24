@extends('layouts.myapp')
@section('content')
    <div class="mx-auto max-w-screen-xl ">
        <div class="flex md:flex-row flex-col justify-around  items-center px-6 pt-6">
            <div class="md:m-12 p-6 md:w-1/2">
                <img loading="lazy" src="/images/logos/logoKP.png" alt="shop image">
            </div>
            <div class="w-full md:w-1/2 space-y-4 text-gray-700">
                <h2 class="text-2xl font-semibold text-gray-800">Selamat Datang</h2>
                <p>
                    Selamat datang di toko penyewaan mobil golf kami yang berlokasi strategis di pusat kota. Terletak di lokasi utama, tempat kami mudah diakses dan menjadi pusat ideal untuk segala kebutuhan sewa mobil Anda.
                </p>
                <p>
                    Lokasi kami dekat dengan berbagai moda transportasi utama seperti bandara, stasiun kereta, dan terminal bus. Tim kami yang ramah siap menyambut Anda dengan layanan cepat dan profesional.
                </p>
            </div>

        </div>
        <div class="flex md:flex-row flex-col justify-around  items-center px-6 pt-6">

            <div class="md:m-12 p-6 md:w-1/2 md:order-last ">
                <img loading="lazy" src="/images/logos/logoKP.png" alt="shop image">
            </div>

           <div class="w-full md:w-1/2 space-y-4 text-gray-700">
                <h2 class="text-2xl font-semibold text-gray-800">Lingkungan Sekitar</h2>
                <p>
                    Terletak di lingkungan yang ramai, lokasi kami dikelilingi oleh restoran, kafe, dan pusat perbelanjaan. Sangat cocok untuk Anda yang ingin bersantai atau berbelanja sebelum atau setelah menyewa mobil golf.
                </p>
                <p>
                    Kami juga menyediakan area parkir yang luas, sehingga Anda dapat memarkir kendaraan pribadi dengan mudah dan langsung melanjutkan perjalanan menggunakan mobil sewaan kami.
                </p>
            </div>
        </div>
        <div class=" p-3 mb-8">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1984.8465336040917!2d106.82003999999999!3d-6.325316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed4351a4b61b%3A0xf3cc81a2dd5baa0f!2sPT.INDUSTRI%20GOLF%20INDONESIA!5e0!3m2!1sid!2sid!4v1718278944060!5m2!1sid!2sid" width="100%" height="300" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
@endsection
