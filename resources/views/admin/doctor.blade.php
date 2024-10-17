@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dokter')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createDoctorModal">
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
            <tr>
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
        <div class="d-block">
            <p>Pilih Hari</p>
            <div class="d-flex hari">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Senin" id="flexCheckSenin">
                    <label class="form-check-label" for="flexCheckSenin">
                        Senin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Selasa" id="flexCheckSelasa">
                    <label class="form-check-label" for="flexCheckSelasa">
                        Selasa
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Rabu" id="flexCheckRabu">
                    <label class="form-check-label" for="flexCheckRabu">
                        Rabu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Kamis" id="flexCheckKamis">
                    <label class="form-check-label" for="flexCheckKamis">
                        Kamis
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Jumat" id="flexCheckJumat">
                    <label class="form-check-label" for="flexCheckJumat">
                        Jumat
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Sabtu" id="flexCheckSabtu">
                    <label class="form-check-label" for="flexCheckSabtu">
                        Sabtu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Minggu" id="flexCheckMinggu">
                    <label class="form-check-label" for="flexCheckMinggu">
                        Minggu
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container untuk menampilkan form Jam Mulai dan Jam Akhir -->
<div id="scheduleContainer"></div>

<script>
    // Ambil semua checkbox
    const checkboxes = document.querySelectorAll('.form-check-input');

    // Fungsi untuk menambahkan atau menghapus form jam mulai dan jam akhir
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const scheduleContainer = document.getElementById('scheduleContainer');
            const day = this.value; // Hari yang dipilih

            // Cek jika checkbox di centang
            if (this.checked) {
                // Buat div untuk jam mulai dan akhir
                const scheduleDiv = document.createElement('div');
                scheduleDiv.id = `schedule-${day}`;
                scheduleDiv.classList.add('mx-3', 'mb-3');

                // Isi div dengan form jam mulai dan akhir
                scheduleDiv.innerHTML = `
                    <div class="mx-3">
                        <label for="startTime-${day}" class="form-label">Jam Mulai - ${day}</label>
                        <input type="time" class="form-control border-black" id="startTime-${day}">
                    </div>
                    <div class="mb-3">
                        <label for="endTime-${day}" class="form-label">Jam Akhir - ${day}</label>
                        <input type="time" class="form-control border-black" id="endTime-${day}">
                    </div>
                `;

                // Tambahkan ke dalam container
                scheduleContainer.appendChild(scheduleDiv);
            } else {
                // Hapus div jika checkbox tidak dicentang
                const scheduleDiv = document.getElementById(`schedule-${day}`);
                if (scheduleDiv) {
                    scheduleContainer.removeChild(scheduleDiv);
                }
            }
        });
    });
</script>

@endsection



@section('editModalContent')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nama</label>
    <input type="text" class="form-control border-black" id="exampleFormControlInput1">
</div>
<div class="mb-3">
    <label for="formFile2" class="form-label">Foto</label>
    <img id="previewImage2" src="" alt="Preview Image " style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
    <input class="form-control border-black image-input" type="file" id="formFile2">
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