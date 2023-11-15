<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="icon" href="{{asset('storage/images/logo.jpg')}}">
    <title>Update product</title>
</head>
<body>
 <img src="{{asset('storage/images/logo.jpg')}}" alt="" height="200">
<div class="container">
<h2 class="text-center">Update Product</h2>
<form action="/updateproduct/{{$findproduct->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <select name="category_id" class="form-select form-control" aria-label="Default select example">
<option value="" selected>--select---</option>
@foreach($showcat as $items)
<option value="{{$items->id}}"
{{old('category_id',$findproduct->category_id)==$items->id ? 'selected' : ''}}>
{{$items->name}}
</option>
@endforeach
</select>

    <input type="text" name="name" value="{{old('name',$findproduct->name)}}" class="form-control rounded-pill mb-4" placeholder="name">
    <input type="text" name="price" value="{{old('price',$findproduct->price)}}" class="form-control rounded-pill mb-4" placeholder="price">
    <input type="file" name="imagee" class="form-control rounded-pill mb-4">
    <input type="hidden" name="status"  class="form-control rounded-pill mb-4">
    <input type="submit" class="btn btn-primary rounded-pill" value="Update Product"/>
    <!-- <button type="submit" class="btn btn-primary rounded-pill">Add Product</button> -->
</form>

<br><br>


</div>

</body>
</html>