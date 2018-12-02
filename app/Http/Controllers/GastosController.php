<?php

namespace App\Http\Controllers;

use App\Gastos;
use App\Logs;
use Illuminate\Http\Request;

class GastosController extends Controller
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

    public function listasgastos(){
        $gastos=Gastos::all ();
        return view ('administrador.gasto')->with(['gastos'=>$gastos]);   

    }
    public function index()
    {
        $gastos=Gastos::all ();
        return view ('administrador.gasto')->with(['gastos'=>$gastos]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administrador.creargastos'); 
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

       $gastos=new gastos();
       $gastos->descripcion=$request->descripcion;
       $gastos->monto=$request->monto;
       $gastos->fecha=$request->fecha;
       
       if($gastos->save()){
       $log= new Logs();
            $log->tabla="gastos";
            $log->accion="update";
            $log->idrow=$gastos->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
       return redirect()->back()->with('message','Ingreso  realizado correctamente');}
        else{ }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function show(Gastos $gastos)
    {
        //
        $gastos=Gastos::where('fecha', '>',$request->fechainicio )->where('fecha', '<', $request->fechafinal)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
            $gastos=Gastos::find($id);
             return view ('administrador.modificargastos')->with(['gastos'=>$gastos]);    
            
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gastos $gastos)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'monto' => 'required|numeric',
            'fecha'=> 'required|date',
        ]);

        $gastos=Gastos::find($request->id);
        $gastos->descripcion=$request->descripcion;
        $gastos->monto=$request->monto;
        $gastos->fecha=$request->fecha;
        
        if($gastos->save()){
            $log= new Logs();
            $log->tabla="adultos";
            $log->accion="update";
            $log->idrow=$gastos->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
            return redirect()->back()->with('message','Gasto actualizado correctamente');
        }
        else{
        
        }
         
    }
    public function fecha(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'fechainicio'=> 'required|date',
            'fechafinal'=> 'required|date',
        ]);
    
        $gastos=Gastos::where('fecha', '>',$request->fechainicio )->where('fecha', '<', $request->fechafinal)->get();
        ($gastos);
return view ('administrador.Gasto')->with(['gastos'=>$gastos]);  

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gastos=gastos::find($request->id);
        if($gastos->delete()){
            $log= new Logs();
            $log->tabla="gastos";
            $log->accion="update";
            $log->idrow=$gastos->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
            return redirect()->back()->with('message','Ingreso  actualizado correctamente');
        }else{

        }

}
}