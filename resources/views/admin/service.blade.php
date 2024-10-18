@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Pelayanan')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createServiceModal">
    Tambah Layanan
</button>

<div class="table-responsive text-center">
    <table class="table table-hover mt-4 fw-bold">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="fw-semibold ">
            <tr>
                <td></td>
                <td></td>
                <td>
                    <span><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editServiceModal">Edit</button></span>
                    <span><button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusModal">Hapus</button></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>



@endsection
@php
    $createModalName = 'createServiceModal';
    $editModalName = 'editServiceModal';  // ID modal
    $routeName = ''; // Nama route
@endphp


@section('createModalContent')

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label ">Nama Pelayanan</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1">
</div>
<div class="gambar-pelayanan mb-3 d-flex overflow-x-auto" style="white-space: nowrap;">
    <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="formFile1" class="form-label">Gambar</label>
        <img id="previewImage1" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="formFile1">
    </div>
    <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="formFile2" class="form-label">Contoh Perawatan</label>
        <img id="previewImage2" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="formFile2">
    </div>

    <div class="d-flex justify-content-center align-items-center"
        style="min-width: 200px; min-height:240px; cursor: pointer;" id="addNewField">
        <i class="bi bi-plus-square" style="font-size: 83px;"></i>
    </div>
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Informasi Pelayanan</label>
    <textarea class="form-control border-black" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>


<script>
    let counter = 3; // Start counter for new div IDs

    document.getElementById('addNewField').addEventListener('click', function () {
        const container = document.querySelector('.gambar-pelayanan');
        const newDiv = document.createElement('div');
        newDiv.classList.add('me-3', 'd-flex', 'flex-column', 'justify-content-between');     
        newDiv.style.minWidth = '300px';
        newDiv.style.minHeight = '240px';

        const newInputId = `formFile${counter}`;
        const newImgId = `previewImage${counter}`;

        newDiv.innerHTML = `
        <div style='min-height:38px; '></div>
        <img id="${newImgId}" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="${newInputId}" >
        `;

        // Append the new div to the container
        container.insertBefore(newDiv, document.getElementById('addNewField'));

        // Re-initialize image preview event listeners after adding new input
        initializeImagePreview();

        counter++;
    });
</script>
@endsection

@section('editModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label ">Nama Pelayanan</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1">
</div>
<div class="gambar-pelayanan mb-3 d-flex overflow-x-auto" style="white-space: nowrap;">
    <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="formFile1" class="form-label">Gambar</label>
        <img id="previewImage1" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="formFile1">
    </div>
    <!-- for each  -->
    <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="formFile2" class="form-label">Contoh Perawatan</label>
        <img id="previewImage2" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="formFile2">
    </div>
    <!-- end for each  -->
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Informasi Pelayanan</label>
    <textarea class="form-control border-black" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@endsection