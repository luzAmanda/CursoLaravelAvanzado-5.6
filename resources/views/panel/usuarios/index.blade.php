@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios  
                    <a title="Nuevo Usuario" data-toggle="modal" data-target="#modalCreate" 
                        href="#" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                </div>
                <div class="card-body">
                    @include('includes.messages')
                    @include('panel.usuarios.create')
                    @include('panel.usuarios.edit')
                <div class="table-responsive">
                    {{$usuarios->links()}}
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Fecha Creación</th>
                        <th scope="col">Última Actualización</th>
                        <th scope="col">Rol</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $u)
                            <tr>
                                <th scope="row">{{$u->name}}</th>
                                <td>{{$u->email}}</td>
                                <td>{{$u->created_at}}</td>
                                <td>{{$u->updated_at}}</td>
                                <td>
                                    @foreach ($u->roles as $r)
                                        {{$r->display_name}}
                                    @endforeach
                                </td>
                                <td>
                                    <a title="Ver" href="{{route('usuarios.show',$u->id)}}" class="btn btn-info btn-xs"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
                                    <a title="Cambiar rol" data-toggle="modal" data-target="#modalEdit" 
                                    data-name="{{$u->name}}" data-email="{{$u->email}}" 
                                    data-rol="{{count($u->roles)== 0 ?: $u->roles[0]->id}}" 
                                    href="#" data-action="{{route('usuarios.update',$u->id)}}"
                                    class="btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{$usuarios->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@prepend('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#modalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var name = button.data('name');
            var email = button.data('email');
            var idRol = button.data('rol');
            var modal = $(this);
            modal.find(".modal-content #name").val(name);
            modal.find(".modal-content #email").val(email);
            modal.find(".modal-content #idRol").val(idRol);
            modal.find(".modal-content form").attr('action', action);
        });
    });
</script>
@endprepend