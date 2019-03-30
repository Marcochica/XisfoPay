@extends('layouts.app')

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <div class="card-body">
                        <form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 tipo_persona">
                                    <div class="row">
                                        <div class="col-12 text-center choose_type">
                                            <label>Escoja Tipo de Persona</label>
                                        </div>
                                        <div class="col-6 col-sm-6 text-right">
                                            <div class="form-check">
                                            <input class="form-check-input t_user" type="radio" name="type_user" id="type_user1" value="pn" checked>
                                            <label class="form-check-label" for="type_user1">
                                                Persona Natural
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6 text-left">
                                            <div class="form-check">
                                            <input class="form-check-input t_user" type="radio" name="type_user" id="type_user2" value="pj">
                                            <label class="form-check-label" for="type_user2">
                                                Persona Jurídica
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Primer Nombre</label>
                                        <input type="text" name="name" class="form-control" required value="{{ $usuario->name }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="middlename">Segundo Nombre</label>
                                        <input type="text" name="middlename" class="form-control" value="{{ $usuario->middlename }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Primer Apellido</label>
                                        <input type="text" name="lastname" class="form-control" required value="{{ $usuario->lastname }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="surname">Segundo Apellido</label>
                                        <input type="text" name="surname" class="form-control" value="{{ $usuario->surname }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" required value="{{ $usuario->email }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile_code" class="title_code_country">Código País Celular</label>
                                        <input type="text" id="mobile_code" class="form-control" name="mobile_code" required value="{{ $usuario->mobile_code }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile">Número Celular</label>
                                        <input type="text" id="mobile" class="form-control" name="mobile" required value="{{ $usuario->mobile }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="dni_type_id">Tipo de Documento</label>
                                        <select class="form-control" name="dni_type_id">
                                            <option value="1">Cédula de Ciudadania</option>
                                            <option value="2">Cédula de Extranjería</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="dni">Número de Documento</label>
                                        <input type="text" id="dni" class="form-control" name="dni" required value="{{ $usuario->dni }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="civil_status">Estado Civil</label>
                                        <select class="form-control" name="civil_status">
                                            <option value="1">Solter@</option>
                                            <option value="2">Casad@</option>
                                            <option value="3">Divorciad@</option>
                                            <option value="4">Unión Libre</option>
                                            <option value="5">Viud@</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    @role('super-admin')
                                        <div class="form-group">
                                            <label for="rol">Rol</label>
                                            <select class="form-control" name="rol">
                                                @foreach ($roles as $key => $value)
                                                    @if ($usuario->hasRole($value))
                                                        <option value="{{ $value }}" selected>{{ $value }}</option>
                                                    @else
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @endrole
                                    @role('editor')
                                        <div class="form-group">
                                            <input type="hidden" name="rol" class="form-control" value="editor">
                                            <input type="hidden" name="customer" class="form-control" value="customer">
                                        </div>
                                    @endrole
                                </div>
                                <div class="col-12 col-sm-12 text-center">
                                    <div class="justify-content-center">
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
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab4').addClass('active');
        });
    </script>
@endsection
