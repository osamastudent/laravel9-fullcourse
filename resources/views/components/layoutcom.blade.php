<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
</head>
<body>
<h1>pakistan</h1>
    {{$slot}}
    
    @if(isset($name))
    {{$name}}
    @else
    @endif



    @if(isset($email))
    {{$email}}
    @else
    @endif

    {{$myown}}

    
</body>
</html>