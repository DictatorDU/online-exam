<?php include('inc/header.php'); ?>
<?php include('classes/profile.php');

 $signed = session::get("signed");
 if($signed == false){
  header("location:login.php");
 }
 $u_id = session::get("id");
 $profileObj->user_id($u_id);
?>
<div class="content-div">
	<?php 
	if(isset($_POST['submit'])){
		$upUsername = $formatObj->validation($_POST['username']);
		$upEmail = $formatObj->validation($_POST['email']);
        $profileObj->upUsername($upUsername);
		$profileObj->upEmail($upEmail);

		  if(empty($upUsername)){
		    $emptyUpUsername = "<span style='color:red'>Empty username</span>";
		  }elseif(empty($upEmail)){
		    $emptyUpemail = '<span style="color:red">Empty email';
		  }elseif(!filter_var($upEmail,FILTER_VALIDATE_EMAIL)){
		    $invalidUpemail = '<span style="color:red">Invalid Email address..</span>';
		  }elseif($profileObj->chkupEmail() == true){
		    $exitsUpEmail = '<span style="color:red">Email address already exits..</span>';
		  }else{
			$profileObj->upData();
	      }
	    }
	?>
	<form action="" method="post">
		<table>
			<?php 
			foreach($profileObj->readData() as $value){ 
				$username = $value['name'];
			?>
			<tr>
				<td>Username</td>
				<td style='width:10%;text-align: center;'>:</td>
				<td>
					<?php if(isset($emptyUpUsername)){echo $emptyUpUsername;}?>
					<input type="text" name="username" value="<?php echo $value['name']?>">
				</td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td style='width:10%;text-align: center;'>:</td>
				<td>
					<?php if(isset($emptyUpemail)){echo $emptyUpemail;}?>
					<?php if(isset($invalidUpemail)){echo $invalidUpemail;}?>
					<?php if(isset($exitsUpEmail)){echo $exitsUpEmail;}?>
					<input type="text" name="email" value="<?php echo $value['email']?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-info" type="submit" name="submit" value="Update"></td>
			</tr>
		<?php 
	      }
	   ?>
		</table>
	</form>
</div>
<?php include('inc/footer.php');?>