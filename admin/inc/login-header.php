<?php
include("connection/db.php");
include("helper/session.php");
include("helper/format.php");
session::admin_init();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="style/custom-bootstrap.css">
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/admin.css">
<title>Document</title>
<script src="js/admin.js"></script>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");
?>
</head>
<body>
  <?php
  if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    session::sessionDestroy();
  }
  $path = $_SERVER['SCRIPT_FILENAME'];
  $c_page = basename($path,".php");
  ?>
 <div class="template clear">
   <div class="header clear">
     <img src="img/banner.jpg" alt="">
   </div>
<div class="main-content clear">
<div class="row">

<p class="headline">Online Exam System -
  <?php
  if($c_page == "login"){echo "Admin Login";}
  elseif($c_page == "signup"){echo "User Signup (Free)";}
  elseif($c_page == "index"){echo "Dashboard";}
  ?>
</p>
