@extends('layout')

@section('titulo', 'Editar Productos')

@section('contenido')
<h2 class="text-center mb-4">Productos Registrados</h2>

<table class="table table-bordered w-75 mx-auto">
    <thead class="thead-dark text-center">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach($productos as $index => $producto)
        <tr>
            <td><img src="{{ asset('images/' . $producto['imagen']) }}" alt="Imagen" style="width: 80px; height: 80px;"></td>
            <td>{{ $producto['nombre'] }}</td>
            <td>${{ number_format($producto['precio'], 2) }}</td>
            <td>{{ $producto['tipo'] }}</td>
            <td>{{ $producto['descripcion'] }}</td>
            <td>
                <a href="{{ route('productos.editar.formulario', ['index' => $index]) }}" class="btn btn-warning btn-sm">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<center>
    <a href="{{ url('/panel') }}" class="btn btn-secondary mt-4">← Volver al panel</a>
</center>
@endsection
