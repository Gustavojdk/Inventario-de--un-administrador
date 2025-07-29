@extends('layout')

@section('titulo', 'BorrarProducto')

@section('contenido')
    <h2 class="text-center mb-4">🗑️ Borrar productos</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    @if (count($productos) > 0)
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $index => $producto)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('images/' . $producto['imagen']) }}" width="70" alt="Imagen">
                        </td>
                        <td>{{ $producto['nombre'] }}</td>
                        <td>${{ number_format($producto['precio'], 2) }}</td>
                        <td>{{ $producto['tipo'] }}</td>
                        <td>{{ $producto['descripcion'] }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $index) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas borrar este producto?');">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No hay productos para mostrar.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">← Volver</a>
        <a href="{{ url('/panel') }}" class="btn btn-primary">🏠 Inicio</a>
    </div>
@endsection

