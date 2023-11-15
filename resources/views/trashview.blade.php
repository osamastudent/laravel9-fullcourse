<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('storage/images/lSRIzP2O3aEnNujM7TqzQA36c4Mtnnw3TSN5Ee6x.jpg')}}">
  
    <title>Trash</title>
</head>
<body>
    <div class="container">
    <h1 class="text-center">Trash data</h1>
    <table class="table">
<thead>
<th>index</th>
<th>name</th>
<th>Actions</th>
</thead>
<tbody>
    <form action="/restoreselected" method="post">
        @csrf
@php
$key=1;
@endphp
    @foreach($showtrashdata as $values)
  
<tr>
    <td>{{$key++}}</td>
<td>{{$values->name}}</td>
<td><a href="{{url('restore',$values->id)}}">restore</a></td>
<td><input type="checkbox" name="ids[]" value="{{$values->id}}" ></td>
<td><a href="{{url('deletepremenentfromrestore',$values->id)}}">deletepremenent</a></td>
</tr>

@endforeach
<tr>
    <td><button type="submit" >restore selected</button></td>
    <td><a href="restoreall">restore All</a></td>
    
</tr>
</form>
</tbody>
    </table>
    </div>
</body>
</html>