<?php include('inc/header.php'); ?>
<?php include('classes/exam.php'); ?>
<?php 
 $signed = session::get("signed");
 if($signed == false){
  header("location:login.php");
}
?>
<?php 
if(isset($_SESSION['score'])){
$totalRow = $examObj->rowCount();
$incorrect = $totalRow - $_SESSION['score'];
$correct = $totalRow - $incorrect;
}else{
	$done = "<h2>Your Exam is done..</h2>";
}
?>
<div class="col-left col">
  <img width='310px' src="img/online_exam-1.jpg" alt="">
</div>
<div class="col-right col">
	<div class="over-view exam">
	<h3 class="view">Result</h3>
	 <?php
	 if(isset($done)){echo $done;}
	 if(isset($_SESSION['score'])){
	 ?>
     <p>Congrats. You have complete your Exam.</p>
     <p>Total questions is: <?php echo $totalRow;?></p>
     <p>Total Correct answer: <?php echo $correct;?></p>
     <p>Total Incorrect answer: <?php echo $incorrect;?></p>
 <?php } ?>
     	<?php 
     	if(isset($_SESSION['score'])){
     		echo "<p><strong>Score is :".$_SESSION['score']."</strong></p>";
     	} 
     	?>
     <?php if(isset($_SESSION['score'])){?>		
      <a href="view-answer.php" class="btn btn-danger">View Answer</a>
		<?php 
		unset($_SESSION['score']);
		} 
		?>
      <a href="exam.php" class="btn btn-danger">Start again</a>
	</div>
</div>
<?php include('inc/footer.php');?>