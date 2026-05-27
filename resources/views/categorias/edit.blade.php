@extends('layouts')
@section('title', 'Crear Nueva Categoría')
@section('content')
    <h3>Crear Nueva Categoría</h3>
    <form action="{{ url('/categorias') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre categoria" name="nombre" value="{{ old('nombre', $datos->nombre ?? '') }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row">
            <div class="col-md-">
                <input type="text" name="descripcion" class="form-control" placeholder="Descripción" value="{{ old('descripcion', $datos->descripcion ?? '') }}">
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror   
            </div>
        </div>
        <button class="btn btn-primary">Guardar</button>
        <a href="{{ url('/categorias') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @session('js')
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{ url('js/jquery.validate.min.js')}}"></script>
   <script src="{{ url('js/localization/messages_es.min.js')}}"></script>

   <script>
        $("#form").validate({
          rules: {
            nombre: {
              required: true,
              maxlength: 50
            },
            descripcion: {
              required: true,
              maxlength: 150
            }
          }
        });

    </script>

@stop() 