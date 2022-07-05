@extends('layouts.app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        @can('pedido.create')
        <form action="{{ route('pedidos') }}" method="POST">
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <h2>Nuevo Pedido</h2>

            <div class="mb-3">
                <label for="title" class="form-label">Título del pedido:</label>
                <input type="text" name="title" class="form-control">

                <label for="description" class="form-label">Descripción:</label>
                <input type="text" name="description" class="form-control">

                <label for="quantity" class="form-label">Cantidad:</label>
                <input type="number" name="quantity" class="form-control">

                <label for="category_id" class="form-label">Categoría del pedido</label>
                <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Crear nuevo pedido</button>
        </form>
        @endcan
    </div>
@endsection
