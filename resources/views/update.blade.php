<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>update</title>
</head>
<body>
<div class="container">
<h1>Update form</h1>
<form action="{{url('update',$find->id)}}" method="post" enctype="multipart/form-data" novalidate>
    @csrf
<input type="text" name="name" value="{{old('name',$find->name)}}" class="form-control" placeholder="name"><br>
@error('name')
{{$message}}
<br>
@enderror
<br>


<input type="email" id="email" name="email" value="{{old('email',$find->email)}}"  class="form-control" placeholder="email"><br>
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
<label class="btn" for="userimage" id="userimage">Photo</label>
@error('userimage')
{{$message}}
@enderror
<input type="submit" name="" >
</form>
<b id="oldimage">old image</b>
<img src="{{asset('storage/'. $find->userimage)}}"  height="70">
<b id="newimage"></b>
<img src="" id="previewImage" height="70">
@if(session('status'))
<h1>
{{session('status')}}
</h1>
@endif


</body>
</html>
<script>
var inputimg=document.getElementById('userimage');
var previewimage=document.getElementById('previewImage');

inputimg.addEventListener('change',function(event){
if(event.target.files.length==0){
return;
}
else{
var url=URL.createObjectURL(event.target.files[0]);
document.getElementById('newimage').innerText="new image";
previewimage.setAttribute('src',url);
}

});
</script>