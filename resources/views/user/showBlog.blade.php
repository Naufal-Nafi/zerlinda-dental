@extends('layout.user')
@section('content')
<div class="min-h-screen mx-auto text-pink-primary md:w-4/5 w-[85%]">
    <p class="text-start mt-8 md:text-base text-xs">
        <span onclick="window.location.href='{{ route('home') }}'" class="hover:font-bold cursor-pointer">home</span> /
        <span onclick="window.location.href='{{ route('blog') }}'" class="hover:font-bold cursor-pointer">blog</span> /
        <span>Judul Artikel</span>
    </p>

    <h1 class="lg:text-5xl text-2xl font-bold lg:my-20 my-12">Judul Blog</h1>
    <img src="{{ asset('images/landing-page.png') }}" alt="" class="border-4 border-pink-secondary rounded-lg">
    <p class="my-12 text-black text-justify text-xs md:text-base">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum perferendis quos natus ut expedita accusantium,
        dolore incidunt qui ipsum ex omnis sed, nemo est ab dolorem impedit pariatur reiciendis deserunt.
        Doloribus fuga autem nesciunt dolore asperiores iusto reiciendis molestiae deleniti ipsam delectus? Ipsum
        explicabo inventore cumque ad fugiat deleniti, quibusdam, alias nobis at commodi cum, architecto illum excepturi
        laborum id?
        Repudiandae ducimus voluptate ut distinctio numquam! Rem minus enim dicta animi aliquid minima veritatis quos
        voluptas ut, asperiores nobis ipsum quae pariatur neque porro dolorum blanditiis ex odio repellat facere.
        Vel quaerat inventore cupiditate maiores asperiores sapiente atque voluptate, at illum fuga aspernatur,
        consequatur, nobis incidunt. Eum id dignissimos voluptas quo illum, asperiores modi optio obcaecati praesentium
        corporis incidunt dolore!
        Nobis mollitia commodi architecto deserunt sint rerum ipsam laborum consectetur hic, ad placeat. Cum repellendus
        in sint atque recusandae minus, ratione dolorum nihil corporis, nam similique. Consectetur ut laborum
        exercitationem.
        Odit facere inventore esse enim molestiae illum, maiores soluta ex expedita porro quaerat earum temporibus
        consequatur laboriosam natus. Dolor expedita quod eius sequi quisquam ullam deserunt aperiam, optio voluptas
        corporis?
        Obcaecati pariatur consequatur eos distinctio est doloremque eius, tempore fugit in non facere, ad hic dolorum
        dolore. Saepe molestiae, aliquam dolorem iste modi reprehenderit harum, perspiciatis expedita ea, nobis alias.
        Vitae deserunt praesentium doloremque debitis accusantium animi culpa ad, consequatur alias rerum minima
        nesciunt quae at modi suscipit impedit eveniet eos unde nobis ex sapiente nam. Error voluptatum libero maiores?
        Delectus accusantium praesentium, laudantium sed voluptas ut nostrum! Ullam, similique? Voluptatem ipsa veniam
        culpa fugiat quaerat explicabo assumenda accusamus iure quo! Fugit necessitatibus molestias harum autem? Eum
        assumenda esse eos.
        Possimus rem labore eveniet aperiam provident dolorum, voluptatum dicta magnam optio deleniti adipisci voluptas
        numquam beatae sequi. Est autem explicabo quisquam hic aut eius, suscipit aspernatur tempore dolores. Ipsa,
        officiis?
    </p>
</div>
@endsection