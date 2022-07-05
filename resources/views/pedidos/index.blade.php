@extends('layouts.app')

@section('content')
    <div class="container bg-light p-4 mt-4">
        @can('pedido.create')
        <div align="center"><a class="btn btn-success" href="{{route('pedidos-create')}}" role="button">Nuevo pedido</a></div>
        <br>
        @endcan

        <h2 align="center">Listado de Pedidos</h2>
        <div class="d-flex justify-content-center">
            <p align="center"><strong>Filtrar:</strong></p>
            <div align="center"><a class="btn btn-primary btn-sm mx-1" href="/pedidos" role="button">Todos</a></div>
            <div align="center"><a class="btn btn-warning btn-sm mx-1" href="?status=generado" role="button">Generados</a></div>
            <div align="center"><a class="btn btn-success btn-sm mx-1" href="?status=con%20expediente" role="button">Con Expediente</a></div>
            <div align="center"><a class="btn btn-danger btn-sm mx-1" href="?status=rechazado" role="button">Rechazados</a></div>

            <div class="d-flex input-group-sm mb-3 mx-1">
                <input type="text" name="btnSearch" id="btnSearch" class="form-control" placeholder="expediente...">
                <a class="btn btn-outline-secondary" onClick="buscar()" role="button" type="submit">buscar</a>
            </div>
            <script>
            function buscar(){
                var searchInput = document.getElementById('btnSearch').text();
                var url = "/pedidos?search=" + searchInput;
                window.open(url);
            }
            </script>
        </div>
        <div>
            <table class="table table-sm table-light table-hover table-borderless">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">Pedido</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">Creado por</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Aprobado por</th>
                    <th scope="col" class="text-center">Expediente</th>
                    <th scope="col" class="text-center">Administrar</th>
                    </tr>
                </thead>
                @foreach ($pedidos as $pedido)
                <tbody>
                    <tr>
                    <td class="text-center"> {{ $pedido->title }} </th>
                    <td class="text-center"> {{ $pedido->quantity }} </td>
                    <td class="text-center"> {{ $pedido->created_by }} </td>
                    <td class="text-center"> {{ $pedido->status }} </td>
                    <td class="text-center"> {{ $pedido->approved_by }} </td>
                    <td class="text-center"> {{ $pedido->tracking_no }} </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                        @can('pedido.create')
                        <a class="btn btn-secondary btn-sm mx-1" href="{{ route('pedidos-edit', ['id' => $pedido->id]) }}">Editar</a>
                        <form action="{{ route('pedidos-destroy', [$pedido->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm mx-1">Eliminar</button>
                        </form>
                        @endcan
                        @can('pedido.manage')
                        @if ($pedido->status == 'generado')
                            <form action="{{ route('pedidos-approve', [$pedido->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm mx-1">Aprobar</button>
                            </form>
                            <form action="{{ route('pedidos-reject', [$pedido->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm mx-1">Rechazar</button>
                            </form>
                        @endif
                        @endcan
                        </div>
                    </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
