<?php
require_once 'pizza.php';
require_once 'IApiUsable.php';
//use Slim\Http\Request;
//use Slim\Http\Response;
//use Slim\Http\UploadedFile;

class pizzaApi extends pizza implements IApiUsable
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
      $sabor=$args['sabor'];
        $laPizza=pizza::TraerUnaPizzaSabor($sabor);
        if(!$laPizza)
        {
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->error="No esta La Pizza";
            $NuevaRespuesta = $response->withJson($objDelaRespuesta, 500); 
        }else
        {
            $NuevaRespuesta = $response->withJson($laPizza, 200); 
        }     
        return $NuevaRespuesta;
    }  
  
  public function TraerTodos($request, $response, $args) {
      	$todasLasPizzas=pizza::TraerTodasLasPizzas();
     	$newresponse = $response->withJson($todasLasPizzas, 200);  
    	return $newresponse;
    }
  
  public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $sabor= $ArrayDeParametros['sabor'];
        $tipo= $ArrayDeParametros['tipo'];
        $cantidad= $ArrayDeParametros['cantidad'];
        $foto= $ArrayDeParametros['foto'];
        
        $mipizza = new pizza();
        $mipizza->sabor=$sabor;
        $mipizza->tipo=$tipo;
        $mipizza->cantidad=$cantidad;
        $mipizza->foto=$foto;
        $mipizza->InsertarPizzaParametros();
        $archivos = $request->getUploadedFiles();
        $destino="../fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);
        if(isset($archivos['foto']))
        {
            $nombreAnterior=$archivos['foto']->getClientFilename();
            $extension= explode(".", $nombreAnterior)  ;
            //var_dump($nombreAnterior);
            $extension=array_reverse($extension);
            $archivos['foto']->moveTo($destino.$sabor.$tipo.".".$extension[0]);
        }       
        //$response->getBody()->write("se guardo el cd");
        $objDelaRespuesta->respuesta="Se guardo la Pizza.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
  
  public function BorrarUno($request, $response, $args) {
     
      /*if (isset($args['id'])
        {
         $id=$args['id'];
        } 
      else
        {
         $ArrayDeParametros = $request->getParsedBody();
         $id=$ArrayDeParametros['id'];
        }  */

      $id=$args['id'];

     	$pizza= new pizza();
     	$pizza->id=$id;
     	$cantidadDeBorrados=$pizza->BorrarPizza();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
  public function ModificarUno($request, $response, $args) {
      //$response->getBody()->write("<h1>Modificar  uno</h1>");
     	$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $mipizza = new pizza();
	    $mipizza->id=$ArrayDeParametros['id'];
	    $mipizza->sabor= $ArrayDeParametros['sabor'];
      $mipizza->tipo= $ArrayDeParametros['tipo'];
      $mipizza->cantidad= $ArrayDeParametros['cantidad'];
      $mipizza->foto= $ArrayDeParametros['foto'];
      //var_dump($mipizza);
	   	$resultado = $mipizza->ModificarPizzaParametros();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		  $objDelaRespuesta->resultado=$resultado;
      $objDelaRespuesta->tarea="modificar";
		  return $response->withJson($objDelaRespuesta, 200);	
    }


}