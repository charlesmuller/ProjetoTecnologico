<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{$title}}</title>
    </head>
    <body>
        <div class="container text-center" style="width: 420px; margin: 50px auto 0px auto">
            <h1>{{$title}}</h1> <BR>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{$slot}}
        </div>
    </body>
</html>
