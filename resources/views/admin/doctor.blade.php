@extends('layout.admin')

@section('page-title', 'Dokter')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn text-white bg-pink" data-bs-toggle="modal" data-bs-target="#createDoctorModal">
    Tambah Dokter
</button>
<div class="table-responsive text-center">
    @forelse($dokter as $service)
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
                    <td><img src="{{ asset('storage/'.$service->foto) }}" alt="Foto Dokter {{ $service->nama }}" width="100px"></td>
                    <td>{{ $service->nama }}</td>
                    <td>
                        <p>{{ implode(', ', $service->jadwal) }}</p>
                    </td>
                    <td>
                        <span><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDoctorModal{{ $service->id }}">Edit</button></span>
                        <span><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $service->id }}">Hapus</button></span>
                    </td>
                </tr>
            </tbody>
        </table>
    @empty
        <p>Tidak ada dokter yang tersedia.</p>
    @endforelse
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
                        <img id="previewImage1" src="" alt="Preview Image" style="display:none; max-width: 276px; height: auto; margin-bottom: 10px;">
                        <input class="form-control border-black image-input" type="file" id="gambar" name="gambar" required>
                    </div>
                    <div>
                        <h5>Jadwal</h5>
                        <div class="d-flex">
                            <div class="d-block w-100">
                                <p>Pilih Hari</p>
                                <div class="d-flex overflow-x-auto w-100">
                                    @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day)
                                        <div class="form-check form-check-inline">
                                            <input name="jadwal[]" class="form-check-input form-check-input-doctor" type="checkbox" value="{{ $day }}" id="{{ $day }}">
                                            <label class="form-check-label" for="{{ $day }}">{{ ucfirst($day) }}</label>
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

@foreach($dokter as $service)
<div class="modal fade" id="editDoctorModal{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-light-pink" style="padding: 50px;">
            <form id="editForm{{ $service->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class=" form-control border-black" id="exampleFormControlInput1" name="nama" value="{{ $service->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="formFile1" class="form-label">Foto</label>
                    <img id="previewImage1" src="{{ asset('storage/'.$service->foto) }}" alt="Preview Image" style="display:block; max-width: 276px; height: auto; margin-bottom: 10px;">
                    <input class="form-control border-black image-input" type="file" id="formFile1" name="gambar">
                </div>
                <div>
                    <h5>Jadwal</h5>
                    <div class="d-flex">
                        <div class="d-block w-100">
                            <p>Pilih Hari</p>
                            <div class="d-flex overflow-x-auto w-100">
                                @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-check-input-doctor" type="checkbox" value="{{ ucfirst($day) }}" id="flexCheck{{ ucfirst($day) }}" name="jadwal[]" {{ in_array($day, $service->jadwal) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheck{{ ucfirst($day) }}">{{ ucfirst($day) }}</label>
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
@endforeach

@section('script')
<script>
    $(document).ready(function() {
        // Function to toggle the visibility of the schedule input fields based on checkbox state
        function toggleSchedule(day, isChecked) {
            const parentDiv = $(`#${day}`).closest('.form-check');
            if (isChecked) {
                const scheduleDiv = $(`
                    <div id="schedule-${day}" class="schedule-times mx-3 mb-3" style="width: 100px;">
                        <div class="">
                            <label for="jadwal_awal-${day}" class="form-label">Jam Mulai - ${day}</label>
                            <input type="time" class="form-control border-black" id="jadwal_awal-${day}" name="jadwal_awal[${day}]">
                        </div>
                        <div class="">
                            <label for="jadwal_akhir-${day}" class="form-label">Jam Akhir - ${day}</label>
                            <input type="time" class="form-control border-black" id="jadwal_akhir-${day}" name="jadwal_akhir[${day}]">
                        </div>
                    </div>
                `);
                parentDiv.append(scheduleDiv);
            } else {
                $(`#schedule-${day}`).remove();
            }
        }

        // Event listener for changes to the day checkboxes
        $('input[name="jadwal[]"]').on('change', function() {
            toggleSchedule($(this).val(), $(this).is(':checked'));
        });

        // Form submission handler
        $('#createDoctorForm').on('submit', function(event) {
            event.preventDefault();
            let selectedDays = [];
            let times = {};

            // Collect the selected days
            $('input[name="jadwal[]"]:checked').each(function() {
                selectedDays.push($(this).val());
                const day = $(this).val();
                const jadwalAwal = $(`#jadwal_awal-${day}`).val();
                const jadwalAkhir = $(`#jadwal_akhir-${day}`).val();
                if (jadwalAwal && jadwalAkhir) {
                    times[day] = { jadwal_awal: jadwalAwal, jadwal_akhir: jadwalAkhir };
                }
            });

            // Create the JSON object
            const scheduleJSON = JSON.stringify({
                days: selectedDays,
                times: times
            });

            // Attach the JSON to the hidden input field or directly to the form data
            $('#jadwal').val(scheduleJSON); // Assuming there's a hidden input with id "jadwal"
            
            // Submit the form
            this.submit();
        });
    });
</script>

@endsection