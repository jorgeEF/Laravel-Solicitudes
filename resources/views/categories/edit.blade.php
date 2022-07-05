@extends('layouts.app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        @can('category.create')
        <form action="{{ route('categories-update', ['id' => $category->id]) }}" method="POST">
            @method('PATCH')
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
              <label for="name" class="form-label">Nombre de categoría</label>
              <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Actualizar categoría</button>
          </form>
          @endcan
    </div>
@endsection
