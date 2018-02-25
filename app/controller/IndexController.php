<?php
namespace app\controller;
use app\model\Main;

class IndexController extends BaseController{

	

	public function __construct(){

		 $this->model = new Main;
		 $this->checkedSession();
	}

	
	public function expose(){

			$allUsers = $this->model->getAllUsers();
			$this->render('view', [ 'allUsers' => $allUsers]);

			}

		public function show($params){

				$id = $params['id'];
				$oneUser = $this->model->getOneUser($id);
				$this->render('view_one', [ 'oneUser' => $oneUser]);
		}

		public function add($params, $post){
			
		print json_encode($this->model->addUser($post));

			//header('Location: /');

		}

		public function update($params, $post){
			$id = $params['id'];
			
			$this->model->updateUser($id, $post);
			header('Location: ?/index/show/id/'.$id);

		}

		public function delete($params){
				$id = $params['id'];
				$this->model->deleteUser($id);
			header('Location: /');

		}

	}