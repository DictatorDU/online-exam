<?php include('inc/login-header.php');?>
<?php include('classes/login.php');?>
<?php
if(session::chkSessionStared() == 'true'){
  header('location:index.php');
}
?>
<div class="admin-content">
  <?php
  if(isset($_POST['submit'])){
    $email = $formatObj->validation($_POST['email']);
    $password = $formatObj->validation($_POST['password']);

    $loginObj->email($email);
    $loginObj->password($password);

    if(empty($email)){
      $emptyEmail = "<p class='msg'>Empty email field.</p>";
    }elseif($loginObj->emailChk() == false){
      $notFoundEmail = "<p class='msg'>E-mail address not found.</p>";
    }elseif(empty($password)){
      $emptyPass = "<p class='msg'>Empty Password field.</p>";
    }elseif($loginObj->passChk() == false){
      $notMatchPass = "<p class='msg'>Password not match.</p>";
    }else{
      if($loginObj->loginQuery()){
      foreach ($loginObj->loginQuery() as $value) {
         session::set("admin_login",true);
         session::set("id",$value['admin_id']);
         header('location:index.php');
      }
     }
   }
  }
  ?>

  <div class="admin-login">
    <form class="" action="" method="post">
      <?php
      if(isset($emptyEmail)){echo $emptyEmail;}
      elseif(isset($notFoundEmail)){echo $notFoundEmail;}
      ?>
      <input class="login-email" type="text" name="email" placeholder="E-mail" value="<?php if(isset($email)){echo $email;}?>">
      <span class="passMsg"><?php if(isset($notMatchPass)){echo $notMatchPass;}elseif(isset($emptyPass)){echo $emptyPass;} ?></span>
      <input class="login-password" type="password" name="password" id='passwordLog' value="<?php if(isset($password)){echo $password;}?>" placeholder="Password">
      <input type="checkbox" onclick="showlogpass()"> <span>Show Password</span>
      <input class="btn btn-info" type="submit" name="submit" value="Login">
    </form>
  </div>
</div>
<?php include('inc/footer.php');?>
