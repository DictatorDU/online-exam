<?php 
include("connection/db.php");
include("helper/session.php");
include("helper/format.php");
include("classes/header.php");
session::init();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="style/custom-bootstrap.css">
<link rel="stylesheet" href="style/style.css">
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<title>Document</title>
</head>
<body>
<?php $getId = session::get("id");
$headerObj->user_id($getId);
if(isset($_GET['action']) && $_GET['action'] != NULL){
  session::sessionDestroy();
}
$path = $_SERVER['SCRIPT_FILENAME'];
$c_page = basename($path,".php");
if($c_page == 'login'){
 $signed = session::get("signed");
 if($signed == true){
  header("location:index.php");
 }
}
if($c_page == 'signup'){
 $signed = session::get("signed");
 if($signed == true){
  header("location:index.php");
 }
}
?>
 <div class="template clear">
   <div class="header clear">
     <?php
     if($c_page == 'login'){
       echo '<img src="img/banner.jpg" alt="" />';
     }elseif($c_page == 'signup'){
       echo '<img src="img/banner.jpg" alt="" />';
     }else{
       echo '<img src="img/banner.jpg" alt="" />';
     }
     ?>
   </div>
   <div class="menubar">
     <nav>
     <ul class="ul">
      <?php 
      $signed = session::get("signed");
      if($signed == false){
      ?>
       <li><a
         <?php if($c_page == 'login'){echo 'id="active"';}?>
         href="login.php">Login</a>
       </li>
       <li><a
         <?php if($c_page == 'signup'){echo "id='active'";}?>
         href="signup.php">Signup</a>
       </li>
     <?php } ?>
     <?php 
      if($signed == true){
      ?>
       <li><a
         <?php if($c_page == 'index'){echo "id='active'";}?>
         <?php if($c_page == 'exam'){echo "id='active'";}?>
         <?php if($c_page == 'result'){echo "id='active'";}?>
         <?php if($c_page == 'view-answer'){echo "id='active'";}?>
         href="index.php">Exam</a>
       </li>
       <li><a
         <?php if($c_page == 'profile'){echo "id='active'";}?>
         href="profile.php">Profile</a>
       </li>
       <li>
        <a href="?action=logout">Logout</a>
      </li>
    <div class="user-div">
      <div class="user-divtwo">
        <img src="icon/icons8-person-16.png" alt="">
       <span><?php
       foreach($headerObj->readData() as $value){
        echo $value['name'];
       } 
       ?></span>
      </div>
     </div>
     <?php } ?>
     </ul>
     </nav>
   </div>
<div class="main-content clear">
<div class="row">
<p class="headline">Online Exam System -
  <?php
  if($c_page == "login"){echo "User Login";}
  elseif($c_page == "signup"){echo "User Signup (Free)";}
  elseif($c_page == "index"){echo "Welcome to the Online Exam";}
  elseif($c_page == "profile"){echo "Your profile";}
  elseif($c_page == "exam"){echo "Welcome to the Exam";}
  elseif($c_page == "result"){echo "Your Exam completed.";}
  elseif($c_page == "view-answer"){echo "Your Exam details";}
  ?>
</p>
