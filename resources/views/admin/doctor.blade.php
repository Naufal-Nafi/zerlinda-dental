@extends('layout.admin')

@section('page-title', 'Dokter')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createDoctorModal">
    Tambah Dokter
</button>
<div class="table-responsive text-center">
    @if($dokterList->count() > 0)
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
                @foreach ($dokterList as $dokter)                                
                    <tr>
                        <td><img src="{{ asset('storage/' . $dokter->gambar) }}" alt="Foto Dokter {{ $dokter->nama }}"
                                width="200px"></td>
                        <td>{{ $dokter->nama }}</td>
                        <td>
                            @foreach ($dokter->jadwal as $jadwal)
                                <li style="list-style:none;">
                                    Hari: {{ucfirst($jadwal['hari'])}} <br>
                                    Jam: {{$jadwal['jadwal_awal']}} - {{$jadwal['jadwal_akhir']}}
                                </li>
                            @endforeach
                        </td>
                        <td>
                            <span><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editDoctorModal{{ $dokter->id }}">Edit</button></span>
                            <span><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal"
                                    data-id="{{'/doctor/destroy/' . $dokter->id}}">Hapus</button></span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data.</p>
    @endif    
</div>
<div class="modal fade" id="createDoctorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-light-pink" style="padding: 50px;">
            <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-20">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control border-black" id="nama" name="nama" required>
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Foto</label>
                        <img id="previewImage1" src="" alt="Preview Image"
                            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                        <input class="form-control border-black image-input" type="file" id="gambar" name="gambar"
                            required>
                        @error('gambar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <h5>Jadwal</h5>
                        <div class="d-flex">
                            <div class="d-block w-100">
                                <p>Pilih Hari</p>
                                <div class="d-flex overflow-x-auto w-100">
                                    @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day)
                                        <div class="form-check form-check-inline">
                                            <input name="jadwal[{{ $day }}][hari]"
                                                class="form-check-input form-check-input-doctor" type="checkbox"
                                                value="{{ $day }}" id="{{ $day }}">
                                            <label class="form-check-label" for="{{ $day }}">{{ ucfirst($day) }}</label>
                                        </div>
                                        <div id="schedule-{{ $day }}" class="schedule-times mx-3 mb-3"
                                            style="display:none; width: 200px;">
                                            <label for="jadwal_awal-{{ $day }}" class="form-label">Jam Mulai -
                                                {{ ucfirst($day) }}</label>
                                            <input type="time" class="form-control border-black" id="jadwal_awal-{{ $day }}"
                                                name="jadwal[{{ $day }}][jadwal_awal]" disabled>
                                            <label for="jadwal_akhir-{{ $day }}" class="form-label">Jam Akhir -
                                                {{ ucfirst($day) }}</label>
                                            <input type="time" class="form-control border-black"
                                                id="jadwal_akhir-{{ $day }}" name="jadwal[{{ $day }}][jadwal_akhir]"
                                                disabled>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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

