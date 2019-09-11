<?php

namespace App\Http\Controllers;

use App\Deposito;
use App\User;
use Illuminate\Http\Request;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depositos=Deposito::get();
        
        return view('depositos.index',compact('depositos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vendedores = User::orderBy('username', 'ASC')->get();
        
        return view('depositos.create',compact('vendedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'id_vendedor' => 'required',
        ]);

        $params=$request->all(); 
        if(!isset($params['observacion'])){
            $params['observacion']='';
        }
        unset($params['_token']);
        Deposito::create($params);
        return redirect()->route('depositos.index')->with('success','Deposito Creado.');   
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function show(Deposito $deposito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposito $deposito)
    {
        //
        $vendedores = User::orderBy('username', 'ASC')->get();
        return view('depositos.edit',compact('deposito','vendedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposito $deposito)
    {
        //

        $params = $request->all();  

        if(!isset($params['observacion'])){
            $params['observacion']='';
        }   

        $deposito->update($params);

        return redirect()->route('depositos.index')->with('success','Deposito Actualizado.');   
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposito $deposito)
    {
        $res=deposito::delete();
        return redirect()->route('depositos.index')->with('success','Deposito Eliminado.'); 
    
    }
}
