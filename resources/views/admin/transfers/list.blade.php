<?php
    use App\Transfer;
    use App\User;
?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Listado de Transferencias Realizadas</h1>
        </div>
        <div class="col-12">
            <div class="row justify-content-center pb-3">
                <a href="{{ URL::to('/admin/transfers/create') }}" class="btn btn-success">Agregar Transferencias</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-xs-1 text-center">ID</th>
                        <th class="col-xs-3">Transferido a</th>
                        <th class="col-xs-3">Cantidad de Fondos</th>
                        <th class="col-xs-3">Fecha y Hora</th>
                        @role('super-admin')
                            <th class="col-xs-2 text-center">Acciones</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transfer as $trans)
                        <tr>
                            <td class="text-center">{{ $trans['id'] }}</td>
                            <td>
                                <?php
                                    $customer = User::find($trans['customer_id_transfer']);
                                    echo $customer->email;
                                 ?>
                            </td>
                            <td>{{ $trans['amount_transfer'] }}</td>
                            <td>{{ $trans['created_at'] }}</td>
                            @role('super-admin')
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-primary" href="{{ url('/admin/transfers/'.$trans["id"].'/edit') }}">
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
            $jq('#tab7').addClass('active');
        });
    </script>
@stop
