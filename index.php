<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\UploadedFileInterface as UploadedFile;

require '/composer/vendor/autoload.php';
require_once '/clases/AccesoDatos.php';
require_once '/clases/pizzaApi.php';
//require_once '/clases/usuarioApi.php';
//require_once '/clases/loginApi.php';
//require_once '/clases/AutentificadorJWT.php';
require_once '/clases/MWparaCORS.php';
//require_once '/clases/MWparaAutentificar.php';

//use Slim\Http\Request;
//use Slim\Http\Response;
//use Slim\Http\UploadedFile;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);



/*LLAMADA A METODOS DE INSTANCIA DE LA CLASE pizzaApi*/
$app->group('/pizza', function () {
 
  $this->get('/', \pizzaApi::class . ':traerTodos');

  $this->get('/{sabor}', \pizzaApi::class . ':traerUno');
 
  //$this->get('/{id}', \pizzaApi::class . ':traerUno');

  $this->post('/', \pizzaApi::class . ':CargarUno');

  //$this->delete('/', \pizzaApi::class . ':BorrarUno');
  $this->delete('/{id}', \pizzaApi::class . ':BorrarUno');

  $this->put('/', \pizzaApi::class . ':ModificarUno');
     
})->add(\MWparaCORS::class . ':HabilitarCORSTodos');


$app->run();