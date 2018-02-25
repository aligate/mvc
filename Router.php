<?php

$pathList = strpos($_SERVER['REQUEST_URI'], '?') === false ? ['index', 'expose'] : explode( '/', trim($_SERVER['QUERY_STRING'], '/'));

if(count($pathList) < 2){
	$pathList = ['index', 'expose'];
} 

$controllerName = array_shift($pathList);

$action = array_shift($pathList);

foreach ($pathList as $i => $value){

	if($i % 2 == 0 && isset($pathList[$i + 1])){

		$params[$pathList[$i]] = $pathList[$i + 1];
	}
	
}

	$controller = 'app\controller\\'.ucfirst($controllerName).'Controller';
	$obj = new $controller();
	if(method_exists($controller, $action)){
		$obj->$action($params, $_POST);
	}
	