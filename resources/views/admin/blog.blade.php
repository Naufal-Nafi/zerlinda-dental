@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Article Blog')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBlogModal">
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
            <tr class="bg-light-pink">
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

@section('createModalName', 'createBlogModal')
@section('editModalName', 'editBlogModal')

@section('createModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Judul</label>
    <input type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile" class="form-label">Gambar</label>
    <input class="form-control" type="file" id="formFile">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@endsection

@section('editModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Judul</label>
    <input type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile" class="form-label">Gambar</label>
    <input class="form-control" type="file" id="formFile">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@endsection