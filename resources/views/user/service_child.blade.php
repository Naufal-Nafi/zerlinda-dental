@extends('layout.user')

@section('title', 'Layanan Zerlinda Dental')

@section('content')
<div class="min-h-screen mx-auto text-pink-primary font-bold">
    <h1 class="md:text-5xl text-3xl my-20">Layanan Gigi Anak</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 xl:mx-60 lg:mx-32 mx-10 mb-20">
        <!-- for each  -->
        <a href="{{ route('service.show') }}" class="duration-500 group hover:-translate-y-6 block py-6 cursor-pointer">
            <div class="flex justify-center items-center ">
                <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                    class="xl:size-[250px] size-[200px] rounded-full object-cover group-hover:opacity-75 duration-500">
            </div>
            <p class="md:text-3xl text-xl mt-12">Gigi Tiruan</p>
        </a>
        <!-- end for each  -->
        <!-- example  -->
        <a href="{{ route('service.show') }}" class="duration-500 group hover:-translate-y-6 block py-6 cursor-pointer">
            <div class="flex justify-center items-center ">
                <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                    class="xl:size-[250px] size-[200px] rounded-full object-cover group-hover:opacity-75 duration-500">
            </div>
            <p class="md:text-3xl text-xl mt-12">Gigi Tiruan</p>
        </a>
        <a href="{{ route('service.show') }}" class="duration-500 group hover:-translate-y-6 block py-6 cursor-pointer">
            <div class="flex justify-center items-center ">
                <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                    class="xl:size-[250px] size-[200px] rounded-full object-cover group-hover:opacity-75 duration-500">
            </div>
            <p class="md:text-3xl text-xl mt-12">Gigi Tiruan</p>
        </a>        
    </div>
</div>
@endsection