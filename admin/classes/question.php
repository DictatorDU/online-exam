<?php
class question{
  private $tbl_question = 'tbl_question';
  private $tbl_ans = 'tbl_ans';
  private $question_no;
  private $question_notwo;
  private $right_ans = 1;
  public function question_no($question_no){
    $this->question_no = $question_no;
  }public function question_notwo($question_notwo){
    $this->question_notwo = $question_notwo;
  }
  public function readQuestion(){
    $sql = "SELECT * FROM $this->tbl_question ORDER BY ques_id ASC";
    $stmt = db::examPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function readAns(){
    $sql = "SELECT * FROM $this->tbl_ans WHERE question_no=:question_notwo AND right_ans=:right_ans";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_notwo",$this->question_notwo);
    $stmt->bindParam(":right_ans",$this->right_ans);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function deleteQuestion(){
    $sql = "DELETE FROM $this->tbl_question WHERE question_no=:question_no";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_no",$this->question_no);
    return $stmt->execute();
  }
  public function deleteAns(){
    $sql = "DELETE FROM $this->tbl_ans WHERE question_no=:question_no";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_no",$this->question_no);
    return $stmt->execute();
  }
}
$questionObj = new question();
?>
