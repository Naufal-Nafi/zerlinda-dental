@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Article Blog')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createBlogModal">
    Tambah Artikel
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
        <tbody class="fw-semibold">
            <tr>
                <td></td>
                <td></td>
                <td>
                    <span><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editBlogModal">Edit</button></span>
                    <span><button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusModal">Hapus</button></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection

@php
    $createModalName = 'createBlogModal';
    $editModalName = 'editBlogModal';  // ID modal
    $routeName = ''; // Nama route
@endphp




@section('createModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label ">Judul</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile1" class="form-label">Gambar</label>
    <img id="previewImage1" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="formFile1">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
    <textarea class="form-control border-black" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@endsection



@section('editModalContent')
<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label ">Judul</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile2" class="form-label">Gambar</label>
    <img id="previewImage2" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="formFile2">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
    <textarea class="form-control border-black" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@endsection