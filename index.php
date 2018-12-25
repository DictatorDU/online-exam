<?php include('inc/header.php'); ?>
<?php include('classes/exam.php'); ?>
<?php 
 $signed = session::get("signed");
 if($signed == false){
  header("location:login.php");
}
?>
<div class="col-left col">
  <img src="img/online-education-india.jpg" alt="">
</div>
<?php 
foreach($examObj->readQues() as $value){
	$question_no = $value['question_no'];
}
?>
<div class="col-right col">
	<div class="over-view">
	<h3 class="view">Test your Knowledge</h3>
	<p>This multiple choise quiz to test your Knowledge.</p>
	<p><strong>Number of Question</strong>: <?php echo $examObj->rowCount();?></p>
	<p><strong>Question type</strong>: Myltiple Choise</p>
	<a class="start-view btn btn-info" href="exam.php?ques=<?php if(isset($question_no)){echo $question_no;}?>">Start Now</a>
	</div>
</div>
<?php include('inc/footer.php');?>