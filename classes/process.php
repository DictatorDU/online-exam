<?php 
class process{
	private $tbl_user = "tbl_user";
	private $tbl_question = "tbl_question";
	private $tbl_ans = "tbl_ans";
	private $question_no;

	public function question_no($question_no){
		$this->question_no = $question_no;
	}

    public function readAns(){
	$sql = "SELECT * FROM $this->tbl_ans WHERE question_no = :question_no AND right_ans = 1";
	$stmt = db::examPrepare($sql);
	$stmt->bindParam(":question_no",$this->question_no);
	$stmt->execute();
	return $stmt->fetchAll();
    }
}
$processObj = new process();
?>