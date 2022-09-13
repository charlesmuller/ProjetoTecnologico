<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{$title}}</title>
    <style>
        .container {
            width: 420px;
            margin: 100px auto 0px auto;
            text-align: center;
            font-size: large;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{$title}}</h1> <BR>
    {{$slot}}
</div>

</body>
</html>
