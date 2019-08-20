<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\InventoryCreateRequest;
use App\Http\Requests\InventoryUpdateRequest;

use App\Usuarios;
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
        dd($$request->all());
        

        //dd($usuario);
        //$result= $usuario->save();
        return Redirect()->route('usuarios');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        

        
		
    }


    /**
     * Get Ajax the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_ajax($id){
        
        $usuario = Usuarios::where('id_usuario','=',$id)->first();
        $response=array(
            'usuario'=>$usuario,
        );
        echo json_encode($response);
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
    public function update($id,Request $request)
    {

        try {
            $usuario = Usuarios::where('id_usuario','=',$id)->first();
        } catch (\Exception $e) {
            return Redirect()->route('usuarios')->with('message-error', 'An error occurred while trying to process your request.');
        }
        if (empty($usuario)) {
        return Redirect::back()->with('message-error', 'Usuario not found!');
        }else{

       
        $usuario->nombre = $request->nombre;
        $usuario->nombre_real = $request->nombre_real;
        $usuario->id_grupo = $request->id_grupo;
        $usuario->catId = $request->catId;

        if ($request->contrasenia != $usuario->contrasenia) {
            $usuario->contrasenia = $request->contrasenia;
        }
        
        $usuario->save();
        return Redirect()->route('usuarios')->with('message', 'Operator Two updated correctly!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        try {
            $usuario = Usuarios::where('id_usuario','=',$id);
        } catch (\Exception $e) {
            return Redirect()->route('usuarios')->with('message-error', 'An error occurred while trying to process your request.');
        }

        if (empty($usuario)) {
            return Redirect()->route('usuarios')->with('message-error', 'usuario not found!');
        }else{
            $usuario->delete();
            return Redirect()->route('usuarios')->with('message', 'usuario removed correctly!');
        }

    }



    public function grupo_index()
    {
        
        $grupos = DB::select('select * from tbl_grupos;');
        //dd($users);
        
        return view('usuarios.grupos_index',array('grupos'=>$grupos));

    }
}
