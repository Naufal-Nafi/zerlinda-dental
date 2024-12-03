@extends('layout.admin')

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
            @foreach ($contact as $service)
            @if ($service->jenis_kontak == "Gmail")
            <tr>
                <td><i class="bi bi-envelope"></i></td> 
                <td>{{ $service->jenis_kontak }}</td>
                <td>{{ $service->nama_akun }}</td>
                <td>{{ $service->url }}</td>
                <td><button id="editbtn" type="button" class="btn btn-primary" data-contact="Gmail" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            @endif
            @if ($service->jenis_kontak == "Instagram")
            <tr>
                <td><i class="bi bi-instagram"></i></td>
                <td>{{ $service->jenis_kontak }}</td>
                <td>{{ $service->nama_akun }}</td>
                <td>{{ $service->url }}</td>
                <td><button id="editbtn" type="button" class="btn btn-primary" data-contact="Instagram" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            @endif
            @if ($service->jenis_kontak == "Facebook")
            <tr>
                <td><i class="bi bi-facebook"></i></td>
                <td>{{ $service->jenis_kontak }}</td>
                <td>{{ $service->nama_akun }}</td>
                <td>{{ $service->url }}</td>
                <td><button id="editbtn" type="button" class="btn btn-primary" data-contact="Facebook" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            @endif
            @if ($service->jenis_kontak == "Tiktok")
            <tr>
                <td><i class="bi bi-tiktok"></i></td>
                <td>{{ $service->jenis_kontak }}</td>
                <td>{{ $service->nama_akun }}</td>
                <td>{{ $service->url }}</td>
                <td><button id="editbtn" type="button" class="btn btn-primary" data-contact="TikTok" data-bs-toggle="modal" data-bs-target="#editContactModal" data-id="">Edit</button></td>
            </tr>
            @endif
            @if ($service->jenis_kontak == "WhatsApp")
            <tr>
                <td><i class="bi bi-whatsapp"></i></td>
                <td>{{ $service->jenis_kontak }}</td>
                <td>{{ $service->nama_akun }}</td>
                <td>{{ $service->url }}</td>
                <td><button id="editbtn" type="button" class="btn btn-primary" data-contact="WhatsApp" data-bs-toggle="modal" data-bs-target="#editContactModal">Edit</button></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@php
    $editModalName = 'editContactModal';  // ID modal
    $routeName = 'adnmin.dashboard'; // Nama route
@endphp

@section('editModalContent')
<div>
    <h2 class="mb-3 fw-bold"></h2>
</div>
<div class="mb-3">
    <label for="nama_akun" class="form-label">Nama Akun</label>
    <input type="text" class="form-control border-black" id="edtnamaakun" name="nama_akun">
</div>
<div class="mb-3">
    <label for="url" class="form-label">Link</label>
    <input type="text" class="form-control border-black" id="edtlink" name="url">
</div>

<!-- <script>
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
</script> -->

@endsection

@section('script')
<script>

    function openEditModal(id) {
        var editbtn = document.getElementById("editbtn"+id);
        var row = editbtn.closest('tr');
        var data = row.getElementsByTagName('td');
        console.log("{{route('admin.contact.edit',parameters: "" )}}/"+id);
        

        document.getElementById("editForm").action = "{{route('admin.contact.edit',"" )}}/"+id;
        document.getElementById("edtnamaakun").value = data[1].innerText;
        document.getElementById("edtlink").value = data[2].innerText;
    }
</script>
@endsection