<?php
require_once 'venta.php';
require_once 'IApiUsable.php';
//use Slim\Http\Request;
//use Slim\Http\Response;
//use Slim\Http\UploadedFile;

class ventaApi extends venta implements IApiUsable
{
 	
  /*public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
        $laPizza=pizza::TraerUnaPizza($id);
        if(!$laPizza)
        {
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->error="No está La Pizza";
            $NuevaRespuesta = $response->withJson($objDelaRespuesta, 500); 
        }else
        {
            $NuevaRespuesta = $response->withJson($laPizza, 200); 
        }     
        return $NuevaRespuesta;
    }*/

   public function TraerUno($request, $response, $args) {
        return $NuevaRespuesta;
    }  
  
  public function TraerTodos($request, $response, $args) {  
    	return $newresponse;
    }
  
  public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $sabor= $ArrayDeParametros['sabor'];
        $cantidad= $ArrayDeParametros['cantidad'];
        
        $miventa = new venta();
        $miventa->sabor=$sabor;
        $miventa->cantidad=$cantidad;
        $miventa->InsertarVentaParametros();
        $archivos = $request->getUploadedFiles();
        //$response->getBody()->write("se guardo el cd");
        $objDelaRespuesta->respuesta="Se guardo la Venta.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
  
  public function BorrarUno($request, $response, $args) {
      	return $newResponse;
    }
     
  public function ModificarUno($request, $response, $args) {
		  return $response->withJson($objDelaRespuesta, 200);	
    }


}