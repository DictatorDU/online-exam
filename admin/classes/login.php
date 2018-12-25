<?php
class loginClass{
  private $tbl_admin = "tbl_admin";
  private $email;
  private $password;

   public function email($email){
     $this->email = $email;
   }
   public function password($password){
     $this->password = $password;
   }

  public function emailChk(){
    $sql = "SELECT * FROM $this->tbl_admin WHERE email=:email";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam(":email",$this->email);
    $stmt->execute();
    if($stmt->rowCount() > 0){
      return true;
    }else{
      return false;
    }
  }
  public function passChk(){
    $sql = "SELECT password FROM $this->tbl_admin WHERE email=:email AND password=:password";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam("email",$this->email);
    $stmt->bindParam("password",$this->password);
    $stmt->execute();
    if($stmt->rowCount() > 0){
      return true;
    }else{
      return false;
    }
  }
  public function loginQuery(){
    $sql = "SELECT password FROM $this->tbl_admin WHERE email=:email AND password=:password";
    $stmt = db::examPrepare($sql);
    $stmt->bindParam("email",$this->email);
    $stmt->bindParam("password",$this->password);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$loginObj = new loginClass();
?>
