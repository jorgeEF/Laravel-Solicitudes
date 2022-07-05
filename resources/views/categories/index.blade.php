@extends('layouts.app')

@section('content')
    <div class="container bg-light p-4 mt-4">
        @can('category.create')
        <div align="center"><a class="btn btn-success" href="{{route('categories-create')}}" role="button">Nueva categoría</a></div>
        <br>
        @endcan
        <h2 align="center">Listado de Categorías</h2>
        <br>
        <div>
            <table class="table table-sm table-light table-hover table-borderless">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">Nombre de categoría</th>
                    <th scope="col" class="text-center">Administrar</th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                <tbody>
                    <tr>
                    <td class="text-center">{{ $category->name }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                        @can('category.create')
                        <a class="btn btn-secondary btn-sm mx-1" href="{{ route('categories-edit', ['id' => $category->id]) }}">Editar</a>
                        <form action="{{ route('categories-destroy', [$category->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm mx-1">Eliminar</button>
                        </form>
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
