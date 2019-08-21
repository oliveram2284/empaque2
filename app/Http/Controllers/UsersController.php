<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;

use App\User;
use App\Grupo;
use App\CategoriaUsuario;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$users= User::select("select u.*,(SELECT description FROM tbl_grupos as g WHERE u.group_id=g.id_grupo) as grupo from users as u;");
        //$users= User::join('tbl_grupos','users.group_id','=','tbl_grupos.id_grupo');
        /*$users= DB::table('users')
                ->leftJoin('tbl_grupos','users.group_id','=','tbl_grupos.id_grupo')
                ->leftJoin('categoria_usuarios','users.catId','=','categoria_usuarios.id')
                ->select('users.*', 'categoria_usuarios.descripcion as categoria', 'tbl_grupos.descripcion as grupo')
                ->get();*/        
        //dd($users);
        $users=User::all();
        $params=array(
            'usuarios'   => $users,
        );
        
        return view('users.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $grupos=Grupo::all();
        $categorias=CategoriaUsuario::all();

        $params=array(           
            'grupos'     => $grupos,
            'categorias' => $categorias,
        );
        return view('users.create',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'group_id' => 'required',
        ]);

        $params=$request->all();       
        $params['password']=Hash::make($params['password']);       
        User::create($params);
        
        return redirect()->route('usuarios.index')->with('success','Usuario Creado.');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user=User::find($id);
        $user= DB::table('users')
                ->leftJoin('tbl_grupos','users.group_id','=','tbl_grupos.id_grupo')
                ->leftJoin('categoria_usuarios','users.catId','=','categoria_usuarios.id')
                ->select('users.*', 'categoria_usuarios.descripcion as categoria', 'tbl_grupos.descripcion as grupo')
                ->where('users.id',$id)
                ->get()->first();
       // dd($user);        
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        
        $grupos=Grupo::all();
        $categorias=CategoriaUsuario::all();

        $params=compact('user');
        $params['grupos']=$grupos;
        $params['categorias']=$categorias;
        
        //dd($params);
        return view('users.edit',$params);
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
        $user=User::find($id);
        $params = $request->all();
        if(is_null($params['password']) ){
            unset($params['password']);
        }else{
            $params['password']=Hash::make($params['password']);    
        }
        
        $user->update($params);
        return redirect()->route('usuarios.index')->with('success','Usuario Modificado');
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
}
