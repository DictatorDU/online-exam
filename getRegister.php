<?php
 include('inc/header.php');
 include('classes/signup.php');
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 	$username = $_POST['username'];
 	$email = $_POST['email'];
 	$first_pass = $_POST['first_pass'];
 	$con_pass = $_POST['con_pass'];

 	$signupObj->username($username);
 	$signupObj->email($email);
 	$signupObj->first_pass($first_pass);
 	$signupObj->con_pass($con_pass);

 	if(empty($username)){
 		echo "Empty username";
 		exit();
 	}elseif(empty($email)){
 		echo 'Empty email';
 		exit();
 	}elseif(empty($first_pass)){
 		echo "Empty First Password field.";
 		exit();
 	}elseif(empty($con_pass)){
 		echo "Empty confirm Password field";
 		exit();
 	}elseif($first_pass != $con_pass){
        echo "Password Not match..";
        exit();
 	}elseif($signupObj->chkEmail() == true){
 		echo 'Email address already exits..';
 		exit();
 	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 		echo 'Invalid Email address..';
 		exit();
 	}else{
      if($signupObj->insertData()){
      	echo "You have successfully created your account..";
      	exit();
      }
 	}

 	


 }
?>