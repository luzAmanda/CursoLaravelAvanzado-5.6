<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios PDF</title>
    <style>
        .title{
            color:red;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="title">Listado de Usuarios</h2>
    <table border="1">
        <thead>
            <tr>
                 <th>Nombre</th>
                <th>E-mail</th>
                <th>Fecha Creación</th>
                 <th>Última Actualización</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
                <tr>
                    <th>{{$u->name}}</th>
                    <td>{{$u->email}}</td>
                    <td>{{$u->created_at}}</td>
                    <td>{{$u->updated_at}}</td>
                    <td>
                        @foreach ($u->roles as $r)
                            {{$r->display_name}}
                        @endforeach
                    </td>
            </tr>
            @endforeach
          </tbody>
        </table>
</body>
</html>