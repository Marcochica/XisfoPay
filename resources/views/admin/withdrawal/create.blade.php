<?php
    use App\User;
    use Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')

@section('content')
    <div>
        <?php
            /*$dec = explode('.',$user->total);
            $valordec = (int)$dec[1];
            $valorsindecimales = str_replace(',','',$dec[0]);
            $valorsindecimales = str_replace('$','',$valorsindecimales);
            $valorsindecimales = str_replace(' ','',$valorsindecimales);
            $valorent = (int)$valorsindecimales;
            $valor = $valorent.'.'.$valordec;*/
        ?>
        <div class="text-center">
            <h1>Realizar Retiro de Fondos</h1>
        </div>
        {!! Form::open([
            'route' => 'withdrawal.store'
        ]) !!}
        <div class="row">
            @if (isset($mensaje))
                <div class="col-12 text-center">
                    <h4 class="message_no_email">{{ $mensaje }}</h4>
                </div>
            @endif
            <div class="col-12 text-center">
                <h4 class="message_no_email">Esta es la cantidad de fondos disponibles que puede retirar {{ $user->total }}</h4>
            </div>
            <div class="col-12 col-sm-6 container_amount_withdrawal">
                <div class="form-group">
                    {!! Form::label('amount_withdrawal', 'Agregar Cantidad de Fondos a Retirar:', ['class' => 'control-label']) !!}
                    <input type="text" id="amount_withdrawal" name="amount_withdrawal" class="form-control" onBlur="revisarTotal(this.value);">
                    <small class="add_point">"Para agregar decimales por favor digite el punto (<b>.</b>) y luego agregue la cifra"</small>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <input type="hidden" name="customer_id" id="customer_id" value="{{ $user->id }}">
                </div>
            </div>
            <div class="col-12 text-center">
                @if (isset($customer))
                    <div class="justify-content-center btn_transferir">
                        {!! Form::submit('Transferir', ['class' => 'btn btn-primary','id' => 'btn_transfer','disabled']) !!}
                    </div>
                @else
                    <div class="justify-content-center btn_consultar">
                        <a id="enlace" class="enlace btn-primary" name="enlace" href="">Consultar</a>
                    </div>
                @endif
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.6/jquery.inputmask.bundle.min.js"></script>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab8').addClass('active');
             $jq('#amount_withdrawal').inputmask('currency', {
                'alias': 'numeric',
                'groupSeparator': ',',
                'autoGroup': true,
                'digits': 2,
                'digitsOptional': false,
                'prefix': '$ ',
                'placeholder': '0'
            });
        });
    </script>
@stop
