<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Tambahkan CSS untuk Bootstrap atau framework CSS lain jika diperlukan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/logo_simple.png') }}">
</head>

<body>
    <div class="d-flex ">
        <!-- Sidebar -->
        <div class="sidebar top-0">
            <div class="w-100 mb-4 d-flex justify-content-center">
                <img src="{{ asset('images/logo_horizontal.png') }}" alt="Logo" style="width: 80%;">
            </div>
            <nav class="sidenav" style="">
                <div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                                    class="bi bi-house-door"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.contact') }}"><i
                                    class="bi bi-envelope"></i>Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.landingpage') }} "><i
                                    class="bi bi-file-earmark-text"></i>Landing Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.blog') }} "><i class="bi bi-journal"></i>Artikel
                                Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.doctor') }} "><i
                                    class="bi bi-calendar"></i>Jadwal Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.service') }} "> <i
                                    class="bi bi-gear"></i>Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('password.change') }} "><i class="bi bi-lock"></i>Ubah
                                Password</a>
                        </li>
                    </ul>
                </div>
                <div class="position-absolute bottom-0 w-100" style="margin-bottom: 150px;">
                    <ul class="nav flex-column w-100">
                        <li class="nav-item d-flex justify-content-center ">
                            <a class="nav-link text-decoration-none text-danger"
                                href=" {{ route('admin.login') }} ">LogOut</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>



        <!-- Navbar -->
        <div class="flex-grow-1 " id="navbar">
            <nav class="navbar px-3" style="width: calc(100% - 250px); left: 250px; ">
                <div class='navbar-brand mb-0 h1'>
                    <span>Admin Page - </span>
                    <span>@yield('page-title')</span>
                </div>
                <div>
                    <span class="ml-auto" id="current-date"></span>
                    <span class="mx-3" id="current-time"></span>
                </div>
            </nav>
        </div>



        <!-- Konten Halaman -->
        <div class="container d-flex justify-content-center align-items-center"
            style="min-height: 100vh; min-width: calc(100% - 250px);">
            <div class="main-content" style="width: 70%;">
                @yield('content')
            </div>
        </div>
    </div>


    

    <!--Create Modal -->
    <div class="modal fade" id="{{ $createModalName ?? 'defaultModalId' }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-light-pink" style="padding: 50px;">
                <form action="@yield('formAction')" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-20">
                        @yield('createModalContent')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white bg-pink">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <script>
        document.getElementById('crea')
    </script> -->




    <!--Edit Modal -->
    <div class="modal fade" id="{{ $editModalName ?? 'defaultModalId'}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-light-pink" style="padding: 50px;">
                <form action="{{ route('admin.service.update', ['id' => $service->id ?? 'defaultId']) }}" method="POST">
                    @csrf
                    <div class="modal-body text-20">
                        @yield('editModalContent')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white bg-pink">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Hapus Modal -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-light-pink">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
            </div>
            <!-- Form dengan action yang akan diubah oleh JavaScript -->
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var hapusModal = document.getElementById('hapusModal');
        hapusModal.addEventListener('show.bs.modal', function (event) {
            // Dapatkan tombol yang diklik
            var button = event.relatedTarget;
            var serviceId = button.getAttribute('data-id');
            var form = document.getElementById('deleteForm');
            
            // Set action form berdasarkan ID service
            form.action = '/admin' + serviceId;
        });
    });
</script>


    <!-- Script untuk menampilkan waktu saat ini -->
    <script>
        // Update time
        function updateTime() {
            const now = new Date();
            document.getElementById('current-time').textContent = now.toLocaleTimeString();
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Update Date
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleDateString('en-us', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

        document.getElementById('current-date').textContent = formattedDate;

        // Image Input Preview Handler (use this for both existing and dynamically added inputs)
        function initializeImagePreview() {
            document.querySelectorAll('.image-input').forEach(input => {
                const previewImage = input.previousElementSibling;

                input.addEventListener('change', function (event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewImage.src = e.target.result;
                            previewImage.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        previewImage.style.display = 'none';
                        previewImage.src = '';
                    }
                });
            });
        }

        // Initialize the preview for the first two inputs
        initializeImagePreview();



        // Ambil semua checkbox
        const checkboxes = document.querySelectorAll('.form-check-input-doctor');

        // Fungsi untuk menambahkan atau menghapus form jam mulai dan jam akhir
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const day = this.value; // Hari yang dipilih
                const parentDiv = this.closest('.form-check'); // Dapatkan parent div dari checkbox

                // Cek jika checkbox di centang
                if (this.checked) {
                    // Buat div untuk jam mulai dan akhir
                    const scheduleDiv = document.createElement('div');
                    scheduleDiv.id = `schedule-${day}`;
                    scheduleDiv.classList.add('schedule-times', 'mx-3', 'mb-3');
                    scheduleDiv.style.width = '100px';

                    // Isi div dengan form jam mulai dan akhir
                    scheduleDiv.innerHTML = `
                <div class="">
                    <label for="startTime-${day}" class="form-label">Jam Mulai - ${day}</label>
                    <input type="time" class="form-control border-black" id="startTime-${day}">
                </div>
                <div class="">
                    <label for="endTime-${day}" class="form-label">Jam Akhir - ${day}</label>
                    <input type="time" class="form-control border-black" id="endTime-${day}">
                </div>
            `;

                    // Tambahkan ke dalam div form-check setelah label
                    parentDiv.appendChild(scheduleDiv);
                } else {
                    // Hapus div jika checkbox tidak dicentang
                    const scheduleDiv = document.getElementById(`schedule-${day}`);
                    if (scheduleDiv) {
                        parentDiv.removeChild(scheduleDiv);
                    }
                }
            });
        });


    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>