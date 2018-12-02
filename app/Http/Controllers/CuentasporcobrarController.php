<?php

namespace App\Http\Controllers;

use App\Cuentasporcobrar;
use App\Logs;
use Illuminate\Http\Request;

class CuentasporcobrarController extends Controller
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
        $cuentasporcobrar=cuentasporcobrar::all ();
        return view ('administrador.cuentasporcobrar')->with(['cuentasporcobrar'=>$cuentasporcobrar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administrador.nuevacuentasporcobrar'); 
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
            'fecha' => 'required|date',
            'deudor' => 'required',
            'concepto' => 'required',
            'monto'=> 'required|numeric',
            
            
            'montototal'=> 'required|numeric',
        ]);

       $cuentasporcobrar=new cuentasporcobrar();
       $cuentasporcobrar->fecha=$request->fecha;
       $cuentasporcobrar->deudor=$request->deudor;
       $cuentasporcobrar->concepto=$request->concepto;
       $cuentasporcobrar->monto=$request->monto;
      
       $cuentasporcobrar->montototal=$request->montototal;
       
       if($cuentasporcobrar->save()){
        $log= new Logs();
        $log->tabla="cuentasporcobrar";
        $log->accion="update";
        $log->idrow=$cuentasporcobrar->id;
        $log->user_id=\Auth::user()->id;
        $log->save();   
        return redirect()->back()->with('message','Ingreso  realizado correctamente');}
        else{ }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuentasporcobrar  $cuentasporcobrar
     * @return \Illuminate\Http\Response
     */
    public function show(Cuentasporcobrar $cuentasporcobrar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuentasporcobrar  $cuentasporcobrar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentasporcobrar=cuentasporcobrar::find($id);
        return view ('administrador.modificarcuentasporcobrar')->with(['cuentasporcobrar'=>$cuentasporcobrar]);    
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuentasporcobrar  $cuentasporcobrar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    { 
        $this->validate($request, [
            'fecha' => 'required|date',
            'deudor' => 'required',
            'concepto' => 'required',
            'monto'=> 'required|numeric',
            
            'montototal'=> 'required|numeric',
        ]);

        $cuentasporcobrar= cuentasporcobrar::find($request->id);
        $cuentasporcobrar->fecha=$request->fecha;
        $cuentasporcobrar->deudor=$request->deudor;
        $cuentasporcobrar->concepto=$request->concepto;
        $cuentasporcobrar->monto=$request->monto;
      
        $cuentasporcobrar->montototal=$request->montototal;
        
        if($cuentasporcobrar->save()){
            $log= new Logs();
            $log->tabla="cuentasporcobrar";
            $log->accion="update";
            $log->idrow=$cuentasporcobrar->id;
            $log->user_id=\Auth::user()->id;
            $log->save();

            return redirect()->back()->with('message','Ingreso  actualizado correctamente');
        }
        else{
        
        }
          
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuentasporcobrar  $cuentasporcobrar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        {
            $cuentasporcobrar=cuentasporcobrar::find($request->id);
            if($cuentasporcobrar->delete()){
                $log= new Logs();
            $log->tabla="cuentasporcobrar";
            $log->accion="update";
            $log->idrow=$cuentasporcobrar->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
                return redirect()->back()->with('message','Ingreso  actualizado correctamente');
            }else{
    
            }
    
    }
    }



public function deudor(Request $request)
{
//dd($request);
$this->validate($request, [
    'deudor'=> 'required',
   
]);
$cuentasporcobrar = cuentasporcobrar::where('deudor','=',$request->deudor )->get();

return view ('administrador.cuentasporcobrar')->with(['cuentasporcobrar'=>$cuentasporcobrar]);  

// $request->deudor;

}       
}
