@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="title_users_list text-center"><h3>Nuevo Usuario</h3></div>
            <div class="card-body">
                <form action="{{ url('usuarios') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            @if (isset($roles))
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <select class="form-control" name="rol">
                                        @foreach ($roles as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 text-center">
                            <div class="justify-content-end">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab5').addClass('active');
        });
    </script>
@stop
