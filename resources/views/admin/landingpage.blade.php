@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Landing Page')

@section('content')
<div class="table-responsive">
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
                <td><button class="btn btn-danger">Hapus</button></td>
            </tr>            
        </tbody>
    </table>
</div>
@endsection