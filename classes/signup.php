<?php 
/**
 * Registration class
 */
class signup{
	private $tbl_user = 'tbl_user';
	private $username;
	private $email;
	private $first_pass;
	private $con_pass;
	public function username($username){
		$this->username = $username;
	}
	public function email($email){
		$this->email = $email;
	}
	public function first_pass($first_pass){
		$this->first_pass = $first_pass;
	}
	public function con_pass($con_pass){
		$this->con_pass = $con_pass;
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
	public function insertData(){
		$sql = "INSERT INTO $this->tbl_user(name,email,password) VALUES(:name,:email,:password)";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":name",$this->username);
		$stmt->bindParam(":email",$this->email);
		$stmt->bindParam(":password",$this->con_pass);
		return $stmt->execute();
	}
	public function selectData(){
		$sql = "SELECT * FROM $this->tbl_user WHERE email=:email";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":email",$this->email);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
$signupObj = new signup();
?>