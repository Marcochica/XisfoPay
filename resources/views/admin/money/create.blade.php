<?php
	use App\User;
?>
@extends('layouts.app')


@section('content')
    <div class="text-center">
        <h1>Agregar Fondos</h1>
    </div>
    {!! Form::open([
		'route' => 'money.store'
	]) !!}
    <div class="row">
		<div class="col-12 col-sm-6">
            <div class="form-group">
                {!! Form::label('customer_id', 'Nombre Cliente:', ['class' => 'control-label']) !!}
				<select class="form-control" name="customer_id">
                    <?php
                        $customers = User::get();
						foreach( $customers as $objeto){ ?>
							<option value="<?php echo $objeto['id']; ?>"><?php echo $objeto['name']." ".$objeto['middlename']." ".$objeto['lastname']." ".$objeto['surname']; ?></option>
					<?php } ?>
				</select>
            </div>
        </div>
        <div class="col-12 col-sm-6 amount_credits">
            <div class="form-group">
                {!! Form::label('amount_credits', 'Agregar Cantidad de Fondos:', ['class' => 'control-label']) !!}
                <input class="form-control number" id="amount_credits" name="amount_credits" required>
                <small class="add_point">"Para agregar decimales por favor digite el punto (<b>.</b>) y luego agregue la cifra"</small>
            </div>
        </div>
        <div class="col-12 text-center">
            <div class="justify-content-center">
                {!! Form::submit('Guardar Fondos', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.6/jquery.inputmask.bundle.min.js"></script>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab6').addClass('active');
            $jq('#amount_credits').inputmask('currency', {
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
