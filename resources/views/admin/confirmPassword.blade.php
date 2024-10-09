@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Ubah Password')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-sm p-5" style="max-width: 400px; width: 100%;">
        <h1 class="text-center mb-4 fw-bold">Ubah Password</h1>
        <form action="post">
            <div class="mb-3">                
                <input type="email" class="form-control" placeholder="New Password" name="" id=""> <!-- required -->
            </div>
            <div class="mb-3">        
                <input type="password" class="form-control" placeholder="Confirm New Password" name="" id=""> <!-- required -->
            </div>
            <!-- <button type="submit" class="btn btn-login w-100 mt-3">Login</button> -->
            <a class='btn btn-login w-100' type="submit" href="{{ route('admin.login') }}">Ubah Password</a>
        </form>
    </div>
</div>
@endsection