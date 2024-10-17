@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Landing Page')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createLandingPageModal">
    Tambah Gambar
</button>
<div class="table-responsive text-center">
    <table class="table table-hover mt-4 fw-bold">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="fw-semibold table-danger">
            <tr>
                <td></td>
                <td></td>
                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">Hapus</button></td>
            </tr>            
        </tbody>
    </table>
</div>

@endsection
@section('createModalName','createLandingPageModal')


@section('createModalContent')
<div class="mb-3">
    <label for="formFileLandingPage1" class="form-label">Upload Gambar</label>
    <img id="previewImageLandingPage1" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="formFileLandingPage1">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
    <textarea class="form-control border-black h-50" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@endsection

