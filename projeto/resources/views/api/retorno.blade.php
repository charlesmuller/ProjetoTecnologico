<x-layout title="Retorno da pesquisa">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="col-lg-12">
    <a href="/api/adicionarhq" class="btn btn-dark" style="position: relative; right: 540px">Voltar</a>
</div>
    <body>
        @foreach($result->data->results as $dado)
{{--            @dd($dado)--}}
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="">
                    {{ $dado['name'] }}
                        {{ $dado['comics'] }}

                    </span>
        @endforeach
{{--        @foreach($result['items'] as $dado)--}}
{{--            @dd($dado)--}}
{{--            <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                    <span class="">--}}
{{--                    {{ $dado->name }}--}}
{{--                        {{ $dado }}--}}

{{--                    </span>--}}
{{--        @endforeach--}}
    </body>

</x-layout>
