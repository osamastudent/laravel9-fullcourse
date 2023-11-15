<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><a href="/deletecookie">delete cookie</a></h1>
<h1>email: {{$email}}</h1>
<h1>passwor: {{$password}}</h1>


@if(session('email'))

{{session('email')}}
@endif


@if(session()->has('email'))
<h1>{{session()->get('email')}}</h1>
@endif

</body>
</html>