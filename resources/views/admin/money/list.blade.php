<?php
    use App\Money;
    use App\User;
?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Listado de Fondos Agregados</h1>
        </div>
        <div class="col-12">
            <div class="row justify-content-center pb-3">
                <a href="{{ URL::to('/admin/money/create') }}" class="btn btn-success">Agregar Fondos</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-xs-1 text-center">ID</th>
                        <th class="col-xs-4">Cliente</th>
                        <th class="col-xs-2">Cantidad de Fondos</th>
                        <th class="col-xs-2">Fecha y Hora</th>
                        <th class="col-xs-1">Estado</th>
                        <th class="col-xs-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($money as $mon)
                        <tr>
                            <td class="text-center">{{ $mon->id }}</td>
                            <td>
                                <?php
                                    $customers = User::findOrFail($mon->customer_id);
                                    echo $customers->name." ".$customers->middlename." ".$customers->lastname." ".$customers->surname;
                                ?>
                            </td>
                            <td>{{ $mon->amount_credits }}</td>
                            <td>{{ $mon->created_at }}</td>
                            <td>
                                @if($mon->state==0)
                                    No Aprobado
                                @else
                                    Aprobado
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a class="btn btn-primary" href="{{ url('/admin/money/'.$mon->id.'/edit') }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab6').addClass('active');
        });
    </script>
@stop
