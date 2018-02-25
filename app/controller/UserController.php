<?php
namespace app\controller;
use app\model\User;

class UserController extends BaseController{

	

		public function __construct(){

			$this->model = new User;
		}



		public function signup($params, $post){
			
			if(!empty($post)){
				if($this->model->validate($post)){
				//$this->model->load($post);
				$this->model->saveUser();
				unset($_SESSION['form_data']);
				header('Location:'.$_SERVER['HTTP_REFERER']);
				exit;
			}
			else {
				$this->model->getErrors();
				$_SESSION['form_data'] = $post;
				header('Location:'.$_SERVER['HTTP_REFERER']);
				exit;
			}

		} 
		else {
			$this->render('signup');
		}
			
			
		}

		public function login($params, $post){

			

			if(!empty($post)){

				if($this->model->login($post)){
					header('Location: /');
					
				}
				else {
					$_SESSION['errors'] = "Login war nicht erfolgreich";
				}
			}
			$this->render('login');
		}

		public function logout(){

		
			if(isset($_SESSION['user'])) unset($_SESSION['user']);
			header('Location: ?/user/login');
			exit;
		}

		
}