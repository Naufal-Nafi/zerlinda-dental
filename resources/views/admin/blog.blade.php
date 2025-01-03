@extends('layout.admin')

@section('page-title', 'Article Blog')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createBlogModal">
    Tambah Artikel
</button>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="table-responsive text-center">
    @if ($artikels->count() > 0)
        <table class="table table-hover mt-4 fw-bold">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="fw-semibold">
                @foreach ($artikels as $artikel)
                    <tr>
                        <td><img src="{{ asset('storage/' . $artikel->url_media) }}" alt="asas" width="250"></td>
                        <td>{{ $artikel->judul }}</td>
                        <td style="display: none; ">{{ $artikel->konten }}</td>
                        <td>
                            <span><button type="button" id="editbtn{{$artikel->getKey()}}" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#editBlogModal" data-id="{{$artikel->id_artikel}}"
                                    data-judul="{{ $artikel->judul }}" data-gambar="{{ $artikel->url_media }}"
                                    data-konten="{{ $artikel->konten }}">
                                    Edit
                                </button></span>
                            <span><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal"
                                    data-id="{{'/blog/destroy/' . $artikel->getKey()}}">Hapus</button></span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade text-start" id="editBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-light-pink" style="padding: 50px;">
                    <form id="editForm" action="{{ route('admin.blog.update', $artikel->id_artikel) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body text-20" id="editModalContent">
                            <div class="mb-3 ">
                                <label for="exampleFormControlInput1" class="form-label ">Judul</label>
                                <input type="text" class="form-control border-black" id="EditFormJudul" name="judul">
                            </div>
                            <div class="mb-3">
                                <label for="formFile2" class="form-label">Gambar</label>
                                <img id="previewImage" src="" alt="Preview Image"
                                    style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                                <input class="form-control border-black image-input" type="file" id="gambar_edit" accept="image/*"
                                    name="gambar">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
                                <textarea class="form-control border-black" id="EditFormKonten" rows="3"
                                    name="konten"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn text-white bg-pink">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <p>Belum ada artikel</p>
    @endif
</div>

<div class="text-center">
    {{ $artikels->links() }}
</div>

<script>
    $(document).ready(function () {
        // Event listener untuk tombol edit
        $(document).on('click', 'button[id^="editbtn"]', function () {
            // Ambil data dari atribut tombol edit
            var idArtikel = $(this).data('id');
            var judul = $(this).data('judul');
            var gambar = $(this).data('gambar');
            var konten = $(this).data('konten');

            // Set nilai-nilai data ke dalam form di modal
            $('#EditFormJudul').val(judul);
            $('#EditFormKonten').val(konten);

            // Tampilkan gambar preview jika ada
            if (gambar) {
                $('#previewImage').attr('src', "{{ asset('storage') }}/" + gambar).show();

            } else {
                $('#previewImage').hide();
            }

            // Update action form dengan id artikel yang sesuai
            var updateAction = $('#editForm').attr('action').replace(/\d+$/, idArtikel);
            $('#editForm').attr('action', updateAction);
        });

        // Reset modal saat ditutup
        $('#editBlogModal').on('hidden.bs.modal', function () {
            $('#editForm')[0].reset();
            $('#previewImage2').hide().attr('src', '');
        });
    });

</script>
@endsection

@php
    $createModalName = 'createBlogModal';
    $editModalName = 'editBlogModal'; // ID modal
    $routeName = 'admin.dashboard'; // Nama route
@endphp


@section('formAction')
{{route('admin.blog.store')}}
@endsection


@section('createModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label ">Judul</label>
    <input type="text" class="form-control border-black" id="CreateForm" name="judul" required>
</div>
<div class="mb-3">
    <label for="gambar1" class="form-label">Gambar</label>
    <img id="previewImage1" src="" alt="Preview Image"
        style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="formFile1" name="gambar" id="gambar_create" accept="image/*" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
    <textarea class="form-control border-black" id="exampleFormControlTextarea1" rows="3" name="konten" required></textarea>
</div>
@endsection