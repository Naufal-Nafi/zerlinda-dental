@extends('layout.user')

@section('title', 'p')

@section('content')
<div class="min-h-screen mx-auto text-pink-primary w-4/5">
    <h1 class="lg:text-5xl text-xl font-bold lg:my-20 my-12">Judul Pelayanan</h1>
    <img src="{{ asset('images/landing-page.png') }}" alt="" class="border-2 border-pink-secondary rounded-lg">
    <p class="mt-12 text-black text-justify">
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
    <h1 class="lg:text-5xl text-xl font-bold lg:my-20 my-12">Contoh Foto Perawatan</h1>


</div>
<div class="slider my-12">
    <ul class="list" style="
        --sliderWidth: 450px;
        --time: 27s;
        --quantity: 9
    ">
        <li class="" style="--index: 1"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 2"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 3"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 4"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 5"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 6"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 7"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 8"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 9"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>

    </ul>
</div>

@endsection