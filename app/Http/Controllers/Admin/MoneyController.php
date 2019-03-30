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
use App\Money;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $money = Money::orderBy('id', 'desc')->get();
        return view('admin.money.list', compact('money','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.money.create', compact('money'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
		$cust = Money::create($data);
        // Envia notificación al administrador para que apruebe los fondos
		return Redirect::to('admin/money');
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
        $money = Money::find($id);
        return view('admin.money.update', compact('money','user'));
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
        $money = Money::findOrFail($id);
        $money->amount_credits = $request->amount_credits;
        $money->state = $request->state;
        $money->save();
        if($request->state==1){
            $usuario = User::findOrFail($request->customer_id);
            if($usuario->total==''){
                $usuario->total = $request->amount_credits;
                $usuario->save();
            }else{
                $decimales = explode('.',$usuario->total);
                $valordb = (int)$decimales[1];
                $valordbsindecimales = str_replace(',','',$decimales[0]);
                $valordbsindecimales = str_replace('$','',$valordbsindecimales);
                $valordbsindecimales = str_replace(' ','',$valordbsindecimales);
                $valordb_ = (int)$valordbsindecimales;

                $decimalesadd = explode('.',$request->amount_credits);
                $valoradd = (int)$decimalesadd[1];
                $valoraddsindecimales = str_replace(',','',$decimalesadd[0]);
                $valoraddsindecimales = str_replace('$','',$valoraddsindecimales);
                $valoraddsindecimales = str_replace(' ','',$valoraddsindecimales);
                $valoradd_ = (int)$valoraddsindecimales;
                $sumadecimales = $valordb+$valoradd;
                if($sumadecimales>99){
                    $sumadecimales = substr( $sumadecimales, -2 );
                    $sumavalor = $valordb_+$valoradd_+1;
                    $total = '$ '.$sumavalor.'.'.$sumadecimales;
                    $usuario->total = $total;
                    $usuario->save();
                }else{
                    $sumavalor = $valordb_+$valoradd_;
                    $total = '$ '.$sumavalor.'.'.$sumadecimales;
                    $usuario->total = $total;
                    $usuario->save();
                }
            }
        }
        return Redirect::to('admin/money');
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
}
