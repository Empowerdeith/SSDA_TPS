    
<div class="alert alert-light" role="alert">
 
    @if(session()->has('success'))
        {{session()->get('success')}}
    @endif

    @if(session()->has('successReg'))
        {{session()->get('successReg')}}
    @endif

</div>  