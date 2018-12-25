<?php 
include('inc/header.php');
include('classes/login.php');
?>
<div class="col-left col">
  <img src="img/images (3).png" alt="">
</div>
<div class="col-right col">
  <?php 
  if(isset($_POST['submit'])){
    $email = $formatObj->validation($_POST['email']);
    $password = $formatObj->passValidation($_POST['password']);

    $loginObj->email($email);
    $loginObj->password($password);
    foreach($loginObj->chkPass() as $value){
      $currentPass = $value['password'];
    }
    foreach($loginObj->chkActivity() as $value){
      $status = $value['status'];
    }
    if(empty($email)){
      $emptyEmail = "Empty E-mail field.";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $invalidEmail = "Invalid E-mail Address.";
    }elseif($loginObj->chkEmail() == false){
      $notFoundEmail = "E-mail Address not found.";
    }elseif(empty($password)){
      $emptyPass = "Empty Password field.";
    }elseif($password != $currentPass){
      $passnotMatch = "Password not match.";
    }elseif($status == 1){
      $disableAcc = "Your account Disabled";
    }else{
      $loginObj->email($email);
      foreach ($loginObj->logined() as $val) {
         session::init();
         session::set("signed",true);
         session::set("id",$val["user_id"]);
         header("location:index.php");
       }
    }
 }
  ?>
  <form class="loginform" action="" method="post">
    <input class="input" type="text" name="email" placeholder="E-mail">
    <input class="password-input" id='pass'  type="password" name="password" placeholder="Password" value=""><br>
    <input type="checkbox" onclick="show()" name="" value=""><span class="show-pass">Show Password</span><br>
    <span class="error">
      <?php 
      if(isset($emptyEmail)){echo $emptyEmail;}
      if(isset($invalidEmail)){echo $invalidEmail;}
      if(isset($disableAcc)){echo $disableAcc;}
      if(isset($emptyPass)){echo $emptyPass;}
      if(isset($notFoundEmail)){echo $notFoundEmail;}
      if(isset($passnotMatch)){echo $passnotMatch;}
      ?>
    </span>
    <br>
    <input class="btn btn-info btn-sm" type="submit" name="submit" value="Login">
    <p>New user? <a href="signup.php">Signup</a> Free</p>
  </form>
  <script type="text/javascript">
    function show(){
      var x = document.getElementById('pass');
      if(x.type === "password"){
        x.type = "text";
      }else{
        x.type = "password";
      }
    }
  </script>
</div>
<?php include('inc/footer.php');?>
