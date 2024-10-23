<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\User; // Perbaiki namespace model User

class PasswordController extends Controller
{
    /**
     * Show the form for changing the password.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.Reset_password'); // Form ubah password
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
{
    // Validasi input
    $request->validate([
        // ... validasi lainnya
        'new_password' => [
            'required',
            'string',
            'confirmed',
            function ($attribute, $value, $fail) use ($request) {
                if (Hash::check($value, Auth::user()->password)) {
                    $fail('The new password cannot be the same as your current password.');
                }
            },
        ],
    ]);

    $user = User::find(Auth::id());

    // Periksa apakah password saat ini sesuai
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password saat ini salah']);
    }

    // Cek apakah password baru dan konfirmasi password cocok
    if ($request->new_password !== $request->new_password_confirmation) {
        return back()->withErrors(['new_password_confirmation' => 'Konfirmasi password tidak sesuai dengan password baru']);
    }

    // Update password
    $user->password = Hash::make($request->new_password);
    $user->save();

    // Menambahkan log (opsional)
    Log::info('Password changed for user: ' . $user->email);

    return redirect()->route('admin.dashboard')->with('status', 'Password berhasil diperbarui');
}

}
