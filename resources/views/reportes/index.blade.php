@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang("messages.reports")</div>

                <div class="card-body">
                    <a title="Ver Reporte Usuarios PDF" target="_blank" href="{{route('reportes.usuarios')}}" class="btn btn-info btn-xs"><i class="fa fa-folder-open" aria-hidden="true"></i> Usuarios PDF</a>
                    <a title="Ver Reporte Usuarios Excel" href="{{route('reportes.usuarios.excel')}}" class="btn btn-info btn-xs"><i class="fa fa-folder-open" aria-hidden="true"></i> Usuarios EXCEl</a>
                    <a title="Ver Reporte Películas Excel" href="{{route('reportes.peliculas.excel')}}" class="btn btn-info btn-xs"><i class="fa fa-folder-open" aria-hidden="true"></i> Películas EXCEl</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection