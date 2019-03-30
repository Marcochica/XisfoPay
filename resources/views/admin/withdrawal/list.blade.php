<?php
    use App\Withdrawal;
    use App\User;
?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Listado de Retiros Realizados</h1>
        </div>
        <div class="col-12">
            <div class="row justify-content-center pb-3">
                <a href="{{ URL::to('/admin/withdrawal/create') }}" class="btn btn-success">Solicitar Retiro</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-xs-1 text-center">ID</th>
                        @role('super-admin')
                            <th class="col-xs-3">Cliente</th>
                        @endrole
                        <th class="col-xs-3">Cantidad de Fondos Retirados</th>
                        <th class="col-xs-3">Fecha y Hora</th>
                        @role('super-admin')
                            <th class="col-xs-2 text-center">Acciones</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($withdrawal as $w)
                        <tr>
                            <td class="text-center">{{ $w['id'] }}</td>
                            @role('super-admin')
                                <td>
                                    <?php
                                        $customer = User::find($w['customer_id_transfer']);
                                        echo $customer->email;
                                    ?>
                                </td>
                            @endrole
                            <td>{{ $w['amount_transfer'] }}</td>
                            <td>{{ $w['created_at'] }}</td>
                            @role('super-admin')
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-primary" href="{{ url('/admin/withdrawal/'.$w["id"].'/edit') }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab8').addClass('active');
        });
    </script>
@stop
