<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/logo_simple.png') }}">
</head>

<body>
    <div class="d-flex caret-pink-primary">
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
                            <a class="btn bg-pink nav-link text-decoration-none text-white"
                                href=" {{ route('admin.login') }} "><i class="bi bi-box-arrow-right"></i>LogOut</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>





        <!-- Navbar -->
        <div class="flex" id="navbar">
            <nav class="navbar px-3">
                <button class="btn bg-light-pink btn-offcanvas" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    Menu
                </button>
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

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header bg-light-pink">
                <div class="w-100 mb-4 d-flex justify-content-center">
                    <img src="{{ asset('images/logo_horizontal.png') }}" alt="Logo" style="width: 80%;">
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-light-pink">
                <div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                                    class="bi bi-house-door me-2"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.contact') }}"><i
                                    class="bi bi-envelope me-2"></i>Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.landingpage') }} "><i
                                    class="bi bi-file-earmark-text me-2"></i>Landing Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.blog') }} ">
                                <i class="bi bi-journal me-2"></i>Artikel
                                Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.doctor') }} "><i
                                    class="bi bi-calendar me-2"></i>Jadwal Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.service') }} "> <i
                                    class="bi bi-gear me-2"></i>Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('password.change') }} ">
                                <i class="bi bi-lock me-2"></i>Ubah Password</a>
                        </li>
                    </ul>
                </div>
                <div class="position-absolute bottom-0 w-100" style="margin-bottom: 150px;">
                    <ul class="nav flex-column w-100">
                        <li class="nav-item d-flex justify-content-center ">
                            <a class="btn bg-pink nav-link text-decoration-none text-white"
                                href=" {{ route('admin.login') }} "><i class="bi bi-box-arrow-right me-2"></i>LogOut</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- Konten Halaman -->
        <div class="main-content container d-flex justify-content-center align-items-center" style="top: 8%;">
            <div style="width: 85%; ">
                @yield('content')
            </div>
        </div>
    </div>




    <!--Create Modal -->
    <div class="modal fade" id="{{ $createModalName ?? 'defaultModalId' }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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



    <!--Edit Modal -->
    


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

    <script>
        // Update time
        function updateTime() {
            const now = new Date();
            $('#current-time').text(now.toLocaleTimeString());
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

        $('#current-date').text(formattedDate);

        // Image Input Preview Handler (use this for both existing and dynamically added inputs)
        function initializeImagePreview() {
            $('.image-input').each(function () {
                const previewImage = $(this).prev();

                $(this).on('change', function (event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewImage.attr('src', e.target.result).css('display', 'block');
                        }
                        reader.readAsDataURL(file);
                    } else {
                        previewImage.hide().attr('src', '');
                    }
                });
            });
        }

        // Initialize the preview for the first two inputs
        initializeImagePreview();

        // Ambil semua checkbox
        

        // Fungsi untuk menambahkan atau menghapus form jam mulai dan jam akhir

        $(document).ready(function () {

            const checkboxes = $('input[name="jadwal[]"]');

            checkboxes.each(function () {
            $(this).on('change', function () {
                const day = $(this).val(); // Hari yang dipilih
                const parentDiv = $(this).closest('.form-check'); // Dapatkan parent div dari checkbox

                // Cek jika checkbox di centang
                if ($(this).is(':checked')) {
                    // Buat div untuk jam mulai dan akhir
                    const scheduleDiv = $(`
                    <div id="schedule-${day}" class="schedule-times mx-3 mb-3" style="width: 100px;">
                        <div class="">
                            <label for="jadwal_awal-${day}" class="form-label">Jam Mulai - ${day}</label>
                            <input type="time" class="form-control border-black" id="jadwal_awal-${day}">
                        </div>
                        <div class="">
                            <label for="jadwal_akhir-${day}" class="form-label">Jam Akhir - ${day}</label>
                            <input type="time" class="form-control border-black" id="jadwal_akhir-${day}">
                        </div>
                    </div>
                `);

                    // Tambahkan ke dalam div form-check setelah label
                    parentDiv.append(scheduleDiv);
                } else {
                    // Hapus div jika checkbox tidak dicentang
                    $(`#schedule-${day}`).remove();
                }
            });
        });
        })
        
    </script>

    @section('edit_script')
    <script>

    </script>
    @endsection

@yield('script')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>