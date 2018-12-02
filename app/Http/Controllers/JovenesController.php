<?php

namespace App\Http\Controllers;

use App\jovenes;
use App\Logs;
use Illuminate\Http\Request;

class JovenesController extends Controller
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
        $jovenes=jovenes::all ();
        return view ('administrador.jovenes')->with(['jovenes'=>$jovenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administrador.nuevomiembrojovenes');
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

        $nuevomiembrojovenes=new jovenes();
        $nuevomiembrojovenes->cedula=$request->cedula;
        $nuevomiembrojovenes->nombre=$request->nombre;
        $nuevomiembrojovenes->telefono=$request->telefono;
        $nuevomiembrojovenes->fechanacimiento=$request->fechanacimiento;
        
        if($nuevomiembrojovenes->save()){
            $log= new Logs();
            $log->tabla="jovenes";
            $log->accion="update";
            $log->idrow=$nuevomiembrojovenes->id;
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
     * @param  \App\jovenes  $jovenes
     * @return \Illuminate\Http\Response
     */
    public function show(jovenes $jovenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jovenes  $jovenes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jovenes=Jovenes::find($id);
        return view ('administrador.modificarjovenes')->with(['jovenes'=>$jovenes]);    
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jovenes  $jovenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jovenes $jovenes)
    {
        $this->validate($request, [
            'cedula' => 'required',
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'fechanacimiento'=> 'required|date',
        ]);

        $jovenes=jovenes::find($request->id);
        $jovenes->cedula=$request->cedula;
        $jovenes->nombre=$request->nombre;
        $jovenes->telefono=$request->telefono;
        $jovenes->fechanacimiento=$request->fechanacimiento;
        
        if($jovenes->save()){

            $log= new Logs();
            $log->tabla="jovenes";
            $log->accion="update";
            $log->idrow=$jovenes->id;
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
     * @param  \App\jovenes  $jovenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jovenes=jovenes::find($request->id);
        if($jovenes->delete()){
            $log= new Logs();
            $log->tabla="jovenes";
            $log->accion="update";
            $log->idrow=$jovenes->id;
            $log->user_id=\Auth::user()->id;
            $log->save();
            return redirect()->back()->with('message','Ingreso  actualizado correctamente');
        }else{

        }

}
    }
