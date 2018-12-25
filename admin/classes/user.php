<?php
  class index{
    private $tbl_user = "tbl_user";
    private $user_id;
    public function user_id($user_id){
      $this->user_id = $user_id;
    }
    public function readResult(){
      $sql = "SELECT * FROM $this->tbl_user ORDER BY user_id ASC";
      $stmt = db::examPrepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }
    public function delUser(){
      $sql =  "DELETE FROM $this->tbl_user WHERE user_id=:user_id";
      $stmt= db::examPrepare($sql);
      $stmt->bindParam(":user_id",$this->user_id);
      return $stmt->execute();
    }
    public function disable_user(){
      $sql = "UPDATE $this->tbl_user SET status=1 WHERE user_id=:user_id";
      $stmt = db::examPrepare($sql);
      $stmt->bindParam(":user_id",$this->user_id);
      return $stmt->execute();
    }
    public function enable_user(){
      $sql = "UPDATE $this->tbl_user SET status=0 WHERE user_id=:user_id";
      $stmt = db::examPrepare($sql);
      $stmt->bindParam(":user_id",$this->user_id);
      return $stmt->execute();
    }
    }
  $indexObj = new index();
?>
