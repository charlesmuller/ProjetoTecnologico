<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{$title}}</title>
</head>
<body>
<div class="container">
    <h1>{{$title}}</h1> <BR>
    {{$slot}}
</div>
</body>
</html>
