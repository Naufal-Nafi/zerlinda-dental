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
            <tr>
                <td><i class="bi bi-envelope"></i></td> 
                <td>Gmail</td>
                <td>zerlindadentalcare@gmail.com</td>
                <td>https://</td>
                <td><button type="button" class="btn btn-primary" data-contact="Gmail" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            <tr>
                <td><i class="bi bi-instagram"></i></td>
                <td>Instagram</td>
                <td>zerlindadentalcare</td>
                <td>https://</td>
                <td><button type="button" class="btn btn-primary" data-contact="Instagram" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            <tr>
                <td><i class="bi bi-facebook"></i></td>
                <td>Facebook</td>
                <td>Zerlinda Dental Care</td>
                <td>https://</td>
                <td><button type="button" class="btn btn-primary" data-contact="Facebook" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            <tr>
                <td><i class="bi bi-tiktok"></i></td>
                <td>TikTok</td>
                <td>zerlindadentalcare</td>
                <td>https://</td>
                <td><button type="button" class="btn btn-primary" data-contact="TikTok" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            <tr>
                <td><i class="bi bi-whatsapp"></i></td>
                <td>WhatsApp</td>
                <td>08999999999999</td>
                <td>https://</td>
                <td><button type="button" class="btn btn-primary" data-contact="WhatsApp" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@php
    $editModalName = 'editContactModal';  // ID modal
    $routeName = ''; // Nama route
@endphp

@section('editModalContent')
<div>
    <h2 class="mb-3 fw-bold"></h2>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nama Akun</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Link</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput2">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var editContactModal = document.getElementById('editContactModal');
    editContactModal.addEventListener('show.bs.modal', function (event) {
        // Tombol yang dipencet
        var button = event.relatedTarget;
        // Ambil data-contact dari tombol
        var contactName = button.getAttribute('data-contact');
        // Ambil elemen <h1> di dalam modal dan ubah teksnya
        var modalTitle = editContactModal.querySelector('h2');
        modalTitle.textContent = contactName;
    });
});
</script>

@endsection