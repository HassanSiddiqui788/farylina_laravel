<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('users.pages.auth.register');
    }

    public function loginPage()
    {
        return view('users.pages.auth.login');
    }
    public function forgotPage(Request $request)
    {
        return view('users.pages.auth.forgot');
    }

    public function resetPasswordPage($token)
    {
        return view('users.pages.auth.reset', compact('token'));
    }

    // auth code of register
    public function register(request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ]);

        if (!$validatedData) {
            return back()->with('error', 'please fill all required data');
        }

        // Create a new product instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        // Auth::login($user);
        $user->save();
        // Optionally, you can return a response or redirect to a different page
        return redirect()->route('login.get')->with('success', 'Register user successfully');
    }

    public function login(request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        // dd($request->all());
        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            if ($user) {
                return redirect()->route('index.get')->with('success', 'Admin login Successfully !!!');
            } else {
                return back()->with('message', 'Record not matched with data !!!');
            }
        }
    }

    public function forgot(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = mt_rand(100000, 999999);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);


        Mail::send('emails.forgot-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Link');
        });
        // dd($request->all());
        // Alert::success('Success', 'Successfully send the reset password link on your email please check to verify !!!');
        return back();
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required | email | exists:users',
            'password' => 'required | min:8 | same:password',
            'cpassword' => 'required'
        ]);
        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();
        if (!$updatePassword) {
            return back()->with('info', 'Something went wrong , password not updated !!!');
        }
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        return redirect()->route('login.get')->with('success', 'Successfully update password !!!');
    }
}
