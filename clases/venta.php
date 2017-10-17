<?php
class venta
{
	public $id;
 	public $sabor;
  	public $cantidad;

  	public function mostrarDatos()	
	{
	  	return "Metodo mostar:".$this->sabor." ".$this->cantidad." ";
	}

	public function InsertarVentaParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into venta (sabor,cantidad)values(:sabor,:cantidad)");
				$consulta->bindValue(':sabor',$this->sabor, PDO::PARAM_STR);
				$consulta->bindValue(':cantidad',$this->cantidad, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	

	
}