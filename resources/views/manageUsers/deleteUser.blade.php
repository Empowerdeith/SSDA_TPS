@extends('index.index_sidebar')
@section('content_home')
    <section class="vh-75" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 32px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 blue_tps">¿Esta Seguro que quiere eliminar este usuario?</p>
                                <form class="mx-1 mx-md-4" action="{{route('deleteUser', $user->id)}}" method="POST" onsubmit="return confirm('Pero realmente esta seguro de eliminar el usuario?')">
                                    @csrf
                                    <div class="form-outline flex-fill mb-0">
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Borrar</button>
                                        </div>
                                    </div>                             
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

