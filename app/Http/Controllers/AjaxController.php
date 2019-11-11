<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;
class AjaxController extends Controller
{
    

    public function GetCamposObligatorios($campo_id){
        
        $campos_obligatorios=DB::table('tbl_formato_campos')->select('cmpId')->where('fId',$campo_id)->get();
        $result=array();
        foreach ($campos_obligatorios as $key => $item) {

            $result[]=$item->cmpId;
        }        
        return response()->json(['success'=>'Got Simple Ajax Request.','result'=>$result]);
    }


    public function SearchProduct($keyword){        

        $params=array(
            'xinput'=>$keyword,
            'xpage'=>1,
            'busq'=>1
        );     
           
        $url='http://58d70548161e.sn.mynetname.net:301/empaque_demo/buscarProducto.php';
        $response = Curl::to($url)
        ->withData($params )
        ->post();

        $result=json_decode($response,true);
        return response()->json(['success'=>'Products filtered.','products'=>$result]);
        
    }


    public function SearchClients($keyword){        
        
        $params=array(
            'xinput'=>array($keyword)
        );     
        $url='http://58d70548161e.sn.mynetname.net:301/empaque_demo/buscarCliente.php';
        $response = Curl::to($url)
        ->withData($params)
        ->post();
        /*
        $response = file_get_contents( 'jsons/clientes.json');
       */
        $result=json_decode($response,true);
        $response=array();
        return response()->json(['success'=>'Products filtered.','clients'=>$result]);
        
    }

    public function getFichaTecnica($product_code){
        
        $url='http://58d70548161e.sn.mynetname.net:301/empaque_demo/buscarProductoFicha.php';
        $response = Curl::to($url)
        ->withData( array( 'id' =>$product_code ) )
        ->withContentType('application/json')
        ->enableDebug('logFile.txt')
        
        ->returnResponseObject()
        ->get();

        return $response->content;
    }

    public function getFormatoCantidades($formato_id){

        $formato= DB::table("formatos_cantidades")->where('formato_id',$formato_id)->get()->all();
       
        return response()->json(['result'=>$formato]);
    }
}
