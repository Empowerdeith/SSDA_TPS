@if (isset($errors) && count($errors)>0)
    <div class="alert text-center" style="color:red;">
        <ul class="list-unstyled mb-0">
            @foreach ($errors-> all() as $error )
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
