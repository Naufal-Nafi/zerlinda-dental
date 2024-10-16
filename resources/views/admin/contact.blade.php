@extends('layout.admin')

@section('title', 'Ganti Kontak')

@section('page-title', 'Ganti Kontak')

@section('content')
<div class="table-responsive text-center">
    <table class="table table-hover mt-4 fw-bold">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Kontak</th>
                <th>Nama Akun</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="fw-semibold">
            <tr class="bg-light-pink">
                <td><i class="bi bi-envelope"></i></td> 
                <td style="color : #fff;">Gmail</td>
                <td>zerlindadentalcare@gmail.com</td>
                <td>https://</td>
                <td><button class="btn btn-primary">Edit</button></td>
            </tr>
            <tr class="bg-light-pink">
                <td><i class="bi bi-instagram"></i></td>
                <td>Instagram</td>
                <td>zerlindadentalcare</td>
                <td>https://</td>
                <td><button class="btn btn-primary">Edit</button></td>
            </tr>
            <tr class="bg-light-pink">
                <td><i class="bi bi-facebook"></i></td>
                <td>Facebook</td>
                <td>Zerlinda Dental Care</td>
                <td>https://</td>
                <td><button class="btn btn-primary">Edit</button></td>
            </tr>
            <tr class="bg-light-pink">
                <td><i class="bi bi-tiktok"></i></td>
                <td>TikTok</td>
                <td>zerlindadentalcare</td>
                <td>https://</td>
                <td><button class="btn btn-primary">Edit</button></td>
            </tr>
            <tr class="bg-light-pink">
                <td><i class="bi bi-whatsapp"></i></td>
                <td>WhatsApp</td>
                <td>08999999999999</td>
                <td>https://</td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@section('editModalName','editContactModal')