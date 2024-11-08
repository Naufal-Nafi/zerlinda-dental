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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="fw-semibold">
                @foreach($services as $service)
                    <tr>
                    @if (isset($service->galeri))
                    
                    <td><img src="{{ asset($service->galeri->url_media) }}" alt="{{ $service->nama_layanan }}" width="50"></td>
                    @else
                    <td></td>
                    @endif
                        <td>{{ $service->nama_layanan }}</td>
                        <!-- tombol edit/delete -->
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editServiceModal-{{ $service->id }}">
                            Edit
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteServiceModal-{{ $service->id }}">
                            Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada layanan.</p>
    @endif
</div>

@endsection

@php
    $createModalName = 'createServiceModal';
    $editModalName = 'editServiceModal';  // ID modal
    $routeName = 'admin.dashboard'; // Nama route
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
                <input class="form-check-input" type="radio" name="tipe_layanan" value="dewasa" id="tipeDewasa" >
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

    <div class="gambar-pelayanan mb-3 d-flex overflow-x-auto" style="white-space: nowrap;">
        <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
            <label for="gambar1" class="form-label">Gambar</label>
            <img id="previewImage1" src="" alt="Preview Image" 
                style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
            <input class="form-control border-black image-input" type="file" id="gambar1" name="gambar[]" required accept="image/*">
        </div>

        <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
            <label for="gambar2" class="form-label">Contoh Perawatan</label>
            <img id="previewImage2" src="" alt="Preview Image"
                style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
            <input class="form-control border-black image-input" type="file" id="gambar2" name="gambar[]" required accept="image/*">
        </div>

        <div class="d-flex justify-content-center align-items-center"
            style="min-width: 200px; min-height:240px; cursor: pointer;" id="addNewField">
            <i class="bi bi-plus-square" style="font-size: 83px;"></i>
        </div>

    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Informasi Pelayanan</label>
        <textarea class="form-control border-black" id="deskripsi" name="deskripsi" rows="3" required></textarea>
    </div>
    
    



<script>
        let counter = 3; // Start counter for new div IDs

    document.getElementById('addNewField').addEventListener('click', function () {
        const container = document.querySelector('.gambar-pelayanan');
        const newDiv = document.createElement('div');
        newDiv.classList.add('me-3', 'd-flex', 'flex-column', 'justify-content-between');
        newDiv.style.minWidth = '300px';
        newDiv.style.minHeight = '240px';

        const newInputId = `gambar${counter}`;
        const newImgId = `previewImage${counter}`;

        newDiv.innerHTML = `
        // <div style='min-height:38px; '></div>
        <label for="${newInputId}" class="form-label">Gambar ${counter}</label>
        <img id="${newImgId}" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="${newInputId}" name="${newInputId}" accept="image/*" required >
        `;

        // Append the new div to the container
        container.insertBefore(newDiv, document.getElementById('addNewField'));

        // Re-initialize image preview event listeners after adding new input
        initializeImagePreview(newInputId, newImgId );

        counter++;
    });
</script>
@endsection

@section('editModalContent')
<div class="mb-3 d-flex">
    <div class="form-check me-5">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">
            Dewasa
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
        <label class="form-check-label" for="flexRadioDefault2">
            Anak-anak
        </label>
    </div>
</div>
<div class="mb-3">
    <label for="edit_nama_layanan" class="form-label ">Nama Pelayanan</label>
    <input type="text" class="form-control border-black" id="edit_nama_layanan" name="nama_layanan" required maxlength="100">
</div>

<div class="gambar-pelayanan mb-3 d-flex overflow-x-auto" style="white-space: nowrap;">
    <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="edit_gambar" class="form-label">Gambar</label>
        <img id="edit_previewImage" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="edit_gambar" name="gambar" accept="image/*">
    </div>

    <!-- for each  -->
    <div class="me-3 d-flex flex-column justify-content-between" style="min-width: 300px; min-height:240px;">
        <label for="formFile2" class="form-label">Contoh Perawatan</label>
        <img id="previewImage2" src="" alt="Preview Image"
            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" id="formFile2">
    </div>

    <!-- end for each  -->
</div>

<div class="mb-3">
    <label for="edit_deskripsi" class="form-label">Informasi Pelayanan</label>
    <textarea class="form-control border-black" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
</div>

</form>

<script>
    document.getElementById('edit_gambar').addEventListener('change', function () {
        const preview = document.getElementById('edit_previewImage');
        const file = e.target.files[0];
        const reader = new FileReader();
        
        reader.onload =function(e){
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        if(file) {
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection