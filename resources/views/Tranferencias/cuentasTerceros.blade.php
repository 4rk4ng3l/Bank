@extends('Layout.mainlayout')


@section('title', 'Transferencias a cuentas terceros')

@section('content')

<div class="container H-100">
<div class="text-center justify-content-center">
    <H1>Transferencias a cuentas de terceros</H1>
    <div class="row justify-content-center" >
        <div class="col-lg-8">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Seleccione las cuentas</h1>
                </div>
                <form class="user" method="POST" action="{{route('transferencia.guardarTerceros')}}">
                    @csrf
                    @if(count($cuentasOrigen)>0 && count($cuentasTerceros)>0)
                    <div>Cuenta Origen</div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <select class="form-control" name="idCuentaOrigen" id="idCuentaOrigen" required>
                                <option value="">Seleccione la cuenta origen</option>
                                @isset($cuentasOrigen)
                                    @foreach($cuentasOrigen as $cuenta)
                                    <option value="{{ $cuenta->id }}">{{ $cuenta->nombre }}  </option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <select class="form-control" name="idCuentaDestino" id="idCuentaDestino" required>
                                <option value="">Selecione la cuenta destino</option>
                                @isset($cuentasTerceros)
                                    @foreach($cuentasTerceros as $cuenta)
                                    <option value="{{ $cuenta->id }}">{{ $cuenta->nombre . ' | ' . $cuenta->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="number" maxlength="12 min="1" pattern="^[0-9]+" class="form-control form-control-user" id="valor" name="valor" required
                                placeholder="Valor a Transferir">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Tranferir
                    </button>
                    <div id="cancelar" class="btn btn-danger btn-user btn-block">
                        <a href="/" class="text-white">Cancelar</a>
                    </div>
                    @else
                        <H1>No dispone de suficientes cuentas!.</H1>
                    @endif
                </form>
                <hr>
                @isset($status)
                    <div class="alert alert-success" role="alert">
                        {{$status}}
                    </div>
                @endisset

            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('aditionalScripts')
<script src="{{asset('js/transferenciasPropias.js')}}"></script>
@endsection
