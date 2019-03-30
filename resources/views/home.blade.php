@extends('layouts.app')

@section('content')
    @parent
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row justify-content-center">
                <div class="col-md-12 container_home">
                    <div class="body_home container_text">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>
                            @if (isset($user))
                                Bienvenid@ {{ $user->name.' '.$user->lastname }}
                            @endif
                        </h3>
                        <h5 class="fondos_disponibles">

                            Fondos Disponibles: @if (isset($user->total)) {{ $user->total }} @else $ 0 @endif
                        </h5>
                    </div>
                    <svg id="cuenta" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 712.9 712.9">
                        <defs><style>.cls-1{fill:#fff;}</style></defs>
                        <title>dashboard MATERIALES</title>
                        <path class="cls-1" d="M679.73,418.65a3.48,3.48,0,0,0-.3-.26q-5.38-5.75-11.28-11c-34-37.91-15.09-72.31,0-90.13a181.86,181.86,0,0,0,13-12.77h0a178.2,
                        178.2,0,0,0-250-253.37c-62.78,50.6-119.72-.57-119.72-.57l0,.2A178.2,178.2,0,0,0,61.88,304.5l0,0a180.59,180.59,0,0,0,12.93,12.73c15.15,17.8,34.08,52.24,
                        0,90.17-3.89,3.47-7.64,7.12-11.2,10.93-.12.08-.23.2-.35.3l0,0a178.18,178.18,0,0,0,248.8,254.67c6.92-4.16,52.43-48.58,120.06,1.21l0,0a179.26,179.26,0,0,
                        0,25.32,18.58A178.18,178.18,0,0,0,679.68,418.65Z" transform="translate(-15.08 -5.9)"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
        <div class="tab-pane fade" id="v-pills-transfer" role="tabpanel" aria-labelledby="v-pills-transfer-tab">...</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
    <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function(){
            $jq('#tab1').addClass('active');
        });
    </script>

@endsection
