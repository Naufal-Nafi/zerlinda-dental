@extends('layout.admin')

@section('page-title', 'Landing Page')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createLandingPageModal">
    Tambah Gambar
</button>
<div class="table-responsive text-center">
    @if ($landingpages->count() > 0)
    <table class="table table-hover mt-4 fw-bold">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @foreach($landingpages as $landingpage)
        <tbody class="fw-semibold">
            <tr>
                <td><img src="{{ asset($landingpage->url_media) }}" alt="{{ $landingpage->keterangan }}" width="250"></td>
                <td>{{ $landingpage->keterangan }}</td>
                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{'/landingpage/destroy/'.$landingpage->getKey()}}">Hapus</button></td>
            </tr>            
        </tbody>
        @endforeach
    </table>
    @else
    <p>Tidak ada data.</p>
    @endif
</div>

@endsection
@php
    $createModalName = 'createLandingPageModal';
    $editModalName = '';  // ID modal
    $routeName = 'admin.dashboard'; // Nama route
@endphp

@section('formAction')
{{route('admin.landingpage.store')}}
@endsection

@section('createModalContent')
<div class="mb-3">
    <label for="judul" class="form-label">Upload Gambar</label>
    <img id="previewImageLandingPage1" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="image" name="image">
</div>
<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea class="form-control border-black h-50" id="keterangan" name="keterangan" rows="3"></textarea>
</div>
@endsection

