@extends('layout.admin')

@section('page-title', 'Dokter')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createDoctorModal">
    Tambah Dokter
</button>
<div class="table-responsive text-center">
    @if ($dokter->count() > 0)
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
            @foreach($dokter as $service)
                <tr>
                    <td><img src="{{ asset('storage/'.$service->foto) }}" alt="Foto Dokter" width="100px"></td>
                    <td>{{ $service->nama }}</td>
                    <td>{{ $service->jadwal }}</td>
                    <td>
                        <span><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editDoctorModal{{ $service->id }}">Edit</button></span>
                        <span><button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#hapusModal{{ $service->id }}">Hapus</button></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection
@php
    $createModalName = 'createDoctorModal';
    $editModalName = 'editDoctorModal';  // ID modal
    $routeName = 'admin.dashboard'; // Nama route
@endphp

@section('formAction')
{{route('admin.doctor.store')}}
@endsection

@section('createModalContent')
<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control border-black" id="nama" name="nama">
</div>
<div class="mb-3">
    <label for="gambar" class="form-label">Foto</label>
    <img id="previewImage1" src="" alt="Preview Image " style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="gambar" name="gambar">
</div>
<div>
    <h5>Jadwal</h5>
    <div class="d-flex">
        <div class="d-block w-100">
            <p>Pilih Hari</p>
            <div class="d-flex overflow-x-auto w-100" >
                <div class="form-check form-check-inline">
                    <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="senin" id="flexCheckSenin">
                    <label class="form-check-label" for="Senin">
                        Senin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="selasa" id="flexCheckSelasa">
                    <label class="form-check-label" for="Selasa">
                        Selasa
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="rabu" id="flexCheckRabu">
                    <label class="form-check-label" for="Rabu">
                        Rabu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="kamis" id="flexCheckKamis">
                    <label class="form-check-label" for="Kamis">
                        Kamis
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="jumat" id="flexCheckJumat">
                    <label class="form-check-label" for="Jumat">
                        Jumat
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="sabtu" id="flexCheckSabtu">
                    <label class="form-check-label" for="Sabtu">
                        Sabtu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="minggu" id="flexCheckMinggu">
                    <label class="form-check-label" for="Minggu">
                        Minggu
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('editModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nama</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile1" class="form-label">Foto</label>
    <img id="previewImage1" src="" alt="Preview Image " style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="formFile1">
</div>
<div>
    <h5>Jadwal</h5>
    <div class="d-flex">
        <div class="d-block w-100">
            <p>Pilih Hari</p>
            <div class="d-flex overflow-x-auto w-100" >
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input-doctor" type="checkbox" value="Senin" id="flexCheckSenin">
                    <label class="form-check-label" for="flexCheckSenin">
                        Senin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input-doctor" type="checkbox" value="Selasa" id="flexCheckSelasa">
                    <label class="form-check-label" for="flexCheckSelasa">
                        Selasa
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input-doctor" type="checkbox" value="Rabu" id="flexCheckRabu">
                    <label class="form-check-label" for="flexCheckRabu">
                        Rabu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input-doctor" type="checkbox" value="Kamis" id="flexCheckKamis">
                    <label class="form-check-label" for="flexCheckKamis">
                        Kamis
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input-doctor" type="checkbox" value="Jumat" id="flexCheckJumat">
                    <label class="form-check-label" for="flexCheckJumat">
                        Jumat
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input-doctor" type="checkbox" value="Sabtu" id="flexCheckSabtu">
                    <label class="form-check-label" for="flexCheckSabtu">
                        Sabtu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input-doctor" type="checkbox" value="Minggu" id="flexCheckMinggu">
                    <label class="form-check-label" for="flexCheckMinggu">
                        Minggu
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection