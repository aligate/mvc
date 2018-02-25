<?php
namespace app\model;
require 'vendor/DB.php';


class Model {

protected $db;
public $attributes = [];
public $errors = [];
public $rules = [];

public function __construct(){

		
		$this->db = \DB::getDbConnection();
	}


	

	public function load($data){

		foreach($this->attributes as $name =>$value){

				if(isset($data[$name])){
						$this->attributes[$name] = $data[$name];
				}
		}
	}

	public function validate($data){
		$this->load($data);
		
		require 'vendor/autoload.php';
		$valid = new \Valitron\Validator($this->attributes);
		$valid->rules($this->rules);
		
		
		if($valid->validate() && $this->checkUnique()){
			return true;
		}
		$this->errors = $valid->errors();
		$this->checkUnique();
		return false;
	}


	public function checkUnique(){

			$stmt = $this->db->prepare("SELECT * FROM user WHERE login=? OR email=? LIMIT 1");
			$stmt->execute([$this->attributes['login'], $this->attributes['email']] );
			$res = $stmt->fetch();
			if(!empty($res)){
				if($res['login'] == $this->attributes['login']){
				$this->errors['login'][] = "Diese Login existiert schon";
				
			}
			if($res['email'] == $this->attributes['email']){
				$this->errors['email'][] = "Diese Email existiert schon";
				
				}
				return false;
			}
			
			else {
				return true;
			}

		}

	public function getErrors(){

		if(!empty($this->errors)){
			$errors = '<ul>';
			foreach($this->errors as $error){
				foreach($error as $item){
					$errors .= '<li>'.$item.'</li>';
				}
			}
			$errors .= '</ul>';
			$_SESSION['errors'] = $errors;

		}
		
	}

}

