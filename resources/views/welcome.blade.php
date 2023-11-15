<h1>@if(session('email'))
{{session('email')}}
@endif
</h1>
<x-layoutcom data="hello from welcome page">
    
    
        <span>i am alert</span>
        <span>i am alert</span>
        <br>
        <x-slot name="name">osama</x-slot>
        
</x-layoutcom>
<br><br>
<h1><a href="deletesession">delete</a></h1>
<x-checkcomponent pass="check component working perfectly">
    <h1 >check component for welcome page</h1>
    <x-slot name="forwelcome">Named slot working</x-slot>
</x-checkcomponent>
<h1>{{abcd()}}</h1>
<h1>{{func()}}</h1>
<h1>{{helper::abc()}}</h1>
{{help::ohh()}}
<h3>{{xyz("xyz parameter")}}</h3>

<h1>{{helper::ohh()}}</h1>
<h1>{{helper::helperFun()}}</h1>
<h1>{{abcd()}}</h1>