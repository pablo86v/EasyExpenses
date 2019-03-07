<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require_once 'composer/vendor/autoload.php';
    require_once 'clases/AccesoDatos.php';
    require_once 'clases/apis/tarjetaBancariaApi.php';


    $config['displayErrorDetails'] = true;
    $config['addContentLengthHeader'] = false;

    $app = new \Slim\App(["settings" => $config]);


    $app->add(function ($req, $res, $next){
		$response = $next($req, $res);
		return $response
			->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
	});

	
	
	//***************************  TARJETA BANCARIA ******************************
    $app->group('/tarjeta-bancaria', function () {

        $this->get('/traer[/]',       \TarjetaBancariaApi::class . ':TraerTodos');
        // $this->get('/traer-vista[/]', \TarjetaBancariaApi::class . ':TraerVista');
        $this->get('/traer-uno/{id}', \TarjetaBancariaApi::class . ':TraerUno');
        $this->post('/update',         \TarjetaBancariaApi::class . ':Update');
		
 
    });	
	
	
	
	
	
	
	
	
	$app->run();