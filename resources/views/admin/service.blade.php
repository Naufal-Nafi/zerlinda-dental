@extends('layout.admin')

@section('page-title', 'Pelayanan')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createServiceModal">
    Tambah Layanan
</button>

<!-- Table to display services -->

<div class="table-responsive text-center">
    @if ($services->count() > 0)
        <table class="table table-hover mt-4 fw-bold">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="fw-semibold">
                @foreach($services as $service)   
                    <tr>
                        <td><img src="{{ asset('storage/public/' . $service->galeri_layanan->first()->url_media) }}" alt=""
                                width="250"></td>
                        <td>{{ $service->nama_layanan }}</td>
                        <td>{{ $service->jenis_layanan }}</td>

                        <!-- tombol edit/delete -->
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editServiceModal" data-id="{{ $service->id_layanan }}"
                                data-nama="{{ $service->nama_layanan }}" data-deskripsi="{{ $service->deskripsi }}"
                                data-tipe="{{ $service->jenis_layanan }}"
                                data-gambar="{{ asset('storage/public/' . $service->galeri_layanan->first()->url_media) }}"
                                data-gambar-lainnya='@json($service->galeri_layanan->skip(1)->map(fn($galeri) => ['url' => asset("storage/public/$galeri->url_media"), "id" => $galeri->id_galeri]))'
                                data-gambar-lainnya-path="{{ implode(',', $service->galeri_layanan->skip(1)->pluck('url_media')->map(fn($url) => str_replace('public/', '', $url))->toArray()) }}">
                                Edit
                            </button>


                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal"
                                data-id="{{'/service/destroy/' . $service->id_layanan}}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade text-start" id="editServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-light-pink" style="padding: 50px;">
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div id="tesParent" class="modal-body text-20" id="editModalContent">
                            <div class="mb-3 d-flex">
                                <div class="form-check me-5">
                                    <input class="form-check-input" id="edttipeAnak" type="radio" name="tipe_layanan"
                                        value="anak">
                                    <label class="form-check-label" for="edttipeAnak">
                                        Anak
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="edttipeDewasa" type="radio" name="tipe_layanan"
                                        value="dewasa">
                                    <label class="form-check-label" for="edttipeDewasa">
                                        Dewasa
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_nama_layanan" class="form-label ">Nama Pelayanan</label>
                                <input type="text" class="form-control border-black" id="edit_nama_layanan"
                                    name="nama_pelayanan" required maxlength="100" value="{{$service->nama_layanan}}">
                            </div>

                            <div class="gambar-pelayanan mb-3 d-flex overflow-x-auto" style="white-space: nowrap;">
                                <!-- diisi js  -->
                            </div>

                            <div id="containerEdit" class=" mb-3 d-flex overflow-x-auto" style="white-space: nowrap;">

                                <div class="me-4 d-flex flex-column justify-content-between"
                                    style="min-width: 300px; min-height:240px;">
                                    <label for="gambar2" class="form-label">Contoh Perawatan</label>
                                    <img id="previewImage2" src="" alt="Preview Image"
                                        style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                                    <input class="form-control border-black image-input" type="file" id="gambar2"
                                        name="gambar[]" accept="image/*">
                                </div>

                                <div id="addNewFieldEdit" class="d-flex justify-content-center align-items-center"
                                    style="min-width: 200px; min-height:240px; cursor: pointer;">
                                    <i class="bi bi-plus-square" style="font-size: 83px;"></i>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="edit_deskripsi" class="form-label">Informasi Pelayanan</label>
                                <textarea class="form-control border-black" id="edit_deskripsi" name="deskripsi" rows="3"
                                    required></textarea>
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
    <p>Tidak ada layanan.</p>
    @endif
</div>

<script>
    let counterEdit = 2; // Start counterEdit for new div IDs

    $('#addNewFieldEdit').on('click', function () {
        const containerEdit = $('#containerEdit');
        const addNewFieldEdit = $('#addNewFieldEdit');


        const newDivEdit = $(`
            <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height: 240px;">
                <div style="min-height:38px;"></div>
                <label for="gambar${counterEdit}" class="form-label">Gambar ${counterEdit}</label>
                <img id="previewImage${counterEdit}" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                <input class="form-control border-black image-input" type="file" id="gambar${counterEdit}" name="gambar[]" accept="image/*">
            </div>
        `);

        // Append the new div before the "addNewField" button            
        newDivEdit.insertBefore(addNewFieldEdit);

        // Re-initialize image preview event listeners after adding new input
        initializeImagePreview(`gambar${counterEdit}`, `previewImage${counterEdit}`);

        counterEdit++;
    });
</script>

