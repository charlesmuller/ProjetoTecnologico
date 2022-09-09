<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
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
