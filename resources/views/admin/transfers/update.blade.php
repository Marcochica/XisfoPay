<?php
    use App\User;
?>
@extends('layouts.app')

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Editar Transferencias Agregados</h1>
            </div>
            <div class="col-md-12">
                <div class="">
                    <div class="card-body">
                        <form action="{{ route('transfers.update', $transfer->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('customer_id', 'Nombre Cliente:', ['class' => 'control-label']) !!}
                                        <?php
                                            $customers = User::findOrFail($transfer->customer_id_transfer); ?>
                                            <input type="text" id="name_customer" name="name_customer" class="form-control" value="<?php echo $customers->email; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="amount_credits">Agregar Cantidad de Fondos</label>
                                        <input type="text" id="amount_credits" name="amount_credits" class="form-control" required value="{{ $transfer->amount_transfer }}">
                                        <small class="add_point">"Para agregar decimales por favor digite el punto (<b>.</b>) y luego agregue la cifra"</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="state">Estado</label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="0" <?php if($transfer->state==0){ echo "selected"; } ?>>No Aprobado</option>
                                            <option value="1" <?php if($transfer->state==1){ echo "selected"; } ?>>Aprobado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 text-center">
                                    <div class="justify-content-center">
                                        <input type="hidden" id="customer_id" name="customer_id" value="{{ $transfer->customer_id }}">
                                        <input type="submit" value="Guardar" class="btn btn-primary">
                                    </div>
                                </div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.6/jquery.inputmask.bundle.min.js"></script>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab7').addClass('active');
            $jq('#amount_credits').inputmask('currency', {
                'alias': 'numeric',
                'groupSeparator': ',',
                'autoGroup': true,
                'digits': 0,
                'digitsOptional': false,
                'prefix': '$ ',
                'placeholder': '0'
            });
        });
    </script>
@endsection
