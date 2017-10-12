<?php
class pizza
{
	public $id;
 	public $sabor;
  	public $tipo;
  	public $cantidad;
    public $foto;

    public static function TraerTodasLasPizzas()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, sabor, tipo, cantidad, foto from pizza");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "pizza");		
	}
    
    public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->sabor."  ".$this->tipo."  ".$this->cantidad." ".$this->foto;
	}


  	public function BorrarPizza()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from pizza 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	/*public static function BorrarPersonaPorMail($año)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from persona 				
				WHERE mail=:mail");	
				$consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);		
				$consulta->execute();
				return $consulta->rowCount();

	 }
	public function ModificarPersona()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update persona
				set nombre='$this->nombre',
				apellido='$this->apellido',
				mail='$this->mail',
				sexo='$this->sexo',
				foto='$this->foto',
				password='$this->password'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarPersona()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into persona (nombre,apellido,mail,sexo,foto,password)values('$this->nombre','$this->apellido','$this->mail','$this->sexo','$this->foto','$this->password')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	  public function ModificarPersonaParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update persona 
				set nombre=:nombre,
				apellido=:apellido,
				mail=:mail,
				sexo=:sexo,
				foto=:foto',
				password=:password
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
			$consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
			$consulta->bindValue(':sexo',$this->sexo, PDO::PARAM_STR);
			$consulta->bindValue(':foto',$this->foto, PDO::PARAM_STR);
			$consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
			return $consulta->execute();
	 }*/

	 public function InsertarPizzaParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into pizza (sabor,tipo,cantidad,foto)values(:sabor,:tipo,:cantidad,:foto)");
				$consulta->bindValue(':sabor',$this->sabor, PDO::PARAM_STR);
				$consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
				$consulta->bindValue(':cantidad',$this->cantidad, PDO::PARAM_STR);
				$consulta->bindValue(':foto',$this->foto, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 /*public function GuardarPersona()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarPersonaParametros();
	 		}else {
	 			$this->InsertarPersonaParametros();
	 		}

	 }*/


	public static function TraerUnaPizza($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, sabor, tipo, cantidad, foto from pizza where id = $id");
			$consulta->execute();
			$pizzaBuscada= $consulta->fetchObject('pizza');
			return $pizzaBuscada;				
			
	}

	public static function TraerUnaPizzaSabor($sabor) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, sabor, tipo, cantidad, foto from pizza WHERE sabor= $sabor");
			$consulta->bindValue(':sabor', $sabor, PDO::PARAM_STR);
			$consulta->execute();
			$pizzaBuscada= $consulta->fetchObject('pizza');
      		return $pizzaBuscada;				

			
	}

	/*public static function TraerUnaPersonaMailArray($id,$mail) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre, apellido, mail, sexo, foto, password from persona  WHERE id=? AND mail=?");
			$consulta->execute(array($id, $mail));
			$personaBuscada= $consulta->fetchObject('persona');
      		return $personaBuscada;				

			
	}

	public static function TraerUnaPersonaParamSexo($id,$sexo) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre, apellido, mail, sexo, foto, password from persona WHERE id=:id OR sexo=:sexo");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':sexo', $sexo, PDO::PARAM_STR);
			$consulta->execute();
			$personaBuscada= $consulta->fetchObject('persona');
      		return $personaBuscada;				

			
	}
	
	public static function TraerUnaPersonaParamNombreApellidoArray($nombre,$apellido) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre, apellido, mail, sexo, foto, password from persona  WHERE nombre=:nombre OR apellido=:apellido");
			$consulta->execute(array(':nombre'=> $nombre,':apellido'=> $apellido));
			$consulta->execute();
			$personaBuscada= $consulta->fetchObject('persona');
      		return $personaBuscada;				

			
	}*/

	
}