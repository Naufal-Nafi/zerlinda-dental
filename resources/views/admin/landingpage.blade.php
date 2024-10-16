@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Landing Page')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLandingPageModal">
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
        <tbody class="fw-semibold">
            <tr class="bg-light-pink">
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
    <label for="formFile" class="form-label">Upload Gambar</label>
    <input class="form-control" type="file" id="formFile">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
@endsection

