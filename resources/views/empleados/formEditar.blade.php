@extends('layouts.app2')

@section('content')
<div class="container">
    <h2 class="display-5">Editar empleado #{{ $empleado->id }}</h2>
    <form method="POST" action="{{ route('empleado.update', $empleado->id) }}">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="">Nombre *</label>
                <input type="text" class="form-control" name="nombre" value="{{ $empleado->nombre }}" required>
            </div>
            <div class="col-md-4">
                <label for="">Apellido *</label>
                <input type="text" class="form-control" name="apellido_paterno" value="{{ $empleado->apellido_paterno }}" placeholder="Apellido paterno" required>
            </div>
            <div class="col-md-4">
                <label for="">Teléfono Movil</label>
                <input type="text" class="form-control" name="telefono" value="{{ $empleado->telefono }}" placeholder="Teléfono Movil">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="">Correo *</label>
                <input type="email" class="form-control" name="correo"  value="{{ $empleado->correo }}" required>
            </div>
            <div class="col-md-4">
                <label for="">Tipo de contrato *</label>
                <input type="text" class="form-control" name="tipo_contrato"  value="{{ $empleado->tipo_contrato }}" required>
            </div>

        </div>
        <button class="btn btn-success btn-lg float-right">Modificar</button>
    </form>
</div>
@endsection
