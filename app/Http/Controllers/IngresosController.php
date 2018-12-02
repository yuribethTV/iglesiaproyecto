<?php

namespace App\Http\Controllers;

use App\Ingresos;
use App\Logs;
use Illuminate\Http\Request;

class IngresosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ingresos=Ingresos::all ();
        return view ('administrador.Ingreso')->with(['ingresos'=>$ingresos]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administrador.nuevoingreso');    
        
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
            'descripcion' => 'required',
            'monto' => 'required|numeric',
            'fecha'=> 'required|date',
        ]);

       $ingresos=new Ingresos();
       $ingresos->descripcion=$request->descripcion;
       $ingresos->monto=$request->monto;
       $ingresos->fecha=$request->fecha;
       
       if($ingresos->save()){
        $log= new Logs();
        $log->tabla="ingresos";
        $log->accion="update";
        $log->idrow=$ingresos->id;
        $log->user_id=\Auth::user()->id;
        $log->save();   
        
        return redirect()->back()->with('message','Ingreso  realizado correctamente');}
        else{ }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function show(Ingresos $ingresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $ingreso=Ingresos::find($id);
        return view ('administrador.modificaringreso')->with(['ingreso'=>$ingreso]);    
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $this->validate($request, [
            'descripcion' => 'required',
            'monto' => 'required|numeric',
            'fecha'=> 'required|date',
        ]);

        $ingresos=Ingresos::find($request->id);
        $ingresos->descripcion=$request->descripcion;
        $ingresos->monto=$request->monto;
        $ingresos->fecha=$request->fecha;
        
        if($ingresos->save()){
            $log= new Logs();
            $log->tabla="ingresos";
            $log->accion="update";
            $log->idrow=$ingresos->id;
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
     * @param  \App\Ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        {
            $ingresos=ingresos::find($request->id);
            if($ingresos->delete()){
                $log= new Logs();
            $log->tabla="ingresos";
            $log->accion="delete";
            $log->idrow=$ingresos->id;
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
            'fechafinal'=> 'required|date',
        ]);
    
        $ingresos=Ingresos::where('fecha', '>',$request->fechainicio )->where('fecha', '<', $request->fechafinal)->get();
        ($ingresos);
return view ('administrador.Ingreso')->with(['ingresos'=>$ingresos]);  

        // $request->fechaInicial;
        // $request->fechaFinal;
    }       
}
