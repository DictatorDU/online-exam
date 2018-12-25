<?php include('inc/header.php');?>
<?php include('classes/question-add.php');?>
<div class="">
  <?php
    $next = 0;
    $totalrow = $question_addObj->rowCount();
    $next = $next + $totalrow;
    $next = $next+1;

  if(isset($_POST['submit'])){
    $question_no = $formatObj->validation($_POST['question_no']);
    $question = $formatObj->validation($_POST['question']);
    $option_one = $formatObj->validation($_POST['choise_one']);
    $option_two = $formatObj->validation($_POST['choise_two']);
    $option_three = $formatObj->validation($_POST['choise_three']);
    $option_four = $formatObj->validation($_POST['choise_four']);
    $correct_ans = $_POST['answer'];

    if(empty($question)){
      $emptyQuestion = "<span style='color:red'>Empty question.</span>";
    }elseif(empty($option_one)){
      $emptyOpOne = "<span style='color:red'>Empty question.</span>";
    }elseif(empty($option_two)){
      $emptyOpTwo = "<span style='color:red'>Empty question.</span>";
    }elseif(empty($option_three)){
      $emptyOpThree = "<span style='color:red'>Empty question.</span>";
    }elseif(empty($option_four)){
      $emptyOpFour = "<span style='color:red'>Empty question.</span>";
    }elseif(empty($correct_ans)){
      $emptyCorrect = "<span style='color:red'>Empty question.</span>";
    }else{
      $question_addObj->question_no($question_no);
      $question_addObj->question($question);
      $question_addObj->option_one($option_one);
      $question_addObj->option_two($option_two);
      $question_addObj->option_three($option_three);
      $question_addObj->option_four($option_four);
      $question_addObj->correct_ans($correct_ans);
      if($question_addObj->insertInQestion()){
        if($question_addObj->insertInAnsOp1()){
          if($question_addObj->insertInAnsOp2()){
            if($question_addObj->insertInAnsOp3()){
              if($question_addObj->insertInAnsOp4()){
                if($question_addObj->upAnswer()){
                  header("location:question-add.php");
                }
              }
            }
          }
        }
      }
    }
  }
  ?>
   <div class="add-question">
      <form class="question_form" action="" method="post">
        <table>
          <tr>
            <td>Question Number</td>
            <td>:</td>
            <td><input type="number" name="question_no" readonly min="1" value="<?php if(isset($next)){echo $next;}?>"></td>
          </tr>
          <tr>
            <td>Question</td>
            <td>:</td>
            <td><textarea name="question" id="" cols="50" rows="2"></textarea></td>
          </tr>
          <tr>
            <td>Option One</td>
            <td>:</td>
            <td>
              <input type="text" name='choise_one'>
              <input type="radio" name='answer' checked class="radio_btn" value="1">
              <p>Correct</p>
            </td>
          </tr>
          <tr>
            <td>Option Two</td>
            <td>:</td>
            <td>
              <input type="text" name='choise_two'>
              <input type="radio" name='answer' class="radio_btn" value="2">
              <p>Correct</p>
            </td>
          </tr>
          <tr>
            <td>Option Three</td>
            <td>:</td>
            <td>
              <input type="text" name='choise_three'>
              <input type="radio" name='answer' class="radio_btn" value="3">
              <p>Correct</p>
            </td>
          </tr>
          <tr>
            <td>Option Four</td>
            <td>:</td>
            <td>
              <input type="text" name='choise_four'>
              <input type="radio" name='answer' class="radio_btn" value="4">
              <p>Correct</p>
            </td>
          </tr>
          <tr>
            <td></td>
            <td colspan="2"><input class="btn btn-primary" type="submit" name='submit' value='Submit'></td>
          </tr>
        </table>
      </form>
   </div>
</div>
<?php include('inc/footer.php');?>
