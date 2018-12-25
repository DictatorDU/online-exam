<?php include('inc/header.php');?>
<?php include('classes/question.php');?>
<?php
if(isset($_GET['delete-question']) && $_GET['delete-question'] != NULL){
  $question_no = $_GET['delete-question'];
  $questionObj->question_no($question_no);
  if($questionObj->deleteQuestion()){
    if($questionObj->deleteAns()){
    header("location:question.php");
   }
  }
}
?>
<table class="table">
  <thead class="thead">
    <tr class="thead-tr">
      <th class="serial">No</th>
      <th class="question">Question</th>
      <th class="question-ans">Ans</th>
      <th class="question-action">Action</th>
    </tr>
  </thead>
  <?php
  $i = 0;
  foreach($questionObj->readQuestion() as $value){
    $question_notwo = $value['question_no'];
    $questionObj->question_notwo($question_notwo);
  $i++;
  ?>
  <tr class="tr-content">
    <td><?php echo $i;?></td>
    <td style="text-align:Left;padding-left:5px;"><?php echo $value['question'];?></td>
    <td style="text-align:center;padding-left:10px;"><?php 
    foreach($questionObj->readAns() as $val2){
      echo $val2['option'];
    }
      ?></td>
    <td>
      <a href="view-question.php?view-question=<?php echo $value['question_no'];?>">View</a> ||
      <a href="question-edit.php?edit-question=<?php echo $value['question_no'];?>">Edit</a> ||
      <a href="?delete-question=<?php echo $value['question_no'];?>">Delete</a>
    </td>
  </tr>
<?php } ?>
</table>
<?php include('inc/footer.php');?>
