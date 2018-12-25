<?php 
 include('inc/header.php');
 include('classes/signup.php');
?>
<div class="col-left col">
  <img src="img/download (4).jpg" alt="">
</div>
<div class="col-right col">
  <?php
 if(isset($_POST['submit'])){
  $username = $formatObj->validation($_POST['username']);
  $email = $formatObj->validation($_POST['email']);
  $first_pass = $formatObj->passValidation($_POST['first_pass']);
  $con_pass = $formatObj->passValidation($_POST['con_pass']);

  $signupObj->username($username);
  $signupObj->email($email);
  $signupObj->first_pass($first_pass);
  $signupObj->con_pass($con_pass);

  if(empty($username)){
    $emptyUsername = "Empty username";
  }elseif(empty($email)){
    $emptyEmail = 'Empty email';
  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $invalidEmail = 'Invalid Email address..';
  }elseif($signupObj->chkEmail() == true){
    $exitsEmail = 'Email address already exits..';
  }elseif(empty($first_pass)){
    $emptyFpass = "Empty First Password field.";
  }elseif(empty($con_pass)){
    $emptyCon = "Empty confirm Password field";
  }elseif($first_pass != $con_pass){
    $notPass = "Password Not match..";
  }else{
    if($signupObj->insertData()){
       foreach ($signupObj->selectData() as $value) {
         session::set("signed",true);
         session::set("user_id",$value['user_id']);
         header("location:index.php");
       }
    }
  }
 }
?>
  <form class="loginform" action="" method="post">
    <input type="text" class="input" id="username" name="username" placeholder="Username" value="">
    <input type="text" class="input" id="email" name="email" placeholder="E-mail" value="">
    <input class="password-input" id="first_pass" type="password" id='first_pass' name="first_pass" placeholder="Password" value=""><br>
    <input type="checkbox" name="" onclick="password()" value=""><span class="show-pass">Show Password</span>

    <input class="password-input" id="con_pass" type="password" id='con_pass' name="con_pass" placeholder="Confirm Password" value=""><br>
    <input type="checkbox" name="" onclick="confirm()" value=""><span class="show-pass">Show Password</span><br>
    <span class="error">
      <?php 
      if(isset($emptyUsername)){echo $emptyUsername;}
      if(isset($emptyEmail)){echo $emptyEmail;}
      if(isset($invalidEmail)){echo $invalidEmail;}
      if(isset($exitsEmail)){echo $exitsEmail;}
      if(isset($emptyFpass)){echo $emptyFpass;}
      if(isset($emptyCon)){echo $emptyCon;}
      if(isset($notPass)){echo $notPass;}   
      ?>
    </span>
    <br>
    <input class="btn btn-info btn-sm" id="regi_submit" type="submit" name="submit" value="Signup">
    <p class="login_txt"><span class="show-pass">Already Have Account? </span><a href="login.php">Login</a></p>
  </form>
  <script type="text/javascript">
    function confirm(){
      var x = document.getElementById("con_pass");
      if(x.type === "password"){
        x.type = "text";
      }else{
        x.type = "password";
      }
    }
    function password(){
      var y = document.getElementById("first_pass");
      if(y.type === "password"){
        y.type = "text";
      }else{
        y.type = "password";
      }
    }
  </script>
</div>
<?php include('inc/footer.php');?>
