<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class AddNewAdminController extends Controller
{
    use RegistersUsers;

    /**
     * Handle the registration request for a new admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function register(Request $request)
    {
        // Validate incoming request
        $this->validator($request->all())->validate();

        // Create new admin user
        $user = $this->create($request->all());

        // Handle avatar upload or avatar selection
        $this->handleAvatar($request, $user);

        // Trigger registration event
        event(new Registered($user));

        // Redirect after successful registration
        return $this->registered($request, $user)
            ?: redirect()->route('users');
    }

    /**
     * Validate the registration request data.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new admin user instance.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'admin',
        ]);
    }

    /**
     * Handle avatar upload or use default avatar option.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function handleAvatar(Request $request, User $user)
    {
        if ($request->hasFile('avatar_choose') && $request->file('avatar_choose')->isValid()) {
            $filename = Str::slug($request->name) . '-' . Str::random(10) . '.' . $request->file('avatar_choose')->extension();
            $path = $request->file('avatar_choose')->storeAs('images/avatars', $filename);
            $user->avatar = '/' . $path;
        } else {
            $user->avatar = $request->avatar_option;
        }

        $user->save();
    }
}
