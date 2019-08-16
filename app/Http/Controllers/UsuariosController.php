<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\InventoryCreateRequest;
use App\Http\Requests\InventoryUpdateRequest;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = DB::select('select * from usuarios;');
        $grupos = DB::select('select * from tbl_grupos;');
        $categorias = DB::select('select * from categoria_usuarios;');
        
        $params=array(
            'usuarios'   => $users,
            'grupos'     => $grupos,
            'categorias' => $categorias,
        );
        
        return view('usuarios.index',$params);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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



    public function grupo_index()
    {
        
        $grupos = DB::select('select * from tbl_grupos;');
        //dd($users);
        
        return view('usuarios.grupos_index',array('grupos'=>$grupos));

    }
}
