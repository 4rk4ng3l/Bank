@extends('Layout.mainlayout')


@section('title', 'Register')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
                        </div>
                        <form class="user" method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <input type="number" min="0000" max="9999" class="form-control form-control-user" id="dni" name="dni"
                                    placeholder="Numero de documento" required>
                            </div>
                            @error('dni')
                                <p class="border border-red-500 rounded-md bg-red-100 w-full
                                text-red-600 p-2 my-2">* {{ $message }}</p>
                            @enderror
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" required
                                        placeholder="Nombre">
                                </div>
                            </div>
                            @error('name')
                                <p class="border border-red-500 rounded-md bg-red-100 w-full
                                text-red-600 p-2 my-2">* {{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" required
                                    placeholder="Email Address">
                            </div>
                            @error('email')
                                <p class="border border-red-500 rounded-md bg-red-100 w-full
                                text-red-600 p-2 my-2">* {{ $message }}</p>
                            @enderror

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" required
                                        id="InputPassword" name="password" placeholder="password">
                                </div>
                                @error('password')
                                    <p class="border border-red-500 rounded-md bg-red-100 w-full
                                    text-red-600 p-2 my-2">* {{ $message }}</p>
                                @enderror

                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="repeatPassword" name="password_confirmation" placeholder="Repeat Password">
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Registrar Usuario
                            </button>
                            {{-- <a href="" class="btn btn-primary btn-user btn-block">
                                Registrar Cuenta
                            </a> --}}
                            <hr>
                            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> --}}
                        </form>
                        <hr>
                        {{-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div> --}}
                        <div class="text-center">
                            <a class="small" href="{{route('login.index')}}">Tiene una cuenta? Ingresar!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
