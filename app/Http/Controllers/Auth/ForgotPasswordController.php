<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

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
        return view();
    }

    public function verify_token($token)
    {

        $user = User::where('reset_token', $token)
            ->where('reset_token_expires_at', '>', now())
            ->first();

        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Token tidak valid atau telah kadaluarsa.');
        }

        return view('admin.forgotPassword', compact('token'));
    }

    public function showLinkRequestForm()
    {
        return view('admin.Forgot_Password'); // Ensure you have the appropriate view
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('reset_token', $request->token)
            ->where('token_expires_at', '>', now())
            ->first();

        if (!$user) {
            return back()->with('error', 'Token tidak valid atau sudah kedaluwarsa.');
        }

        $user->update([
            'password' => bcrypt($request->password),
            'reset_token' => null,
            'token_expires_at' => null,
        ]);

        return redirect()->route('login')->with('success', 'Password berhasil diubah.');
    }


    /**
     * Handle a request to send a password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate email input
        $request->validate(['email' => 'required|email']);

        // Send password reset link
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        $token = Str::random(64);
        $user->update([
            'reset_token' => $token,
            'reset_token_expires_at' => now()->addMinutes(30),
        ]);

        Mail::send('email.form_email', ['token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
    }
}
