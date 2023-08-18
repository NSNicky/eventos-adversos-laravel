@extends('layouts/layout')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">APLICATIVO PARA EL REGISTRO Y GESTIÓN DE EVENTOS ADVERSOS</h6>
    </div>

    <td>
</td>

    @if(count($eventos) > 0)
        <table>
            <tr>
                <th>Registro</th>
                <th>Fecha del evento</th>
                <th>Descripción del suceso</th>
                <th>Fecha de la mejora</th>
                <th>Unidad de atención</th>
                <th>Estado</th>
            </tr>
            @foreach($eventos as $evento)
                <tr>
                    <td><a href="{{ route('eventos.detalle', ['id' => $evento->Numero_registro]) }}">{{ $evento->Numero_registro }}</a></td>
                    <td>{{ $evento->Fecha_evento }}</td>
                    <td>{{ $evento->Descripcion_suceso }}</td>
                    <td>{{ $evento->Fecha_accion_correctiva }}</td>
                
                    <td>{{ $evento->Activo ? 'Cerrado' : 'Abierto' }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No se encontraron eventos para los criterios seleccionados.</p>
    @endif
@endsection