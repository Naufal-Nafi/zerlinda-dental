@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dokter')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDoctorModal">
    Tambah Dokter
</button>
<div class="table-responsive text-center">
    <table class="table table-hover mt-4 fw-bold">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="fw-semibold">
            <tr class="bg-light-pink">
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <span><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editDoctorModal">Edit</button></span>
                    <span><button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusModal">Hapus</button></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
@section('createModalName', 'createDoctorModal')
@section('editModalName', 'editDoctorModal')



@section('createModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nama</label>
    <input type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile" class="form-label">Foto</label>
    <input class="form-control" type="file" id="formFile">
</div>
<div>
    <h5>Jadwal</h5>
    <div class="d-flex">
        <div class="d-block">
            <p>Pilih Hari</p>
            <div clasa="d-flex">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Senin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Selasa
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Rabu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Kamis
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Jumat
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Sabtu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Minggu
                    </label>
                </div>
            </div>
        </div>
        <div class="mx-3">
            <label for="exampleFormControlInput1" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jam Akhir</label>
            <input type="time" class="form-control" id="exampleFormControlInput1">
        </div>
    </div>
</div>

@endsection

@section('editModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nama</label>
    <input type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile" class="form-label">Foto</label>
    <input class="form-control" type="file" id="formFile">
</div>
<div>
    <h5>Jadwal</h5>
    <div class="d-flex">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Hari</label>
            <input type="day" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mx-3">
            <label for="exampleFormControlInput1" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jam Akhir</label>
            <input type="time" class="form-control" id="exampleFormControlInput1">
        </div>
    </div>
</div>
@endsection