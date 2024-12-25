@extends('layout.admin')

@section('page-title', 'Ganti Kontak')

@section('content')
<div class="table-responsive text-center">
    <table class="table table-hover mt-4 fw-bold">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Kontak</th>
                <th>Nama Akun</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="fw-semibold">
            @foreach ($contact as $contact)
            <tr>
                <td>
                    @if ($contact->jenis_kontak == "Gmail")
                    <i class="bi bi-envelope"></i>
                    @elseif ($contact->jenis_kontak == "Instagram")
                    <i class="bi bi-instagram"></i>
                    @elseif ($contact->jenis_kontak == "Facebook")
                    <i class="bi bi-facebook"></i>
                    @elseif ($contact->jenis_kontak == "Tiktok")
                    <i class="bi bi-tiktok"></i>
                    @elseif ($contact->jenis_kontak == "WhatsApp")
                    <i class="bi bi-whatsapp"></i>
                    @endif
                </td>
                <td>{{ $contact->jenis_kontak }}</td>
                <td>{{ $contact->nama_akun }}</td>
                <td>{{ $contact->url }}</td>
                <td>
                    <button 
                        id="editbtn{{ $contact->id_kontak }}" 
                        type="button" 
                        class="btn btn-primary" 
                        data-id="{{ $contact->id_kontak }}" 
                        data-nama-akun="{{ $contact->nama_akun }}" 
                        data-url="{{ $contact->url }}" 
                        data-jenis="{{$contact->jenis_kontak}}"
                        data-bs-toggle="modal" 
                        data-bs-target="#editContactModal">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-light-pink" style="padding: 50px;">
            <form id="editForm"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-20" id="editModalContent">
                    <div>
                        <h2 class="mb-3 fw-bold" id="modalTitle">Edit Kontak</h2>
                    </div>
                    <div class="mb-3">
                        <label for="nama_akun" class="form-label">Nama Akun</label>
                        <input type="text" class="form-control border-black" id="edtnamaakun" name="nama_akun">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Link</label>
                        <input type="text" class="form-control border-black" id="edtlink" name="url">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white bg-pink" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editContactModal = document.getElementById("editContactModal");
        const editForm = document.getElementById("editForm");
        const namaAkunInput = document.getElementById("edtnamaakun");
        const urlInput = document.getElementById("edtlink");
        const modalTitle = document.getElementById("modalTitle");

        // Event listener untuk modal
        editContactModal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget; // Tombol yang membuka modal
            const id = button.getAttribute("data-id");
            const namaAkun = button.getAttribute("data-nama-akun");
            const url = button.getAttribute("data-url");
            const jenisKontak = button.getAttribute("data-jenis");

            // Update form action dan isi field
            editForm.action = `/admin/contact/edit/${id}`;
            namaAkunInput.value = namaAkun;
            urlInput.value = url;
            modalTitle.textContent = `Kontak ${jenisKontak}`;
        });
    });
</script>

@endsection