@foreach($dokterList as $dokter)
    <div class="modal fade" id="editDoctorModal{{ $dokter->id }}" tabindex="-1" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-light-pink" style="padding: 50px;">
                <form action="{{route('admin.doctor.update', $dokter->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body text-20">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input 
                                type="text" 
                                class="form-control border-black" 
                                id="nama" 
                                name="nama" 
                                value="{{ old('nama', $dokter->nama) }}" 
                                required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Foto</label>
                            @if($dokter->gambar)
                                <img id="previewImage1" src="{{ asset('storage/' . $dokter->gambar) }}" alt="Preview Image"
                                    style="max-width: 276px; height: auto; margin-bottom: 10px;">
                            @else
                                <img id="previewImage1" src="" alt="Preview Image"
                                    style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                            @endif
                            <input 
                                class="form-control border-black image-input" 
                                type="file" 
                                id="gambar" 
                                name="gambar">
                        </div>
                        <div>
                            <h5>Jadwal</h5>
                            <div class="d-flex">
                                <div class="d-block w-100">
                                    <p>Pilih Hari</p>
                                    <div class="d-flex overflow-x-auto w-100">
                                        @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day)
                                            <div class="form-check form-check-inline">
                                                <input 
                                                    name="jadwal[{{ $day }}][hari]"
                                                    class="form-check-input form-check-input-doctor-edit" 
                                                    type="checkbox"
                                                    value="{{ $day }}" 
                                                    id="{{ $day }}" 
                                                    data-dokter-id="{{ $dokter->id }}" 
                                                    {{ isset($dokter->jadwal[$day]) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="{{ $day }}">{{ ucfirst($day) }}</label>
                                            </div>
                                            <div id="Edit-{{ $dokter->id }}-schedule-{{ $day }}" 
                                                class="schedule-times mx-3 mb-3 {{ isset($dokter->jadwal[$day]) ? 'd-block' : 'd-none' }}"
                                                style="width: 200px;">
                                                <label for="Edit-jadwal_awal-{{ $dokter->id }}-{{ $day }}" class="form-label">Jam Mulai - {{ ucfirst($day) }}</label>
                                                <input 
                                                    type="time" 
                                                    class="form-control border-black" 
                                                    id="Edit-{{ $dokter->id }}-jadwal_awal-{{ $day }}"
                                                    name="jadwal[{{ $day }}][jadwal_awal]" 
                                                    value="{{ $dokter->jadwal[$day]['jadwal_awal'] ?? '' }}" 
                                                    {{ isset($dokter->jadwal[$day]) ? '' : 'disabled' }}>
                                                <label for="Edit-jadwal_akhir-{{ $dokter->id }}-{{ $day }}" class="form-label">Jam Akhir - {{ ucfirst($day) }}</label>
                                                <input 
                                                    type="time" 
                                                    class="form-control border-black"
                                                    id="Edit-{{ $dokter->id }}-jadwal_akhir-{{ $day }}" 
                                                    name="jadwal[{{ $day }}][jadwal_akhir]" 
                                                    value="{{ $dokter->jadwal[$day]['jadwal_akhir'] ?? '' }}" 
                                                    {{ isset($dokter->jadwal[$day]) ? '' : 'disabled' }}>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white bg-pink">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
@endforeach

@endsection

@push('script')


<script>
$(document).ready(function () {
    // Fungsi untuk toggle jadwal berdasarkan status checkbox
    function toggleSchedule(day, isChecked, isEdit = false, dokterId) {
        const prefix = isEdit ? `Edit-${dokterId}-` : '';
        const scheduleDiv = $(`#${prefix}schedule-${day}`);
        const startInput = $(`#${prefix}jadwal_awal-${day}`);
        const endInput = $(`#${prefix}jadwal_akhir-${day}`);

        

        if (isChecked) {
            scheduleDiv.addClass("d-block").removeClass("d-none");
            startInput.prop("disabled", false);
            endInput.prop("disabled", false);
        } else {
            scheduleDiv.addClass("d-none").removeClass("d-block");
            startInput.prop("disabled", true).val('');
            endInput.prop("disabled", true).val('');
        }

        // console.log(Day: ${day}, isChecked: ${isChecked}, isEdit: ${isEdit});
        console.log("Schedule Div:", scheduleDiv);
        console.log("Start Input:", startInput, "End Input:", endInput);
    }


    // Event listener untuk form create
    $(".form-check-input-doctor").on("change", function () {
        const day = $(this).val();
        const isChecked = $(this).is(":checked");
        toggleSchedule(day, isChecked, false);
    });

    // Event listener untuk form edit (dengan delegation)
    $(document).on("change", ".form-check-input-doctor-edit", function () {
        const dokterId = $(this).data('dokter-id'); // Tambahkan data dokterId di checkbox
        const day = $(this).val();
        const isChecked = $(this).is(":checked");
        toggleSchedule(day, isChecked, true, dokterId);
    });

    // Inisialisasi awal untuk form edit
    $(".form-check-input-doctor-edit").each(function () {
        const dokterId = $(this).data('dokter-id'); // Tambahkan data dokterId di checkbox
        const day = $(this).val();
        const isChecked = $(this).is(":checked");
        toggleSchedule(day, isChecked, true, dokterId);
    });

});
</script>
@endpush



@section('formAction')
{{ route('admin.doctor.store') }}
@endsection