@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Pelayanan')

@section('content')
<div class="table-responsive">
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
                    <span><button class="btn btn-primary">Edit</button></span>
                    <span><button class="btn btn-danger">Hapus</button></span>
                </td>
            </tr>            
        </tbody>
    </table>
</div>
@endsection