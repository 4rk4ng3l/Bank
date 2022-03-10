@extends('Layout.mainlayout')


@section('title', 'Crear Cuenta')

@section('content')

<div class="container H-100">
<div class="text-center justify-content-center">
    <H1>BANK OF AMERICA</H1>
    <div class="row justify-content-center" >
        <div class="col-lg-8">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
                </div>
                <form class="user" method="POST" action="/cuenta">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" id="dni" name="dni" value="{{auth()->user()->dni}}">
                    </div>
                    @error('dni')
                        <p class="border border-red-500 rounded-md bg-red-100 w-full
                        text-red-600 p-2 my-2">* {{ $message }}</p>
                    @enderror
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="name" name="nombre" required
                                placeholder="Nombre de la cuenta">
                        </div>
                    </div>
                    @error('nombre')
                        <p class="border border-red-500 rounded-md bg-red-100 w-full
                        text-red-600 p-2 my-2">* {{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <input type="number" min="0" max="9999999999" class="form-control form-control-user" id="balance"
                            name="balance" required
                            placeholder="Cantidad inicial">
                    </div>
                    @error('balance')
                        <p class="border border-red-500 rounded-md bg-red-100 w-full
                        text-red-600 p-2 my-2">* {{ $message }}</p>
                    @enderror


                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Crear cuenta
                    </button>
                    <div id="cancelar" class="btn btn-danger btn-user btn-block">
                        <a href="{{route('cuenta.index')}}" class="text-white">Cancelar</a>
                    </div>

                </form>
                <hr>
                @isset($status)
                    <div class="alert alert-success" role="alert">
                        La cuenta ha sido creada!.
                    </div>
                @endisset

            </div>
        </div>
    </div>
</div>
</div>
@endsection
