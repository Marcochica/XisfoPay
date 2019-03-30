<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use App\User;
use App\Transfer;

class TransfersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $transfer = Transfer::orderBy('id', 'desc')->get();
        return view('admin.transfers.list', compact('transfer','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.transfers.create', compact('transfer','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $amount_transfer = $data['amount_transfer'];
        $decimales = explode('.',$amount_transfer);
        $valorsindecimales = str_replace(',','',$decimales[0]);
        $valorsindecimales = str_replace('$','',$valorsindecimales);
        $valorsindecimales = str_replace(' ','',$valorsindecimales);
        $valorent = (int)$valorsindecimales;

        $valorendb = $user->total;
        $dec = explode('.',$valorendb);
        $dec_ = (int)$dec[1];
        $valorsindec = str_replace(',','',$dec[0]);
        $valorsindec = str_replace('$','',$valorsindec);
        $valorsindec = str_replace(' ','',$valorsindec);
        $valorentero = (int)$valorsindec;
        $totalfinal = $valorentero-$valorent;

        $usuario = User::findOrFail($data['customer_id']);
        $total = '$ '.$totalfinal.'.'.$dec_;
        $usuario->total = $total;
        $usuario->save();

        $usertransfer = User::findOrFail($data['customer_id_transfer']);
        if(!isset($usertransfer->total) || $usertransfer->total==NULL){
            $usertransfer->total = $amount_transfer;
            $usertransfer->save();
        }else{
            $dec_transferido = explode('.',$usertransfer->total);
            $dec_transferido_ = (int)$dec_transferido[1];
            $valortransf = str_replace(',','',$dec_transferido[0]);
            $valortransf = str_replace('$','',$valortransf);
            $valortransf = str_replace(' ','',$valortransf);
            $valorent_ = (int)$valortransf;

            $dec_enviado = explode('.',$amount_transfer);
            $dec_enviado_ = (int)$dec_enviado[1];
            $valorenviado = str_replace(',','',$dec_enviado[0]);
            $valorenviado = str_replace('$','',$valorenviado);
            $valorenviado = str_replace(' ','',$valorenviado);
            $valorenviado_ = (int)$valorenviado;
            $v = $valorent_+$valorenviado_;
            $usertransfer->total = '$ '.$v.'.'.$dec_transferido_;
            $usertransfer->save();
        }
        $transfer = Transfer::create($data);
        $transfer = Transfer::orderBy('id', 'desc')->get();
		return view('admin.transfers.list', compact('transfer','user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $transfer = Transfer::find($id);
        return view('admin.transfers.update', compact('transfer','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function searchEmail($email){
        $user = Auth::user();
        $customer = User::select("*", DB::raw("CONCAT_WS(' ', name, middlename, lastname, surname) AS nombre"))->where('email', $email)->first();
        if($customer==NULL){
            $mensaje = 'El Correo Ingresado no se Encuentra Registrado en el Sistema';
        }
        return view('admin.transfers.create', compact('customer','user','mensaje'));
    }
}
