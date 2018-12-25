<?php
class header{
	private $tbl_user = "tbl_user";
	private $user_id;
	
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
} 
$headerObj = new header();
?>