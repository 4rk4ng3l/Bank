@extends('Layout.mainlayout')

@section('title', 'Listado de Transferencias')

@section('content')
<div class="container H-100">
<div class="text-center justify-content-center">
    <H1>Listado de Cuentas</H1>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="dataTable_length"><label>Mostrar <select name="dataTable_length"
                                    aria-controls="dataTable"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entradas</label></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Name: activate to sort column ascending" style="width: 50px;">Id Transferencia
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 200px;">
                                        Cuenta Origen</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 111.547px;">
                                        Cuenta destino</th>
                                    <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 60px;">Valor
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transferencias as $transferencia)
                                <tr class="odd">
                                    <td class="">{{$transferencia->id}}</td>
                                    <td class="">{{$transferencia->idCuentaOrigen}}</td>
                                    <td class="">{{$transferencia->idCuentaDestino}}</td>
                                    <td class="">{{$transferencia->valor}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#"
                                        aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                        class="page-link">Anterior</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable"
                                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                        aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Siguiente</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('cuenta.create')}}" class="btn btn-primary">Crear</a>
</div>
</div>
@endsection
