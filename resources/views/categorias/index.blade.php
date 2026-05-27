@extends('layouts')
@section('title', 'Categorías')
@section('content')
    <h3>Listado de Categorías</h3>
    <a href="{{ url('/categorias/create') }}" class="btn btn-success mb-3">Crear Nueva Categoría</a>
    @if(session('type') == 'success')
        <div class="alert alert-{{ session('type')}} alert-dismissible fade show" role="alert">
            <strong>Noticia:</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <a href="{{ url('/categorias/' . $categoria->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ url('/categorias/' . $categoria->id . '/edit') }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('/categorias/' . $categoria->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                        <img src="{{ url('img/loading.gif') }}" alt="Cargando..." id="loading" style="display:none; width: 25px; height: 25px;">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop()
