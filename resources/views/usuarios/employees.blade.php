@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <div class="title_users_list text-center"><h3>Lista de Empleados</h3></div>
                <div class="card-body">
                    @role('super-admin')
                        <div class="row justify-content-center pb-3">
                            <a href="{{ url('/usuarios/create') }}" class="btn btn-success">Nuevo Empleado</a>
                        </div>
                    @endrole
                    <table class="table">
                        <thead>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha Registro</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $usuario)
                                @if($usuario->roles->implode('name', ', ')=='super-admin' || $usuario->roles->implode('name', ', ')=='moderador')
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->created_at }}</td>
                                        <td class="text-center">
                                            @can('update user')
                                                <a href="{{ url('/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('delete user')
                                                @include('usuarios.delete', ['usuario' => $usuario])
                                            @endcan
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab3').addClass('active');
        });
    </script>
@endsection
