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
        <tbody class="fw-semibold">
            <tr class="bg-light-pink">
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
@section('createModalName', 'createServiceModal')
@section('editModalName', 'editServiceModal')
