<?php
    use App\User;
    use Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')

@section('content')
    <div>
        <?php
            $dec = explode('.',$user->total);
            $valordec = (int)$dec[1];
            $valorsindecimales = str_replace(',','',$dec[0]);
            $valorsindecimales = str_replace('$','',$valorsindecimales);
            $valorsindecimales = str_replace(' ','',$valorsindecimales);
            $valorent = (int)$valorsindecimales;
            $valor = $valorent.'.'.$valordec;
        ?>
        <div class="text-center">
            <h1>Realizar Transferencia de Fondos</h1>
        </div>
        {!! Form::open([
            'route' => 'transfers.store'
        ]) !!}
        <div class="row">
            @if (isset($mensaje))
                <div class="col-12 text-center">
                    <h4 class="message_no_email">{{ $mensaje }}</h4>
                </div>
            @endif
            @if (isset($customer))
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="email" class="control-label">Correo del Usuario a Transferir:</label>
                    <input type="email" name="email" id="emailconsult" class="form-control" value="{{ $customer->email }}" disabled/>
                    </div>
                </div>
                <div class="col-12 col-sm-6 container_amount_transfer">
                    <div class="form-group">
                        {!! Form::label('amount_transfer', 'Agregar Cantidad de Fondos a Transferir:', ['class' => 'control-label']) !!}
                        <input type="text" id="amount_transfer" name="amount_transfer" class="form-control" onBlur="revisarTotal(this.value);">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <input type="hidden" name="customer_id_transfer" id="customer_id_transfer" value="{{ $customer->id }}">
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="email" class="control-label">Consulte el Correo del Usuario a Transferir:</label>
                        <input type="email" name="email" id="emailconsult" class="form-control" onBlur="seleccionar(this.value);"/>
                    </div>
                </div>
            @endif
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
            $jq('#tab7').addClass('active');
             $jq('#amount_transfer').inputmask('currency', {
                'alias': 'numeric',
                'groupSeparator': ',',
                'autoGroup': true,
                'digits': 0,
                'digitsOptional': false,
                'prefix': '$ ',
                'placeholder': '0'
            });
        });
        function seleccionar(value){
            if (window.location.href.indexOf("searchEmail") > -1) {
                var ruta = value;
                $("#enlace").attr('href', ruta);
            }else{
                var ruta = 'searchEmail/'+ value;
                $("#enlace").attr('href', ruta);
            }
        }
        function revisarTotal(valor){
            var tiene = '<?php echo $valor; ?>'
            valor = valor.replace('$', '');
            valor = valor.replace(/ /g, "");
            valor = valor.replace(',', '');
            valor = valor.substring(0,valor.length-3),
            valor = parseFloat(valor);
            tiene = parseFloat(tiene);
            if(tiene>=valor){
                document.getElementById('btn_transfer').disabled = false;
            }else{
                alert('Los Fondos son menores al valor a transferir, por favor pruebe con un valor inferior.')
            }
        }
    </script>
@stop
