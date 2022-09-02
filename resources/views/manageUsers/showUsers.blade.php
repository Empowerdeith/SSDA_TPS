<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('snippets.links')

</head>

<body id="show_body">
    @include('snippets.header')
    <section class="vh-75" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 32px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 blue_tps">Funcionarios TPS</p>
                                    <table table class="table table-striped" style="width:800px; text-align:center">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Rut</th>
                                                <th>Nombre Usuario</th>
                                                <th>Email</th>
                                                <th>Cargo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$user -> name}}</td>
                                                <td>{{$user -> rut}}</td>
                                                <td>{{$user -> username}}</td>
                                                <td>{{$user -> email}}</td>
                                                <td>{{$user -> cargo}}</td>
                                                <td><a href="{{route('updateUser', $user->id)}}">Ver usuario</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$users -> links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('snippets.footer2')
</body>

</html>


