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
                        width="100px"></td>
                <td>{{ $dokter->nama }}</td>
                <td>
                    @foreach ($dokter->jadwal as $jadwal)
                    <li>
                        Hari: {{ ucfirst($jadwal['hari'] ?? 'N/A') }} <br>
                        Jam: {{ $jadwal['jadwal_awal'] ?? 'N/A' }} - {{ $jadwal['jadwal_akhir'] ?? 'N/A' }}
                    </li>
                    @endforeach
                </td>
                <td>
                    <span><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editDoctorModal{{ $dokter->id }}" data-id="{{'/doctor/update/'.$dokter->id}}">Edit</button></span>
                    <span><button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusModal" data-id="{{'/doctor/destroy/'.$dokter->id}}">Hapus</button></span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada data.</p>
    @endif
</div>

@endsection

@section('formAction')
{{ route('admin.doctor.store') }}
@endsection

<div class="modal fade" id="createDoctorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-light-pink" style="padding: 50px;">
            <form action="@yield('formAction')" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-20">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control border-black" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Foto</label>
                        <img id="previewImage1" src="" alt="Preview Image"
                            style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                        <input class="form-control border-black image-input" type="file" id="gambar" name="gambar"
                            required>
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

@foreach($dokterList as $service)
<div class="modal fade" id="editDoctorModal{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-light-pink" style="padding: 50px;">
            <form id="editForm{{ $service->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class=" form-control border-black" id="exampleFormControlInput1" name="nama"
                        value="{{ $service->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Foto</label>
                    <img id="previewImage1" src="{{ asset('storage/' . $service->gambar) }}" alt="Preview Image"
                        style="display:block; max-width: 276px; height: auto; margin-bottom: 10px;">
                    <input class="form-control border-black image-input" type="file" id="gambar" name="gambar">
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
                                            value="{{ $day }}" id="{{ $day }}" {{ in_array($day, array_column($service->jadwal, 'hari')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $day }}">{{ ucfirst($day) }}</label>
                                    </div>
                                    <div id="jadwal-{{ $day }}" class="schedule-times mx-3 mb-3"
                                        style="display:{{ in_array($day, array_column($service->jadwal, 'hari')) ? 'block' : 'none' }}; width: 200px;">
                                        <label for="jadwal_awal-{{ $day }}" class="form-label">Jam Mulai -
                                            {{ ucfirst($day) }}</label>
                                        <input type="time" class="form-control border-black" id="jadwal_awal-{{ $day }}"
                                            name="jadwal[{{ $day }}][jadwal_awal]" value="{{ $service->jadwal[$day]['jadwal_awal'] ?? '' }}">
                                        <label for="jadwal_akhir-{{ $day }}" class="form-label">Jam Akhir -
                                            {{ ucfirst($day) }}</label>
                                        <input type="time" class="form-control border-black" id="jadwal_akhir-{{ $day }}"
                                            name="jadwal[{{ $day }}][jadwal_akhir]" value="{{ $service->jadwal[$day]['jadwal_akhir'] ?? '' }}">
                                    </div>
                                @endforeach
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
<script>
    function toggleSchedule(day, isChecked) {
        const scheduleDiv = $(`#schedule-${day}`);
        const startInput = $(`#jadwal_awal-${day}`);
        const endInput = $(`#jadwal_akhir-${day}`);

        if (isChecked) {
            scheduleDiv.show();
            startInput.prop('disabled', false);
            endInput.prop('disabled', false);
        } else {
            scheduleDiv.hide();
            startInput.prop('disabled', true).val('');
            endInput.prop('disabled', true).val('');
        }
    }
</script>
@endforeach

@section('script')
<script>
    $(document).ready(function() {
        function toggleSchedule(day, isChecked) {
            const scheduleDiv = $(`#schedule-${day}`);
            const startInput = $(`#jadwal_awal-${day}`);
            const endInput = $(`#jadwal_akhir-${day}`);

            if (isChecked) {
                scheduleDiv.show(); // Tampilkan input waktu
                startInput.prop('disabled', false); // Aktifkan input
                endInput.prop('disabled', false);
            } else {
                scheduleDiv.hide(); // Sembunyikan input waktu
                startInput.prop('disabled', true).val(''); // Nonaktifkan dan kosongkan input
                endInput.prop('disabled', true).val('');
            }
        }

        // Event listener untuk checkbox
        $('input[name^="jadwal"]').on('change', function() {
            const day = $(this).val();
            const isChecked = $(this).is(':checked');
            toggleSchedule(day, isChecked);
        });
    });
</script>
@endsection