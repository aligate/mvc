<?php

namespace app\model;


class User extends Model {

	public $attributes = [

		'login' =>'',
		'name' => '',
		'email' =>'',
		'password' =>''
		];

	public $rules = [

		'required' => [ 
				['login'],
				['email'],
				['password']

		         ],
		  'lengthMin' =>[
		  	['password', 6]

		  ],
		  'email' =>[
		  	['email']

		  ]

		];

		public function saveUser(){

				$column = [];
				$masks = [];
				foreach($this->attributes as $key => $value){
					$column[] = $key;
					$masks[] = ":$key";
					if($key == 'password'){
						$this->attributes[$key] = password_hash($this->attributes[$key],  PASSWORD_BCRYPT);
					}

				}
				
					$stmt = $this->db->prepare("INSERT INTO user (".implode(',', $column).") VALUES (".implode(',', $masks).")");
				$stmt->execute($this->attributes);
				if($stmt->rowCount()){
					$_SESSION['success'] = "<p>Sie sind erfolgreich registriert!</p>";
				}
				else {
						$_SESSION['errors'] = "<p>Fehler! Versuchen Sie spaeter noch einmal</p>";
				}
			
				
			}

			public function login($data){

				$login = !empty(trim($data['login'])) ? trim($data['login']) : null;
				$password = !empty(trim($data['password'])) ? trim($data['password']) : null;
				if($login && $password){
				$stmt = $this->db->prepare("SELECT * FROM user WHERE login=:login");
				$stmt->execute(['login' =>$login]);
				$user = $stmt->fetch();
				if($user){
						if(password_verify($password, $user['password'])){
							foreach($user as $k=>$v){
								if($k != 'password') $_SESSION['user'][$k] = $v;
							}
							return true;
						}
					}
				}
				
				else {
					return false;
				}
			}

		


}