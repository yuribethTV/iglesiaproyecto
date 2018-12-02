<?php

namespace App\Http\Controllers;

use App\ninos;
use App\Logs;
use Illuminate\Http\Request;

class NinosController extends Controller
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
        $ninos=Ninos::all ();
        return view ('administrador.ninos')->with(['ninos'=>$ninos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administrador.nuevomiembroninos');
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
            'cedula' => 'required|numeric',
            'nombre' => 'required',
            'telefono'=> 'required|numeric',
            'fechanacimiento'=> 'required|date',
        ]);

        $nuevomiembroninos=new Ninos();
        $nuevomiembroninos->cedula=$request->cedula;
        $nuevomiembroninos->nombre=$request->nombre;
        $nuevomiembroninos->telefono=$request->telefono;
        $nuevomiembroninos->fechanacimiento=$request->fechanacimiento;
        
        if($nuevomiembroninos->save()){
            $log= new Logs();
            $log->tabla="ninos";
            $log->accion="created";
            $log->idrow=$nuevomiembroninos->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
            return redirect()->back()->with('message','Ingreso  actualizado correctamente');
        }
        else{
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ninos  $ninos
     * @return \Illuminate\Http\Response
     */
    public function show(ninos $ninos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ninos  $ninos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ninos=ninos::find($id);
        return view ('administrador.modificarninos')->with(['ninos'=>$ninos]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ninos  $ninos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'cedula' => 'required',
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'fechanacimiento'=> 'required|date',
        ]);

        $ninos=ninos::find($request->id);
        $ninos->cedula=$request->cedula;
        $ninos->nombre=$request->nombre;
        $ninos->telefono=$request->telefono;
        $ninos->fechanacimiento=$request->fechanacimiento;
        
        if($ninos->save()){
            $log= new Logs();
            $log->tabla="ninos";
            $log->accion="created";
            $log->idrow=$ninos->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
            return redirect()->back()->with('message','Ingreso  actualizado correctamente');
        }
        else{
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ninos  $ninos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ninos=ninos::find($request->id);
        if($ninos->delete()){
            $log= new Logs();
            $log->tabla="ninos";
            $log->accion="created";
            $log->idrow=$ninos->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
            return redirect()->back()->with('message','Ingreso  actualizado correctamente');
        }else{

        }

}
}