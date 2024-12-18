<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $token = Str::random(5);
        return view("admin.forgotPassword", compact('token'));
    }

    public function passwordform()
    {
        $user = User::all();
        return view("admin.newPassword", compact('user'));
    }

    public function verify_token(Request $request)
    {
        $token = $request->input('token');

        $user = User::where('reset_token', $token)
            ->where('token_expires_at', '>=', now())
            ->first();

        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Token tidak valid atau telah kadaluarsa.');
        } else {
            return redirect()->route('admin.password.reset.form')->with('success', 'Token valid.');
        }
    }

    

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed',
        ]);

        $userId = Auth::user()->id;
        $user = User::findOrFail(id: $userId);
        dd($user);
        

        $user->update([
            'password' => bcrypt($request->password),
            'reset_token' => null,
            'token_expires_at' => null,
        ]);
        

        return redirect()->view('admin.login')->with('success', 'Password berhasil diubah.');
    }


    /**
     * Handle a request to send a password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail()
    {
        
        // Send password reset link
        $user = User::first();

        $token = Str::random(5);
        $user->update([
            'reset_token' => $token,
            'token_expires_at' => now()->addMinutes(30),
        ]);
        


        Mail::send('email.form_email', ['token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Password');
        });

        return Redirect()->route('admin.password.request')-> with('success', 'Link reset password telah dikirim ke email Anda.');
    }
}
