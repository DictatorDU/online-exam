<?php 
class profile{
	private $tbl_user = "tbl_user";
	private $user_id;
	private $upEmail;
	private $upUsername;
	public function upUsername($upUsername){
		$this->upUsername = $upUsername;
	}
	public function upEmail($upEmail){
		$this->upEmail = $upEmail;
	}
    public function user_id($user_id){
    	$this->user_id = $user_id;
    }
	public function readData(){
		$sql = "SELECT * FROM $this->tbl_user WHERE user_id=:user_id";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":user_id",$this->user_id);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function upData(){
		$sql = "UPDATE $this->tbl_user SET name=:name,email=:email WHERE user_id=:user_id";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":name",$this->upUsername);
		$stmt->bindParam(":email",$this->upEmail);
		$stmt->bindParam(":user_id",$this->user_id);
		return $stmt->execute();
	}
	public function chkupEmail(){
	  $sql = "SELECT email FROM $this->tbl_user WHERE email=:upEmail";
	  $stmt = db::examPrepare($sql);
	  $stmt->bindParam(":upEmail",$this->upEmail);
	  $stmt->execute();
	  if($stmt->rowCount()>0){
	  	return true;
	  }else{
	  	return false;
	  }
	}
}
$profileObj = new profile();
?>