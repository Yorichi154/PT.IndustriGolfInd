<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\clientCarController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\addNewAdminController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminAuth\LoginController as AdminLoginController;
use App\Http\Controllers\carSearchController;
use App\Http\Controllers\ContactController;
use App\Models\User;
use App\Models\Car;
use App\Models\Reservation;

// ------------------- Guest Routes --------------------------------------- //
Route::get('/', function () {
    $cars = Car::take(6)->where('status', '=', 'available')->get();
    return view('home', compact('cars'));
})->name('home');

Route::get('/cars', [clientCarController::class, 'index'])->name('cars');
Route::get('/cars/search', [carSearchController::class, 'search'])->name('carSearch');

Route::get('location', fn() => view('location'))->name('location');
Route::get('contact_us', fn() => view('contact_us'))->name('contact_us');
Route::post('contact_us', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');

Route::get('/privacy_policy', fn() => view('Privacy_Policy'))->name('privacy_policy');
Route::get('/terms_conditions', fn() => view('Terms_Conditions'))->name('terms_conditions');

// ------------------- Admin Login Routes ---------------------------------- //
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::redirect('/admin', 'admin/login');

// ------------------- User Login (Custom View) ---------------------------- //
Route::get('/login/user', function () {
    return view('auth.user_login');
})->name('login.user');

Auth::routes();

// ------------------- Admin Routes ---------------------------------------- //
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', adminDashboardController::class)->name('adminDashboard');
    Route::resource('cars', CarController::class);

    Route::get('/users', function () {
        $admins = User::where('role', 'admin')->get();
        $clients = User::where('role', 'client')->paginate(5);
        return view('admin.users', compact('admins', 'clients'));
    })->name('users');

    Route::get('/updatePayment/{reservation}', [ReservationController::class, 'editPayment'])->name('editPayment');
    Route::put('/updatePayment/{reservation}', [ReservationController::class, 'updatePayment'])->name('updatePayment');

    Route::get('/updateReservation/{reservation}', [ReservationController::class, 'editStatus'])->name('editStatus');
    Route::put('/updateReservation/{reservation}', [ReservationController::class, 'updateStatus'])->name('updateStatus');

    Route::get('/addAdmin', [usersController::class, 'create'])->name('addAdmin');
    Route::post('/addAdmin', [addNewAdminController::class, 'register'])->name('addNewAdmin');

    Route::get('/userDetails/{user}', [usersController::class, 'show'])->name('userDetails');
});

// ------------------- Client Routes ---------------------------------------- //
Route::middleware(['auth', 'restrictAdminAccess'])->group(function () {

    // Pemesanan Mobil
    Route::get('/reservations/{car}', [ReservationController::class, 'create'])->name('car.reservation');
    Route::post('/reservations/{car}', [ReservationController::class, 'store'])->name('car.reservationStore');

    // Lihat Semua Reservasi Pengguna
    Route::get('/reservations', function () {
        $reservations = Reservation::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('clientReservations', compact('reservations'));
    })->name('clientReservation');
    Route::get('/invoice/{reservation}', [invoiceController::class, 'invoice'])->name('invoice');

    // ✅ Langkah 1: Pilih metode pembayaran
    Route::get('/payment/{reservationId}/method', [PaymentController::class, 'selectMethod'])->name('payment.method');
    // ✅ Langkah 2: Tampilkan form pembayaran setelah memilih metode
    Route::post('/payment/{reservationId}/form', [PaymentController::class, 'showForm'])->name('payment.show');
    // ✅ Langkah 3: Proses pembayaran
    Route::post('/payment/{reservationId}/process', [PaymentController::class, 'process'])->name('payment.process');
    // ✅ Invoice
    Route::get('/invoice/{reservation}', [invoiceController::class, 'invoice'])->name('invoice');
});
// Route ke halaman thank you
Route::get('/thankyou', fn() => view('thankyou'))->name('contact.thankyou');
Route::get('/contact-submit', fn() => view('contact-submit'))->name('contact.submit');
Route::get('/thankyou/{reservation}', function ($reservationId) {
    $reservation = \App\Models\Reservation::with('car', 'user')->findOrFail($reservationId);
    return view('thankyou', compact('reservation'));
})->name('thankyou');
