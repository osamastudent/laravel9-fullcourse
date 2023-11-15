<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('storage/images/lSRIzP2O3aEnNujM7TqzQA36c4Mtnnw3TSN5Ee6x.jpg')}}">
    <title>Register</title>
</head>
<body>
image<img src="{{asset('storage/images/lSRIzP2O3aEnNujM7TqzQA36c4Mtnnw3TSN5Ee6x.jpg')}}" alt="" height="200">

<div class="container">
<h1>register form</h1>
<form action="/register" method="post" enctype="multipart/form-data" novalidate>
    @csrf
<input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="name"><br>
@error('name')
{{$message}}
<br>
@enderror
<br>


<input type="email" id="email" name="email" value="{{old('email')}}"  class="form-control" placeholder="email"><br>
@error('email')
{{$message}}
<br>
@enderror
<br>

<input type="password" name="password" class="form-control" placeholder="password"><br>
@error('password')
{{$message}}
<br>
@enderror
<br>



<input type="password" name="cpassword" class="form-control" placeholder="confirm password"><br>
@error('cpassword')
{{$message}}
<br>
@enderror
<br>


<input type="file" name="userimage" id="userimage" style="display: none;">
<label class="btn" for="userimage">Photo</label>
@error('userimage')
{{$message}}
@enderror
<input type="submit" name="" id="">
</form>


@if(session('status'))
<h1>
{{session('status')}}
</h1>
@endif

<x-layoutcom data="from  register page">
<span>i am alert of register page</span>
<x-slot name="name">osaam</x-slot>
</x-layoutcom >
<br><br>
<h1>show Users</h1>
<form action="{{url('search')}}" method="GET">
    <div class="input-group">
    <input type="text" name="search" value="{{$search}}">
    <button>search...</button>
    <button><a href="/register">Reset</a></button>
    </div>
</form>
<table class="table">
    <th>Index</th>
<th>name</th>
    <th>email</th>
    <th>file size</th>
    <th>Mime Type</th>
    <th>Image</th>
<th>delete</th>
<th>trash</th>
<th><b> <input type="checkbox" id="checkAll"></b></th>
    <tbody>
    <form action="/selectmovetotrash" method="post">
    @csrf
    @if(count($show) > 0)
    @php
    $key=1;
    @endphp
        @foreach($show as $values)
        
        <tr>
            <td>{{$key++}}</td>
        <td>{{$values['name']}}</td>
        <td>{{$values['email']}}</td>
        <td>{{$values['file_size']}}</td>
        <td>{{$values['mme_type']}}</td>
        <td>
    @if ($values->userimage)
        <img src="{{ asset('storage/' . $values->userimage) }}" alt="User Image" height="70">
    @else
        No Image
    @endif
</td>
<!-- <td><a href="{{url('register',$values->id)}}">delete</a></td> -->
<td><a href="{{url('movetotrash',$values->id)}}">trash</a></td>
<td><a href="{{ url('download',$values->userimage) }}">download</a></td>

<td><a href="{{url('deletedirect',$values->id)}}">delete permenent</a></td>

    
  <td> <input type="checkbox" name="ids[]" value="{{$values->id}}">
</td>
<td><a href="{{url('update',$values->id)}}">Update</a></td>

        </tr>
        @endforeach
       
        @else
    <tr>
    <td colspan="5" class="text-center"><p>No results found.</p></td>
    
    </tr>
@endif
        @if(session('status'))
<h1><tr>
<td>
{{session('status')}}
</h1>
</td></tr>

@endif
<tr><td><button type="submit" name="action" value="restore">Move To Trash</button></td></tr>
<a href="trashall">trashall</a>
</form>
<td>
            <form action="/dall" method="post">
                @csrf
            <input type="submit" name="imgg" value="delete all">
            </form>
        </td>
          </tbody>
</table>
@if(method_exists($show,'links'))
<div class="div">
    
  {!! $show->links(); !!}
</div>
@endif
</div>


<x-checkcomponent pass="i am passing data using component for register page">
    <h1>slot working in register</h1>
    <h1>slot working in register</h1>
    <h1>slot working in register</h1>
    
</x-checkcomponent>
</body>
</html>

<script>
    const checkAll = document.getElementById('checkAll');
const checkboxes = document.querySelectorAll('input[type="checkbox"][name="ids[]"]');

checkAll.addEventListener('change', () => {
    checkboxes.forEach((checkbox) => {
        checkbox.checked = checkAll.checked;
    });
});
</script>