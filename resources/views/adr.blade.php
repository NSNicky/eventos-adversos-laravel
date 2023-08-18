@extends('layouts/layout')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">APLICATIVO PARA EL REGISTRO Y GESTIÓN DE EVENTOS ADVERSOS</h6>
    </div>
    <div class="card-body">
        <h2>Consulta de Eventos Adversos</h2>
        <p>En esta página puedes consultar los registros de eventos adversos ingresados.</p>

        <form method="post" action="{{ route('eventos.consultar') }}">
            @csrf
            <label for="Fecha1">Desde:</label>
            <input type="text" class="day" id="Fecha1" name="Fecha1" value="{{ $anno }}-{{ $mes }}-{{ $dia }}" />
            <img src="Calendario/img.gif" alt="Calendario" id="CmdFecha1" class="button">

            <label for="Fecha2">Hasta:</label>
            <input type="text" class="day" id="Fecha2" name="Fecha2" value="{{ $anno }}-{{ $mes }}-{{ $dia }}" />
            <img src="Calendario/img.gif" alt="Calendario" id="CmdFecha2" class="button">
            
            <label for="Centro">Unidad de atención:</label>
            <select name="Centro" id="Centro">
                <option value="">Todas las unidades de atención</option>
                @foreach ($centros as $centro)
                    <option value="{{ $centro->Codigo_centro }}">{{ $centro->Centro_de_Atencion }}</option>
                @endforeach
            </select>
            
            <label for="Responsable">Personal responsable:</label>
            <select name="Responsable" id="Responsable">
                <option value="">Todo el personal institucional</option>
                @foreach ($personal as $persona)
                    <option value="{{ $persona->Numero_identificacion_personal  }}">{{ $persona->Nombres_personal }} {{ $persona->Apellidos_personal }}</option>
                @endforeach
            </select>
            
            <label for="Servicio">Servicio:</label>
            <select name="Servicio" id="Servicio">
                <option value="">Todos los servicios</option>
                @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->Codigo_servicio }}">{{ $servicio->Servicio }}</option>
                @endforeach
            </select>

            <input type="submit" value="Consultar" class="botones">
        </form>
    </div>
</div>


@endsection