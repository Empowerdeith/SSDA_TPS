    
<div class="alert alert-light" role="alert">
 
    @if(session()->has('success'))
        {{session()->get('success')}}
    @endif

    @if(session()->has('danger'))
        {{session()->get('danger')}}
    @endif

    @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif
</div>  