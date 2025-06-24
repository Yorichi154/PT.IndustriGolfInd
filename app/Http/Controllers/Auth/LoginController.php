<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return route('adminDashboard');
        }

        return route('clientReservation'); // atau dashboard user lainnya
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
