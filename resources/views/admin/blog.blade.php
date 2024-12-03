@extends('layout.admin')

@section('page-title', 'Article Blog')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createBlogModal">
    Tambah Artikel
</button>

<div class="table-responsive text-center">
    @if ($artikel->count() > 0)
    <table class="table table-hover mt-4 fw-bold">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="fw-semibold">
            @foreach ($artikel as $service)
            
            <tr>
                @if (isset($service->galeri))
                <td><img src="{{ asset('storage/public/images/galeri_artikel'.$service->gambar) }}" alt="" width="50"></td>
                @else
                <td></td>
                @endif
                <td>{{ $service->judul }}</td>
                <td style="display: none; ">{{ $service->konten }}</td>
                <td>
                    <span><button type="button" id="editbtn{{$service->getKey()}}" class="btn btn-primary" data-bs-toggle="modal" onclick="openEditModal({{$service->getKey()}})"
                            data-bs-target="#editBlogModal" data-id="{{'/blog/update/'.$service->getKey()}}">Edit</button></span>
                    <span><button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusModal" data-id="{{'/blog/destroy/'.$service->getKey()}}">Hapus</button></span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Belum ada artikel</p>
    @endif
</div>


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
        <input type="text" class="form-control border-black" id="CreateForm" name="judul">
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <img id="previewImage1" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
        <input class="form-control border-black image-input" type="file" name="gambar" id="gambar">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
        <textarea class="form-control border-black" id="exampleFormControlTextarea1" rows="3" name="konten"></textarea>
    </div>
@endsection



@section('editModalContent')
<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label ">Judul</label>
    <input type="text" class="form-control border-black" id="EditFormJudul" name="judul">
</div>
<div class="mb-3">
    <label for="formFile2" class="form-label">Gambar</label>
    <img id="previewImage2" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="gambar_edit" name="gambar">
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
    <textarea class="form-control border-black" id="EditFormKonten" rows="3" name="konten"></textarea>
</div>



@endsection
@section('script')
<script>

    function openEditModal(id) {
        var editbtn = document.getElementById("editbtn"+id);
        var row = editbtn.closest('tr');
        var data = row.getElementsByTagName('td');
        console.log("{{route('admin.blog.update',"" )}}/"+id);
        

        document.getElementById("editForm").action = "{{route('admin.blog.update',"" )}}/"+id;
        
        document.getElementById("EditFormJudul").value = data[1].innerText;
        document.getElementById("EditFormKonten").value = data[2].innerText;
    }



</script>
@endsection