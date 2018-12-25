<?php
/**
  * Login class 
  */
 class login{
 	private $tbl_user = 'tbl_user';
 	private $email;
 	private $password;
 	public function email($email){
 		$this->email = $email;
 	}
 	public function password($password){
 		$this->password = $password;
 	}
 	public function chkEmail(){
 		$sql = "SELECT email FROM $this->tbl_user WHERE email=:email";
 		$stmt = db::examPrepare($sql);
 		$stmt->bindParam(":email",$this->email);
 		$stmt->execute();
 		if($stmt->rowCount()>0){
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function chkPass(){
 		$sql = "SELECT password FROM $this->tbl_user WHERE email=:email";
 		$stmt = db::examPrepare($sql);
 		$stmt->bindParam(":email",$this->email);
 		$stmt->execute();
 		return $stmt->fetchAll();
 	}
 	public function chkActivity(){
 		$sql = "SELECT status FROM $this->tbl_user WHERE email=:email";
 		$stmt = db::examPrepare($sql);
 		$stmt->bindParam(":email",$this->email);
 		$stmt->execute();
 		return $stmt->fetchAll();
 	}
 	public function logined(){
 		$sql = "SELECT * FROM $this->tbl_user WHERE email=:email";
 		$stmt = db::examPrepare($sql);
 		$stmt->bindParam(":email",$this->email);
 		$stmt->execute();
 		return $stmt->fetchAll();
 	}
 } 
 $loginObj = new login();
?>