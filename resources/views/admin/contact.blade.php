@extends('layout.admin')

@section('title', 'Ganti Kontak')

@section('page-title', 'Ganti Kontak')

@section('content')
<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th>Logo</th>
            <th>Kontak</th>
            <th>Nama Akun</th>
            <th>Link</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-light-pink">
            <td><i class="bi bi-envelope"></i></td>
            <td>Gmail</td>
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
            <td><button class="btn btn-primary">Edit</button></td>
        </tr>
    </tbody>
</table>
@endsection