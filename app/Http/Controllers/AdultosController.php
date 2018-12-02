<?php

namespace App\Http\Controllers;

use App\adultos;
use App\Logs;
use Illuminate\Http\Request;

class AdultosController extends Controller
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
        $adultos=adultos::all ();
        return view ('administrador.adultos')->with(['adultos'=>$adultos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('administrador.nuevomiembroadultos');
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

        $nuevomiembroadultos=new adultos();
        $nuevomiembroadultos->cedula=$request->cedula;
        $nuevomiembroadultos->nombre=$request->nombre;
        $nuevomiembroadultos->telefono=$request->telefono;
        $nuevomiembroadultos->fechanacimiento=$request->fechanacimiento;
        
        if($nuevomiembroadultos->save()){
            $log= new Logs();
            $log->tabla="adultos";
            $log->accion="created";
            $log->idrow=$nuevomiembroadultos->id;
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
     * @param  \App\adultos  $adultos
     * @return \Illuminate\Http\Response
     */
    public function show(adultos $adultos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adultos  $adultos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adultos=adultos::find($id);
        return view ('administrador.modificaradultos')->with(['adultos'=>$adultos]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adultos  $adultos
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

        $adultos=adultos::find($request->id);
        $adultos->cedula=$request->cedula;
        $adultos->nombre=$request->nombre;
        $adultos->telefono=$request->telefono;
        $adultos->fechanacimiento=$request->fechanacimiento;
        
        if($adultos->save()){
            $log= new Logs();
            $log->tabla="adultos";
            $log->accion="update";
            $log->idrow=$adultos->id;
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
     * @param  \App\adultos  $adultos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        {
            $adultos=adultos::find($request->id);
            if($adultos->delete()){
                $log= new Logs();
                $log->tabla="adultos";
                $log->accion="delete";
                $log->idrow=$adultos->id;
                $log->user_id=\Auth::user()->id;
                $log->save();
                return redirect()->back()->with('message','Ingreso  actualizado correctamente');
            }else{
    
            }
    
    }
    }
}
