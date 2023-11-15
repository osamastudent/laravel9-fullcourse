<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="icon" href="{{ asset('storage/images/logo.jpg') }}" >
    <title>Category</title>
</head>
<body>
    <br>
    <img src="{{asset('storage/images/logo.jpg')}}"  height="100">
<div class="container">
    <h1><a href="/product">product</a></h1>
<h1 class="text-center">Add Category</h1>
<form action="/category" method="post">
    @csrf
    <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter Category"><br>
    @error('name')
<h4>{{$message}}</h4>
    @enderror
    <input type="submit" class="btn btn-primary rounded-pill form-control">
    

    @if(session('status'))
<h1>{{session('status')}}</h1>
    @endif
</form>
</div>
</body>
</html>