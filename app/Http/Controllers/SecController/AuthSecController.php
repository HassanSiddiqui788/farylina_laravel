<?php

namespace App\Http\Controllers\SecController;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthSecController extends Controller
{
    public function registersecPage()
    {
        return view('users.pages.auth.register');
    }

    public function loginsecPage()
    {
        return view('users.pages.auth.login');
    }
    public function forgotsecPage()
    {
        return view('users.pages.auth.forgot');
    }
    public function resetsecpassword($token)
    {
        return view('users.pages.auth.reset', compact('token'));
    }


    public function registersec(request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ]);

        if (!$validatedData) {
            return back()->with("error", 'please fill all required data');
        }
        // it define a user table
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        // Auth::login($user);
        $user->save();
        return redirect()->route('loginsec.get')->with('success', 'Register user successfully');
    }

    public function loginsec(request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            if ($user) {
                return redirect()->route('index.get')->with('success', 'Admin login Successfully !!!');
            } else {
                return back()->with('message', 'Record not matched with data !!!');
            }
        }
    }

    public function forgotsec(request $request)
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

        mail::send('emails.forgot-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Link');
        });
        return back();
    }

    public function resetsec(request $request)
    {
        $request->validate([
            'email' => 'required |email | exists:users',
            'password' => 'required | min:8 | same:password',
            'cpassword' => 'required'
        ]);
        $updatedPassword = DB::table("password_reset_tokens")
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();
        if (!$updatedPassword) {
            return back()->with('info', 'Something went wrong , password not updated !!!');
        }
        $user = user::where('email', $request->email)
        // dd($request->all());
        ->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        return redirect()->route('loginsec.get')->with('success', 'Successfully update password !!!');
    }
}
