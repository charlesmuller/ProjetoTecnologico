<x-layout title="Adicionar HQ">
<div class="col-lg-12" style="text-align: left;">
    <a href="/colecao" class="btn btn-dark" style="aling 13px;">Voltar</a>
</div>

        <form action="{{ route('api.chamada') }}" method="post" id="connectionForm">
            @csrf
             <div class="group-form">
                <input required type="text" name="name" id="name"  placeholder="(Ex. Hulk, Iron Man, Spider-Man, etc...)">
            </div>
            <div>
            <button type="submit" class="btn btn-primary btn-lg" >Buscar</button>
            </div>
        </form>

    @section('scripts')

        <div class="container" id="contentContainer">

            <div class="d-flex align-items-center" id="characterSpinnerSection"></div>
            <div class="d-flex align-items-center" id="comicsSpinnerSection"></div>

            <section id="characterSection"></section>


            <section id="comicSection"></section>
        </div>

        <script src="{{ asset('js/main.js')}}"></script>
        <body onload="
    @endsection
</x-layout>
