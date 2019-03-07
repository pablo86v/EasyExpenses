<?php
require_once "AccesoDatos.php";

class tarjetaBancaria
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
public $idTarjeta  ;
public $marca      ;
public $entidad    ;
public $cierre     ;
 

	
	

//--CONSTRUCTOR
	public function __construct($dni=NULL)
	{
		// if($dni != NULL){
			// $obj = usuario::TraerUnUsuario($dni);
			
			// $this->password = $obj->password;
			// $this->usuario = $obj->usuario;
		// }
	}



 	 public static function TraerTodos() 
	 {	
	 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	 	$consulta =$objetoAccesoDato->RetornarConsulta("select * from TarjetaBancaria");
	 	$consulta->execute();
	 	$arrViajes= $consulta->fetchAll(PDO::FETCH_CLASS, "tarjetaBancaria");	
		return $arrViajes;					
	 }

	// public static function TraerVista()
	// {
		// $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		// $consulta =$objetoAccesoDato->RetornarConsulta("select * from viewListaViajes");

		// $consulta->execute();					 
		
		// $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
		// return $result;
		
	// }
	

	public static function TraerUno($idParametro)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from TarjetaBancaria where idTarjeta =:id");
		$consulta->bindValue(':id', $idParametro, PDO::PARAM_INT);
		$consulta->execute();
		$objViaje= $consulta->fetchObject('tarjetaBancaria');
		return $objViaje;			
	}

	public static function Update($tarjetaBancaria)
	{
			
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("update TarjetaBancaria set marca = :marca,entidad = :entidad, cierre = :cierre where idTarjeta=:idTarjeta");
		$consulta->bindValue(':marca'     , $tarjetaBancaria->marca    , PDO::PARAM_STR);
		$consulta->bindValue(':entidad'   , $tarjetaBancaria->entidad  , PDO::PARAM_STR);
		$consulta->bindValue(':cierre'    , $tarjetaBancaria->cierre   , PDO::PARAM_STR);
		$consulta->bindValue(':idTarjeta' , $tarjetaBancaria->idTarjeta, PDO::PARAM_INT);
		
		$consulta->execute();
		return $consulta->rowCount();
		
	}
	

}