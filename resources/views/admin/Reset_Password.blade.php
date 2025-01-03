@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Ubah Password')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-sm p-5" style="max-width: 400px; width: 100%;">
        <h1 class="text-center mb-4 fw-bold">Ubah Password</h1>
        <!-- <form action="post">            
            <div class="mb-3">        
                <input type="password" class="form-control" placeholder="Current Password" name="" id=""> <!-- required -->
            
            <!-- <button type="submit" class="btn btn-login w-100 mt-3">Login</button> -->
            <!-- <a class='btn btn-login w-100' type="submit" href="{{ route('admin.login') }}">Masukkan</a>
        </form> -->
        
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <!-- Password Baru -->
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password Baru" required>
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru" required>
            </div>

            <button type="submit" class="btn bg-pink text-white w-100 mt-3">Ubah Password</button>
            
        </form>
    </div>
</div>
@endsection