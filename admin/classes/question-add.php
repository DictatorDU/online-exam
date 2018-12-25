<?php
class question_add{
  private $tbl_question = "tbl_question";
  private $tbl_ans = "tbl_ans";
  private $one = 1;
  private $zero = 0;
  private $question_no;
  private $question;
  private $option_one;
  private $option_two;
  private $option_three;
  private $option_four;
  private $correct_ans;
  public function question_no($question_no){
    $this->question_no = $question_no;
  }
  public function question($question){
    $this->question = $question;
  }
  public function option_one($option_one){
    $this->option_one = $option_one;
  }
  public function option_two($option_two){
    $this->option_two = $option_two;
  }
  public function option_three($option_three){
    $this->option_three = $option_three;
  }
  public function option_four($option_four){
    $this->option_four = $option_four;
  }
  public function correct_ans($correct_ans){
    $this->correct_ans = $correct_ans;
  }
  public function rowCount(){
    $sql = "SELECT * FROM $this->tbl_question ORDER BY ques_id ASC";
    $stmt = db::examPrepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
  }
  public function insertInQestion(){
    $sql = "INSERT INTO $this->tbl_question(question_no,question) VALUES(:question_no,:question)";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_no",$this->question_no);
    $stmt->bindParam(":question",$this->question);
    return $stmt->execute();
  }
  public function insertInAnsOp1(){
    $sql = "INSERT INTO $this->tbl_ans(question_no,option) VALUES(:question_no,:option)";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_no",$this->question_no);
    $stmt->bindParam(":option",$this->option_one);
    return $stmt->execute();
  }
  public function insertInAnsOp2(){
    $sql = "INSERT INTO $this->tbl_ans(question_no,option) VALUES(:question_no,:option)";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_no",$this->question_no);
    $stmt->bindParam(":option",$this->option_two);
    return $stmt->execute();
  }
  public function insertInAnsOp3(){
    $sql = "INSERT INTO $this->tbl_ans(question_no,option) VALUES(:question_no,:option)";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_no",$this->question_no);
    $stmt->bindParam(":option",$this->option_three);
    return $stmt->execute();
  }
  public function insertInAnsOp4(){
    $sql = "INSERT INTO $this->tbl_ans(question_no,option) VALUES(:question_no,:option)";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":question_no",$this->question_no);
    $stmt->bindParam(":option",$this->option_four);
    return $stmt->execute();
  }
  public function upAnswer(){
    $ans = array();
    $ans[1] = $this->option_one;
    $ans[2] = $this->option_two;
    $ans[3] = $this->option_three;
    $ans[4] = $this->option_four;
    $current = $ans[$this->correct_ans];
    $sql = "UPDATE $this->tbl_ans SET right_ans=:one WHERE question_no=:question_no AND option=:option";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":one",$this->one);
    $stmt->bindParam(":question_no",$this->question_no);
    $stmt->bindParam(":option",$current);
    return $stmt->execute();
  }
}
$question_addObj = new question_add();
?>
