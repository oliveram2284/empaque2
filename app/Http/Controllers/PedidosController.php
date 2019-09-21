<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Pedidos;
use App\Pedido_Logs;
class PedidosController extends Controller
{
    //

    public function index(){
        
    }


    public function create(){

        $codigo_pedido=Pedidos::getNextNro();
        $params=array(
            'codigo_pedido'=>$codigo_pedido
        );
        return view('pedidos.form',$params);  
    }

    public function emitidos(){
        $user = auth()->user();
       
        $codigo= substr($user->username, 0,2);       
        if($user->group_id=='42'){ //is admin

            $isAdmin=true;

            $pedidos=Pedidos::select(['*',
            'npedido', 
            'codigo',
            'clienteNombre',
            'descripcion as Articulo',
            'estado',
            'femis',
            'prodHabitual',
            'poliNumero as polId',
            'caras',
            DB::raw("(Select Count(*) From tbl_log_pedidos as tbl_log Where (tbl_log.pedidoEstado = 'R' or tbl_log.pedidoEstado = 'RR' or tbl_log.pedidoEstado = 'RN' or tbl_log.pedidoEstado = 'NO' or tbl_log.pedidoEstado = 'PX' or tbl_log.pedidoEstado = 'D' or tbl_log.pedidoEstado = 'NC') and tbl_log.pedidoId = npedido) as devolucion")])
            ->where('estado','I')
            ->orWhere('estado','R')
            ->orWhere('estado','E')
            ->orWhere('estado','RR')
            ->orderby('npedido','ASC')
            ->get();

            
        }else{

            $isAdmin=false;

            $pedidos=Pedidos::select(['*',
            'npedido', 
            'codigo',
            'clienteNombre',
            'descripcion as Articulo',
            'estado',
            'femis',
            'prodHabitual',
            'poliNumero as polId',
            'caras',
            DB::raw("(Select Count(*) From tbl_log_pedidos as tbl_log Where (tbl_log.pedidoEstado = 'R' or tbl_log.pedidoEstado = 'RR' or tbl_log.pedidoEstado = 'RN' or tbl_log.pedidoEstado = 'NO' or tbl_log.pedidoEstado = 'PX' or tbl_log.pedidoEstado = 'D' or tbl_log.pedidoEstado = 'NC') and tbl_log.pedidoId = npedido) as devolucion")])
            ->whereRaw("codigo REGEXP '^".$codigo."'") 
            ->where('estado','I')
            ->orWhere('estado','R')
            ->orWhere('estado','E')
            ->orWhere('estado','RR')
            ->orderby('npedido','ASC')
            ->get();
        }
       
        
        return view('pedidos.emitidos',compact('isAdmin','pedidos'));  
    }

    public function recibidos(){
        $user = auth()->user();
        
        $codigo= substr($user->username, 0,2);      
        
        DB::enableQueryLog(); 
        if($user->group_id=='42'){ //is admin
            $pedidos=Pedidos::select(['*',
            'npedido', 
            'codigo',
            'clienteNombre',
            'descripcion as Articulo',
            'estado',
            'femis',
            'prodHabitual',
            'poliNumero as polId',
            'caras',
            DB::raw("(Select Count(*) From tbl_log_pedidos as tbl_log Where (tbl_log.pedidoEstado = 'R' or tbl_log.pedidoEstado = 'RR' or tbl_log.pedidoEstado = 'RN' or tbl_log.pedidoEstado = 'NO' or tbl_log.pedidoEstado = 'PX' or tbl_log.pedidoEstado = 'D' or tbl_log.pedidoEstado = 'NC') and tbl_log.pedidoId = npedido) as devolucion")])
            ->where('estado','A')
            ->orWhere('estado','D')
            ->orWhere('estado','RN')
            ->orderby('npedido','ASC')
            ->get();
        }else{
            $pedidos=Pedidos::select(['*',
            'npedido', 
            'codigo',
            'clienteNombre',
            'descripcion as Articulo',
            'estado',
            'femis',
            'prodHabitual',
            'poliNumero as polId',
            'caras',
                DB::raw("(Select Count(*) From tbl_log_pedidos as tbl_log Where (tbl_log.pedidoEstado = 'R' or tbl_log.pedidoEstado = 'RR' or tbl_log.pedidoEstado = 'RN' or tbl_log.pedidoEstado = 'NO' or tbl_log.pedidoEstado = 'PX' or tbl_log.pedidoEstado = 'D' or tbl_log.pedidoEstado = 'NC') and tbl_log.pedidoId = npedido) as devolucion")])
            ->where('estado','A')
            ->orWhere('estado','D')
            ->orWhere('estado','RN')
            ->whereRaw("codigo REGEXP '^".$codigo."'") 

            ->orderby('npedido','ASC')

            ->get();
        }

        //dd(DB::getQueryLog());        
        //dd($pedidos);
       
        return view('pedidos.recibidos',compact('user','pedidos'));  
    }



    public function ajaxPedidoLogs($pedido_id){
        //'id_usuario','usuarioId'
        $logs=DB::select("SELECT log.*, u.nombre_real as 'usuario' FROM tbl_log_pedidos as log LEFT JOIN usuarios as u ON log.usuarioId=u.id_usuario WHERE pedidoId='".$pedido_id."';");//Pedidos::find($pedido_id)->logs;
       
        return response()->json(['success'=>'Got Simple Ajax Request.','result'=>$logs  ]);
    }
}
