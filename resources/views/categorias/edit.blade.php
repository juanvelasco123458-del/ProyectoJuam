@extends('layout')
@section('title','Editar Categoria')
@section('content')
    <h3 class="mt-4 mb-3">Editar Categoria</h3>
    <form id="form" action="{{ route('categorias.update', $datos->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" value="{{ old('nombre', $datos->nombre) }}">
                @error('nombre')
                    <div class="error compacto col-lg-5">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripción" value="{{ old('descripcion', $datos->descripcion) }}">
                @error('descripcion')
                    <div class="error compacto col-lg-5">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('categorias') }}" class="btn btn-secondary">Cancelar</a>        
    </form>
@stop()
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/localization/messages_es.min.js') }}"></script>

    <script>
        $("#form").validate({
            rules: {
                nombre: {
                    required: true,
                    maxlength: 50
                },
                descripcion: {
                    required: true,
                    maxlength: 50
                }
            }
        });
    </script>
@stop()