<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Usuarios</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="{{ asset('css/jquery.ccpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="{{ asset('js/jquery.ccpicker.js') }}"></script>
</head>
<body>
    <div class="imgs_login">
        <img src="{{ asset('imgs/cabecera-login.png') }}" alt="Cabecera Login" class="img-fluid">
        <a href="{{ url('/') }}"><img src="{{ asset('imgs/logo-xisfo.png') }}" class="logo_xisfo_login" style="top:8%;" class="img-fluid"></a>
        <div class="icono_home" style="top:15%;">
            <a href="{{ url('/') }}"><i class="fa fa-home"></i></a>
            <a href="" data-toggle="modal" data-target="#modalLRFormDemo3"><i class="fas fa-phone-square"></i></a>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-9">
                <div class="card container_register">
                    <div class="card-header login-box-msg">{{ __('Formulario de Registro') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="user_register">
                            @csrf

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Primer Nombre') }}</label>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">{{ __('Primer Apellido') }}</label>
                                        <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-2 group_one">
                                    <div class="form-group">
                                        <label for="mobile_code">{{ __('Código de País') }}</label>
                                        <input id="mobile_code" type="hidden" class="form-control{{ $errors->has('mobile_code') ? ' is-invalid' : '' }}" name="mobile_code" value="{{ old('mobile_code') }}" required>

                                        @if ($errors->has('mobile_code'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group group_two">
                                        <label for="mobile">{{ __('Número de Celular') }}</label>
                                        <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                        @if ($errors->has('mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="terms_conditions" name="terms_conditions" required>
                                        <label class="form-check-label text_terms_conditions" for="terms_conditions"><a href="{{ asset('terminos-y-condiciones-xisfo-pay.pdf') }}" target="_blank" class="link_terms_conditions">Acepto términos y condiciones</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 justify-content-center">
                                    <button type="submit" class="btn btn-primary btn_register">
                                        {{ __('Abrir Cuenta') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalLRFormDemo3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Contacto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
                    <span><b>Email:</b> soporte@xisfo.com</span>
                </div>
                <div class="col-12 text-center">
                    <span><b>Cel:</b> 300 429 1972</span>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        (function($){
            $("#mobile_code").CcPicker();
            $("#mobile_code").CcPicker("setCountryByCode","co");
            $("#mobile_code").CcPicker({
                dataUrl: "data.json"
            });
        })(jQuery);
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

