<?php 
class exam{
	private $tbl_user = "tbl_user";
	private $tbl_question = "tbl_question";
	private $tbl_ans = "tbl_ans";
	private $question_no;
	private $question_number;
	public function question_no($question_no){
		$this->question_no = $question_no;
	}
	public function question_number($question_number){
		$this->question_number = $question_number;
	}
	public function rowCount(){
		$sql = "SELECT * FROM $this->tbl_question";
		$stmt = db::examPrepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}
	public function chkQuestion(){
		$sql = "SELECT question_no FROM $this->tbl_question WHERE question_no=:question_no";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":question_no",$this->question_no);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function readQues(){
		$sql = "SELECT * FROM $this->tbl_question ORDER BY question_no DESC";
		$stmt = db::examPrepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function singleQues(){
		$sql = "SELECT * FROM $this->tbl_question WHERE question_no=:question_no LIMIT 1";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":question_no",$this->question_no);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function readOption(){
		$sql = "SELECT * FROM $this->tbl_ans WHERE question_no=:question_no";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":question_no",$this->question_no);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function readviewOption(){
		$sql = "SELECT * FROM $this->tbl_ans WHERE question_no=:question_number";
		$stmt = db::examPrepare($sql);
		$stmt->bindParam(":question_number",$this->question_number);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function allQuestion(){
		$sql = "SELECT * FROM $this->tbl_question";
		$stmt = db::examPrepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
$examObj = new exam();
?>