<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;
use Storage;
use Auth;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store()
    {
        $user = User::make($this->validateRequest());
        $user->password = Hash::make($user->password);
        $user->email_verified_at = now();
        $user->save();
        if (request()->has('image')) {
            $this->storeImage($user);
        }
        $this->guard()->login($user);
        return view('home');
    }

    protected function update()
    {
        $user = auth()->user();
        $validator = Validator::make(request()->all(), [
            'image' => 'required|file|image|max:5000',
        ]);
        if ($validator->fails()) {
            request()->session()->put('error', $validator->errors()->first());
            return view('home');
        } else {
            $this->storeImage($user);
            return view('home');
        }
    }

    private function storeImage($user)
    {
        if (isset($user->avatar)) {
            Storage::delete('public/' . $user->avatar);
        }
        $user->update([
            'avatar' => request()->image->store('uploads/user', 'public'),
        ]);
        $image = Image::make('storage/app/public/' . $user->avatar)->fit(64, 64);
        $image->save();
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
