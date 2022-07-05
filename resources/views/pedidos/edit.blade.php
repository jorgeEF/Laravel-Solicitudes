@extends('layouts.app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        @can('pedido.create')
        <form action="{{ route('pedidos-update', ['id' => $pedido->id]) }}" method="POST">
            @method('PATCH')
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
              <label for="title" class="form-label">Título del pedido</label>
              <input type="text" name="title" class="form-control" value="{{ $pedido->title }}">
            </div>
            <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <input type="text" name="description" class="form-control" value="{{ $pedido->description }}">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad:</label>
                <input type="number" name="quantity" class="form-control" value="{{ $pedido->quantity }}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Actualizar pedido</button>
          </form>
          @endcan
    </div>
@endsection
