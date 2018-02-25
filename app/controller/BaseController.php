<?php
namespace app\controller;

class BaseController{

	protected $model;

	protected function render($template, $params = [])
	{
		$fileTemplate = 'views/'.$template.'.php';
		if (is_file($fileTemplate)) {
			ob_start();
			if (count($params) > 0) {
				extract($params);
			}
			include $fileTemplate;
			print ob_get_clean();
		}
	}

	protected function checkedSession(){

		if(!$_SESSION['user']) {
			header('Location: ?/user/login');
		}
		else {
			return true;
		}
		

	}
}


