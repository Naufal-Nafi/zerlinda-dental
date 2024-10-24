@extends('layout.user')

@section('title', 'Layanan Zerlinda Dental')

@section('content')
<div class="min-h-screen mx-auto text-pink-primary">
    <h1 class="text-5xl font-bold my-20">Layanan Gigi Dewasa</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 xl:mx-60 lg:mx-32 mx-10 mb-20">
        <!-- for each  -->
        <a href="{{ route('service.show') }}" class="service-container block py-6 cursor-pointer">
            <div class="flex justify-center items-center ">
                <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                    class="xl:w-[250px] w-[200px] xl:h-[250px] h-[200px] rounded-full object-cover">
            </div>
            <p class="font-bold md:text-3xl text-pink-primary mt-12">Gigi Tiruan</p>
        </a>
        <!-- end for each  -->
    </div>
</div>
@endsection