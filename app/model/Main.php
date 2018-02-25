<?php

namespace app\model;


class Main extends Model {

	

	

	public function getAllUsers(){

		$stmt = $this->db->prepare("SELECT * from user");
		$stmt->execute();
		return $stmt->fetchAll();

		}
		

	

	public function getOneUser($id){
		$stmt = $this->db->prepare("SELECT * from user WHERE id=:id");
		$stmt->execute(['id' => $id]);
		return $stmt->fetch();

	}

	public function addUser($array){
		$stmt = $this->db->prepare("INSERT INTO user ( login, password) VALUES (:login, :password)");
		$stmt->execute(['login' => $array['login'], 'password'=>md5($array['password'])]);
	$result = $this->db->query("SELECT * FROM user WHERE id=LAST_INSERT_ID()");
	return $result->fetch();
}

public function updateUser($id, $array){
		$stmt = $this->db->prepare("UPDATE  user SET login=:login, password=:password WHERE id=:id");
		$stmt->execute(['login' => $array['login'], 'password'=>md5($array['password']), 'id'=> $id]);
		
}

public function deleteUser($id){
		$stmt = $this->db->prepare("DELETE FROM  user  WHERE id=:id");
		$stmt->execute(['id'=> $id]);
		
}


}