<script>
    $(document).ready(function () {
        // Tangkap semua tombol edit
        const editButtons = $('[data-bs-target="#editServiceModal"]');
        console.log(document.getElementById('editForm').childElementCount);
        console.log(document.getElementById('editForm').innerHTML);
        console.log(document.getElementById('tesParent').parentElement);

        setTimeout(() => {
            console.log(document.getElementById('editForm').childElementCount);
        }, 500);

        $('#editServiceModal').on('shown.bs.modal', function () {
            console.log(document.getElementById('editForm').childElementCount);
        });



        // Tambahkan event listener pada masing-masing tombol
        editButtons.on('click', function () {
            // Ambil data dari atribut tombol
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const deskripsi = $(this).data('deskripsi');
            const tipe = $(this).data('tipe');
            const gambar = $(this).data('gambar'); // Gambar utama
            const gambarLainnya = $(this).data('gambar-lainnya');
            const gambarLainnyaPath = $(this).data('gambar-lainnya-path').split(',');

            console.log(gambarLainnya);
            console.log(gambarLainnyaPath);
            console.log(`Gambar utama: ${gambar}`);
            console.log(`Gambar lainnya: ${gambarLainnya}`);

            // Isi form modal
            $('#edit_nama_layanan').val(nama);
            $('#edit_deskripsi').val(deskripsi);

            // Pilih tipe layanan
            if (tipe === 'anak') {
                $('#edttipeAnak').prop('checked', true);
            } else if (tipe === 'dewasa') {
                $('#edttipeDewasa').prop('checked', true);
            }

            // Ambil kontainer gambar
            const gambarContainer = $('.gambar-pelayanan');
            gambarContainer.html(''); // Reset kontainer gambar lainnya            

            // Tambahkan gambar pertama (gambar utama)
            const gambarPertamaDiv = `
        <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height: 240px;">
            <label for="edit_gambar" class="form-label">Gambar Utama</label>
            <img src="${gambar}" alt="Preview Image" style="max-width: 276px; height: auto; margin-bottom: 10px;">
            <input class="form-control border-black image-input" type="file" id="edit_gambar" name="gambar_1" accept="image/*">            
        </div>
    `;
            gambarContainer.append(gambarPertamaDiv);

            // Tambahkan gambar lainnya
            $.each(gambarLainnya, function (index, gambar) {
                const gambarDiv = `
            <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height: 240px;">
                <label for="edit_gambar_lain_${index}" class="form-label">Contoh Pelayanan ${index}</label>
                <img src="${gambar.url}" alt="Preview Image" style="max-width: 276px; height: auto; margin-bottom: 10px;">                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="gambar_hapus[]" value="${gambar.id}" id="hapus_gambar_${index}">
                    <label class="form-check-label" for="hapus_gambar_${index}">Hapus</label>
                </div>
            </div>
        `;
                gambarContainer.append(gambarDiv);
            });

            // Set form action (opsional jika URL-nya dinamis)
            $('#editForm').attr('action', `/service/update/${id}`);
        });

    });
</script>

@endsection

@php
    $createModalName = 'createServiceModal';    
@endphp

@section('formAction')
{{route('admin.service.store')}}
@endsection


@section('createModalContent')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mb-3">
    <label class="form-label">Tipe Layanan</label>
    <div class="d-flex gap-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe_layanan" value="anak" id="tipeAnak" re>
            <label class="form-check-label" for="tipeAnak">
                Anak
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe_layanan" value="dewasa" id="tipeDewasa">
            <label class="form-check-label" for="tipeDewasa">
                Dewasa
            </label>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label ">Nama Pelayanan</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1" name="nama_layanan" required>
</div>

<div id="container" class=" mb-3 d-flex overflow-x-auto" style="white-space: nowrap;">
    <div class="me-4 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="gambar1" class="form-label">Gambar</label>
        <img id="previewImage1" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="gambar1" name="gambar[]" required
            accept="image/*">
    </div>

    <div class="me-4 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="gambar2" class="form-label">Contoh Perawatan</label>
        <img id="previewImage2" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="gambar2" name="gambar[]" required
            accept="image/*">
    </div>

    <div id="addNewField" class="d-flex justify-content-center align-items-center"
        style="min-width: 200px; min-height:240px; cursor: pointer;">
        <i class="bi bi-plus-square" style="font-size: 83px;"></i>
    </div>

</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">Informasi Pelayanan</label>
    <textarea class="form-control border-black" id="deskripsi" name="deskripsi" rows="3" required></textarea>
</div>


<script>
    let counter = 3; // Start counter for new div IDs

    $('#addNewField').on('click', function () {
        const container = $('#container');
        const addNewField = $('#addNewField');

        const newDiv = $(`
            <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height: 240px;">
                <div style="min-height:38px;"></div>
                <label for="gambar${counter}" class="form-label">Gambar ${counter}</label>
                <img id="previewImage${counter}" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                <input class="form-control border-black image-input" type="file" id="gambar${counter}" name="gambar[]" accept="image/*" required>
            </div>
        `);


        // Append the new div before the "addNewField" button        
        newDiv.insertBefore(addNewField);

        // Re-initialize image preview event listeners after adding new input
        initializeImagePreview(`gambar${counter}`, `previewImage${counter}`);

        counter++;
    });
</script>

@endsection