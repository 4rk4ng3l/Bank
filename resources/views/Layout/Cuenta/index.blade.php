@extends('Layout.mainlayout')


@section('title', 'Listado de Cuentas')

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
                                        aria-label="Name: activate to sort column ascending" style="width: 55.469px;">Id
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 264.641px;">
                                        Nombre</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 111.547px;">
                                        Balance</th>
                                    <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 50.4062px;">Acciones
                                    </th>

                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Id</th>
                                    <th rowspan="1" colspan="1">Nombre</th>
                                    <th rowspan="1" colspan="1">Balance</th>
                                    <th rowspan="1" colspan="1">Acciones</th>
                                </tr>
                            </tfoot> --}}
                            <tbody>
                                @foreach($cuentas as $cuenta)
                                <tr class="odd">
                                    <td class="">{{$cuenta->id}}</td>
                                    <td class="">{{$cuenta->nombre}}</td>
                                    <td class="">{{$cuenta->balance}}</td>
                                    <td class="">
                                        <a class="btn btn-info">Editar</a>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of
                            57 entries</div>
                    </div> --}}
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
    <a href="{{route('cuentas.create')}}" class="btn btn-primary">Crear</a>
</div>
</div>
@endsection