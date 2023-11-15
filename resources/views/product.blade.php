<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="icon" href="{{asset('storage/images/logo.jpg')}}">
    <title>
        
    product
</title>
</head>
<body>
 <img src="{{asset('storage/images/logo.jpg')}}" alt="" height="200">
<div class="container">
<h2 class="text-center">Add Product</h2>
<form action="/product" method="post" enctype="multipart/form-data">
    @csrf
    <select name="category_id" class="form-control rounded-pill mb-4">
        <option value="">--select--</option>
        @foreach($category as $values)
        <option value="{{$values['id']}}">{{$values['name']}}</option>
        @endforeach
    </select>
    <input type="text" name="name" class="form-control rounded-pill mb-4" placeholder="name">
    <input type="text" name="price" class="form-control rounded-pill mb-4" placeholder="price">
    <input type="file" id="input-image" name="image" class="form-control rounded-pill mb-4">
    <input type="hidden" name="status" class="form-control rounded-pill mb-4">
    <input type="submit"  class="btn btn-primary rounded-pill"/>
    <!-- <img src="" id="preview-image" height="200"> -->
    <iframe src="" id="preview-image" height="200" frameborder="0"></iframe>
    <!-- <button type="submit" class="btn btn-primary rounded-pill">Add Product</button> -->
</form>

<br><br>
 @if(session('email'))
    <h1>{{session('email')}}</h1>
    @else
    GUEST
    @endif
<table class="table">
    <thead>
    <th>name</th>
    <th>price</th>
    <th>Image Name</th>
    <th>file size</th>
    <td>mime type</td>
    <th>image </th>
    
    </thead>
    <tbody>
        <tr>
            <td>
            <x-testcomponent pass="i,am test component but passing data" email="osama@gmail.com">
            <h6>i,am passing slot its working fine</h6>
            <x-slot name="image"><img src="{{ asset('homesite/image/l9.jpg') }}" height="100"></x-slot>
            <x-slot name="name"> i,am named slot osama Commando</x-slot>
        </x-testcomponent>
    </td>
    <td>@foreach($menuItems as $menuItemss)
{{$menuItemss->name}}
    @endforeach
    </td>
    </tr>
    @foreach($showproduct as $products)

    <tr>
    <td>{{$products->name}}</td>
    <td>{{$products->price}}</td>
    <td>{{$products->image}}</td>
    <td>{{$products->file_size}}</td>
    <td>{{$products->mime_type}}</td>
    <td>{{$products->created_at->diffForHumans()}}</td>
    <td>{{$products->created_at->format('F j, Y, g:i a')}}</td>
    <td>    <img src="{{ asset('homesite/image/' . $products->image) }}" height="100"></td>
    <!-- <td style="height: 100px;">
    @if(in_array($products->mime_type, ['image/jpeg', 'image/png']))
        <img src="{{ asset('homesite/image/' . $products->image) }}" height="inherit">
    @elseif(in_array($products->mime_type, ['application/octet-stream','application/pdf', 'text/html', 'text/plain']))
        <iframe src="{{ asset('storage/myyimages/' . $products->image) }}" height="100" frameborder="0"></iframe>
        @else
        <b>no image</b>
    @endif -->
</td>
<td><a href="{{url('down',$products->image)}}">download</a></td>
    <td><a href="{{ route('image.download', ['id' => $products->id]) }}">Download Image</a>
    <td><a href="{{url('updateproduct',$products->id)}}">Update</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@if(session('status'))
<h1>{{session('status')}}</h1>
@endif
</div>

</body>
</html>

<script>
   var inputimg=document.getElementById("input-image");
    var previewimg=document.getElementById("preview-image");
    inputimg.addEventListener("change",function(event){
if(event.target.files.length==0){
return;
}
else{
    var tmpUrl=URL.createObjectURL(event.target.files[0]);
    previewimg.setAttribute("src",tmpUrl);
}
    });

</script>