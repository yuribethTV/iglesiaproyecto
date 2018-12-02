<?php

namespace App\Http\Controllers;

use App\cuentasporpagar;
use App\Logs;
use Illuminate\Http\Request;

class CuentasporpagarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $cuentasporpagar=cuentasporpagar::all ();
          return view ('administrador.cuentasporpagar')->with(['cuentasporpagar'=>$cuentasporpagar]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administrador.nuevacuentasporpagar'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'proveedores' => 'required',
            'numerodefactura' => 'required',
            'montooriginal' => 'required|numeric',
            'fechadefactura'=> 'required|date',
            'concepto' => 'required',
            'fechadevencimiento'=> 'required|date',
        ]);

       $cuentasporpagar=new cuentasporpagar();
       $cuentasporpagar->proveedores=$request->proveedores;
       $cuentasporpagar->numerodefactura=$request->numerodefactura;
       $cuentasporpagar->montooriginal=$request->montooriginal;
       $cuentasporpagar->fechadefactura=$request->fechadefactura;
       $cuentasporpagar->concepto=$request->concepto;
       $cuentasporpagar->fechadevencimiento=$request->fechadevencimiento;
       
       if($cuentasporpagar->save()){
        $log= new Logs();
        $log->tabla="cuentasporpagar";
        $log->accion="update";
        $log->idrow=$cuentasporpagar->id;
        $log->user_id=\Auth::user()->id;
        $log->save();   
        return redirect()->back()->with('message','Ingreso  realizado correctamente');}
        else{ }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuentasporpagar  $cuentasporpagar
     * @return \Illuminate\Http\Response
     */
    public function show(cuentasporpagar $cuentasporpagar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuentasporpagar  $cuentasporpagar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentasporpagar=cuentasporpagar::find($id);
        return view ('administrador.modificarcuentasporpagar')->with(['cuentasporpagar'=>$cuentasporpagar]);    
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuentasporpagar  $cuentasporpagar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'proveedores' => 'required',
            'numerodefactura' => 'required|numeric',
            'montooriginal' => 'required|numeric',
            'fechadefactura'=> 'required|date',
            'concepto' => 'required',
            'fechadevencimiento'=> 'required|date',
        ]);

       $cuentasporpagar= cuentasporpagar::find($request->id);
       $cuentasporpagar->proveedores=$request->proveedores;
       $cuentasporpagar->numerodefactura=$request->numerodefactura;
       $cuentasporpagar->montooriginal=$request->montooriginal;
       $cuentasporpagar->fechadefactura=$request->fechadefactura;
       $cuentasporpagar->concepto=$request->concepto;
       $cuentasporpagar->fechadevencimiento=$request->fechadevencimiento;
       
       if($cuentasporpagar->save()){
        $log= new Logs();
            $log->tabla="cuentasporpagar";
            $log->accion="update";
            $log->idrow=$cuentasporpagar->id;
            $log->user_id=\Auth::user()->id;
            $log->save();   
        return redirect()->back()->with('message','Ingreso  realizado correctamente');}
        else{ }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuentasporpagar  $cuentasporpagar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        {
            $cuentasporpagar=cuentasporpagar::find($request->id);
            if($cuentasporpagar->delete()){
                $log= new Logs();
            $log->tabla="cuentasporpagar";
            $log->accion="update";
            $log->idrow=$cuentasporpagar->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
                return redirect()->back()->with('message','Ingreso  actualizado correctamente');
            }else{
    
            }
    
    }
    }


    public function fecha(Request $request)
    {
    //dd($request);
    $this->validate($request, [
        'fechainicio'=> 'required|date',
        'fechafinal'=> 'required|date'
    ]);
    $cuentasporpagar = cuentasporpagar::where('fechadevencimiento','>=',$request->fechainicio )->where('fechadevencimiento', '<=', $request->fechafinal)->get();

    return view ('administrador.cuentasporpagar')->with(['cuentasporpagar'=>$cuentasporpagar]);  

    // $request->fechaInicial;
    // $request->fechaFinal;
    }       
}
