<?php include('inc/header.php'); ?>
<?php include('classes/exam.php'); ?>
<?php include('classes/process.php'); ?>
<?php 
 $signed = session::get("signed");
 if($signed == false){
  header("location:login.php");
}
?>
<div class="col-left col">
  <img src="img/1427197190phptcm7ze.jpeg" alt="">
</div>
<?php 
if(isset($_GET['ques']) && $_GET['ques'] != NULL){
	if($examObj->chkQuestion() == false){
	$totalRow = $examObj->rowCount();
	$question_no = $_GET['ques'];
	$question_next = $question_no+1;
	$examObj->question_no($question_no);
	$processObj->question_no($question_no);
	
	foreach ($processObj->readAns() as $value) {
		$matchId = $value['ans_id'];
	}
	if($question_no > $totalRow){
		header("Location:result.php");
	}
	if(isset($_POST['submit'])){
	    $chacked = $_POST['ans'];
	   if(!$_SESSION['score']){
	   	 $_SESSION['score'] = "0";
	   }
	   if($matchId == $chacked){
	   	 $_SESSION['score']++;
	   }
	   if(1 == 1){
	   	header("location:exam.php?ques=$question_next");
	   }
	}
?>
<div class="col-right col">
	<div class="over-view exam">
	<h3 class="view">Question No <?php echo $question_no;?> of  <?php echo $totalRow;?></h3>
	<h4><?php 
	echo $question_no.". ";
	
	foreach($examObj->singleQues() as $value){
		echo $value['question'];
	} 
	?></h4>

	<form action="" method="post">
	<ul>
		<?php
		 foreach($examObj->readOption() as $value){
		  ?>
		<li><input type="radio" checked name="ans" value="<?php echo $value['ans_id'];?>"><?php echo $value['option']; ?> </li>
	<?php } ?>
	</ul>
	<input type="submit" name="submit" class="start-view btn btn-info" value="Submit & Continue">
	</form>
	</div>
</div>
<?php 
}else{
header("location:index.php");
}
}else{
header("location:index.php");
} 
?>
<?php include('inc/footer.php');?>