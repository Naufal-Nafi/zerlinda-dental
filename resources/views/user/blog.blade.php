@extends('layout.user')
@section('content')
<div class="min-h-screen w-4/5 mx-auto ">
    <!-- Judul & Search Bar -->
    <div class="md:flex justify-between md:mt-20 mt-12">
        <h1 class="lg:text-4xl md:text-3xl text-xl text-pink-primary text-start font-bold mb-4">Postingan Terkini</h1>
        <form action="{{ route('blog') }}" method="GET" class="relative mb-4 md:w-1/2">
            <input type="text" name="keyword" placeholder="Search articles..."
                class="border border-black rounded-lg p-2  w-full" value="{{ request('keyword') }}">
            <button type="submit" class="absolute inset-y-0 right-0 pl-2 flex items-center me-4">
                <img src="{{ asset('icons/icon_search.png') }}" alt="Search Icon" class="w-5 h-5">
            </button>
        </form>
    </div>

    <!-- Blog paling atas  -->
    @if (isset($topBlog))
        <div
            class="md:h-[630px] h-[350px] md:border-4 md:rounded-[65px] rounded-xl border-pink-secondary my-12 hover:opacity-80 duration-300 cursor-pointer">
            <a href="{{ route('blog.show', $topBlog->id_artikel) }}">
                <img class="w-full h-4/5 md:rounded-t-[60px] rounded-t-xl object-cover"
                    src="{{ asset('storage/' . $topBlog->url_media) }}" alt="">
                <div class="h-1/5 bg-pink-secondary md:rounded-b-[60px] rounded-b-xl flex flex-col justify-center">
                    <p class="text-lg font-bold">{{ $topBlog->judul }}</p>
                </div>
            </a>
        </div>
    @else
        <p>belum ada artikel</p>
    @endif

    <!-- 3 blog kedua  -->
    <div class="grid md:grid-cols-3 grid-cols-1 gap-9">
        @if ($middleBlogs && $middleBlogs->isNotEmpty())
            @foreach ($middleBlogs as $artikel)
                <div
                    class="xl:h-[400px] h-[350px] rounded-xl hover:rounded-3xl hover:opacity-80 duration-300 cursor-pointer bg-pink-secondary">
                    <a href="{{ route('blog.show', $artikel->id_artikel) }}">
                        <img class="w-full h-4/5 rounded-t-xl hover:rounded-t-3xl duration-300 object-cover"
                            src="{{ asset('storage/' . $artikel->url_media) }}" alt="">
                        <div
                            class="h-1/5 bg-pink-secondary rounded-b-xl hover:rounded-b-3xl duration-300 flex flex-col justify-center">
                            <p class="line-clamp-2">{{ $artikel->judul }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Blog lainnya  -->
    <div class="my-12 bg-pink-secondary bg-opacity-20 ">
        <div class="w-4/5 mx-auto ">
            <!-- for each -->
            @if ($remainingBlogs && $remainingBlogs->isNotEmpty())
                @foreach ($remainingBlogs as $artikel)
                    <div class="w-full py-8 hover:opacity-80 duration-300 cursor-pointer">
                        <a href="{{ route('blog.show', $artikel->id_artikel) }}" class="md:flex block">
                            <img class="md:w-1/4 h-full rounded-[50px] object-cover border-2 border-pink-secondary me-8"
                                src="{{ asset('storage/' . $artikel->url_media) }}" alt="">
                            <div class="md:text-left flex flex-col justify-center">
                                <h5 class="text-pink-primary font-bold text-3xl my-2">{{ $artikel->judul }}</h5>
                                <p class="text-justify line-clamp-3">
                                    {{ $artikel->konten }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            <!-- end for each  -->
        </div>
    </div>
    <div class="my-12">
        {{ $remainingBlogs->links() }}
    </div>
    @endsection