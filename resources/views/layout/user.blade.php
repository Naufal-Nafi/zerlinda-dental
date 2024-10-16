<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Tambahkan CSS untuk Bootstrap atau framework CSS lain jika diperlukan -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    @vite('resources/css/app.css')
</head>

<body>
    <div class=" d-block">


        <!-- Navbar -->
        <!-- <div class="flex-grow-1 " id="navbar">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Zerlinda Dental</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                            <a class="nav-link" href="#">Lokasi</a>
                            <a class="nav-link" href="#">Pelayanan</a>
                            <a class="nav-link" href="#">Blog</a>
                            <a class="nav-link" href="#">Jadwal</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div> -->

        <!-- navbar -->
        <div class="flex-grow " id="navbar">
            <nav class="border-b-4 bg-white fixed top-0 left-0 right-0 z-50">
                <div class="mx-auto px-4 py-3">
                    <div class="flex justify-between items-center">
                        <img src="{{ asset('images/logo_horizontal.png') }}" alt="Logo" class="w-48">
                        <button class="navbar-toggler block lg:hidden p-2 rounded border focus:outline-none focus:ring"
                            type="button" aria-label="Toggle navigation">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div class="hidden lg:flex lg:items-center text-pink-primary font-bold">
                            <a class="nav-link px-4 py-2 " href="#">Home</a>
                            <a class="nav-link px-4 py-2 " href="#">Lokasi</a>
                            <a class="nav-link px-4 py-2 " href="#">Pelayanan</a>
                            <a class="nav-link px-4 py-2 " href="#">Blog</a>
                            <a class="nav-link px-4 py-2 " href="#">Jadwal</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="min-h-16">
        </div>


        <!-- Konten Halaman -->
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center main-content">
                @yield('content')
            </div>
        </div>


        <!-- Footer -->
        <footer class="bg-pink-secondary min-h-48 flex items-center justify-center">
            <div class="container md:mx-16 mx-4">
                <div class="px-4">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid ullam, harum odio eos aspernatur delectus. Fugit dolore praesentium iure voluptatum illo. Eum veritatis provident expedita, voluptatum autem ab repellat totam?
                    Tempore sunt vel soluta pariatur laboriosam. Reprehenderit in sed, perspiciatis mollitia ipsa error non exercitationem possimus accusamus nam? Cupiditate, necessitatibus beatae quam quibusdam excepturi iste nulla consequuntur quasi soluta repellendus.
                    Natus architecto ad obcaecati soluta earum quod eveniet totam aspernatur, quam saepe, dolorum error officiis officia doloremque quae eligendi temporibus consequuntur nobis rerum expedita fuga perferendis pariatur, delectus animi! Distinctio?
                    Illum culpa quibusdam commodi autem dolorum? Quisquam reprehenderit rem hic earum explicabo quasi iste voluptate, id nobis quas, molestiae fugit. Id est vero, laboriosam ab accusantium consectetur illum excepturi consequuntur.
                    Rem, quas dolores id excepturi voluptas recusandae placeat iure totam beatae provident quos, nemo consequuntur vel eos exercitationem eum! Beatae impedit voluptatem soluta excepturi dignissimos sequi a, atque placeat dolorem?
                    Et totam nostrum illo assumenda consectetur officiis dignissimos, eos eveniet vero at, est obcaecati reprehenderit aut! Eos, exercitationem error animi dolor, aliquam similique alias soluta nisi nulla obcaecati ex delectus?
                    
                </div>
            </div>
        </footer>
    </div>

</body>

</html>