<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComponenteLaminado;
class ComponeteLaminadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $componentes_laminados= ComponenteLaminado::get();
        return view('componente_laminado.index',compact('componentes_laminados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('componente_laminado.create');
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
            'descripcion' => 'required',
        ]);

        $params=$request->all(); 
      
        unset($params['_token']);
        ComponenteLaminado::create($params);
        return redirect()->route('componentes_laminados.index')->with('success','Componente Laminado Creado.');   
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
        //
        $compLaminado=ComponenteLaminado::find($id);
        return view('componente_laminado.edit',compact('compLaminado'));
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
        //
        $componente_laminado=ComponenteLaminado::find($id);
        $params = $request->all();        
        
        $componente_laminado->update($params);
        return redirect()->route('componentes_laminados.index')->with('success','Componente Laminado Actualizado.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=ComponenteLaminado::find($id)->delete();
        return redirect()->route('componentes_laminados.index')->with('success','Componente Laminado Eliminado.'); 
    }
}
