<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


use App\Models\User; 

class PasswordController extends Controller
{
    /**
     * Show the form for changing the password.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.password'); // Form ubah password
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

     public function validateCurrentPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
        ]);

        

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        return redirect()->route('admin.Reset_Password');
    }
     /**
     * Show the form for resetting the password.
     *
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        return view('admin.Reset_Password');
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
        'password' => 'required|string|confirmed',
    ]);

    
    // Ambil user yang sedang login
    
    // Perbarui password
    $userId = Auth::user()->id;
    $user = User::findOrFail(id: $userId);
    $user->password = Hash::make(value: $request->password);
    $user->save();
    dd($user);

    return redirect()->route('admin.dashboard')->with('status', 'Password berhasil diperbarui');
}

}
