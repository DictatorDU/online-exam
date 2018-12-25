<?php include('inc/header.php'); ?>
<?php include('classes/exam.php'); ?>
<?php 
 $signed = session::get("signed");
 if($signed == false){
  header("location:login.php");
}
?>
<?php 
$totalRow = $examObj->rowCount();
?>
<div class="view-answer">
  <div class="view-two">
  	<?php 
  	foreach($examObj->allQuestion() as $value){
  		$question_number = $value['question_no'];
  		$examObj->question_number($question_number);
  	?>
	<h2>Ques.<?php echo $value['question_no']; ?> : <?php echo $value['question']; ?></h2>
	<ul>
		<?php foreach($examObj->readviewOption() as $options){?>
		<li <?php if($options['right_ans'] == 1){echo "id='right-ans'";}?>><?php echo $options['option']?></li>
	    <?php } ?>
	</ul>
<?php } ?>
  </div>
</div>
<?php include('inc/footer.php');?>