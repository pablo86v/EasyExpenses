<?php

    include_once __DIR__ . '/../TarjetaBancaria.php';
    require_once __DIR__ . '/../AutentificadorJWT.php';

    class TarjetaBancariaApi
    {

        public static function TraerTodos($request, $response, $args){
            
            return $response->withJson(TarjetaBancaria::TraerTodos(), 200);
        }

        public static function TraerUno($request, $response, $args){

            $id = json_decode($args['id']);

            $resultado = TarjetaBancaria::TraerUno($id);

            if(!is_null($resultado))
                return $response->withJson($resultado, 200);
            else
                return $response->withJson("La tarjetaBancaria buscada no existe", 500);
        }

		public static function TraerVista($request, $response, $args){
            
            return $response->withJson(TarjetaBancaria::TraerVista(), 200);
        }
		
		
		public static function Update ($request, $response, $args){
		
			$datosRecibidos = $request->getParsedBody();
			
			$tarjetaBancaria = new TarjetaBancaria();
			$tarjetaBancaria->idTarjeta             = $datosRecibidos['idTarjeta'];    
			$tarjetaBancaria->marca          	    = $datosRecibidos['marca'];
			$tarjetaBancaria->entidad           	= $datosRecibidos['entidad'];
			$tarjetaBancaria->cierre       	        = $datosRecibidos['cierre'];
	 			
			// var_dump($tarjetaBancaria);
			
			$resultado = TarjetaBancaria::Update($tarjetaBancaria);
			
			if($resultado != 0)
                return $response->withJson(true, 200);
            else
                return $response->withJson("Ha ocurrido un error actualizando la tarjetaBancaria. Inténtelo nuevamente.", 500);
		}
		
		
		
        // public static function Insertar($request, $response, $args){

            // $datosRecibidos = $request->getParsedBody();

            // $tarjetaBancaria = new TarjetaBancaria();
            // $tarjetaBancaria->marca = $datosRecibidos['marca'];
            // $tarjetaBancaria->modelo = $datosRecibidos['modelo'];
            // $tarjetaBancaria->anio = $datosRecibidos['anio'];
            // $tarjetaBancaria->color = $datosRecibidos['color'];
            // $tarjetaBancaria->dominio = $datosRecibidos['dominio'];
            // $tarjetaBancaria->foto = $datosRecibidos['foto'];  
            // $tarjetaBancaria->cantPuertas = $datosRecibidos['puertas'];
            // $tarjetaBancaria->utilitario = $datosRecibidos['utilitario'];
            // $tarjetaBancaria->aireAcondicionado = $datosRecibidos['aireAcond'];

            // var_dump($tarjetaBancaria);
    
            // $resultado = TarjetaBancaria::Insertar($tarjetaBancaria);
    
            // if(is_numeric($resultado) == true)
                // return $response->withJson(true, 200);
            // else
                // return $response->withJson("Ha ocurrido un error insertando el vehículo. Inténtelo nuevamente.", 500);
        // }

        // public static function GuardarImg($request, $response, $args)
        // {
            // $foto = $_FILES[ 'file' ][ 'tmp_name' ];
            // $rutaGuardar = "assets". DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "TarjetaBancarias" . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];
            
            // if(move_uploaded_file( $foto, $rutaGuardar ))
                // return $response->withJson($rutaGuardar, 200);
            // else
                // return $response->withJson("La imagen no se pudo guardar. Intente nuevamente.", 500);
            
        // }
		
		
    }
