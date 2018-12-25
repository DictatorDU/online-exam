<?php include('inc/header.php');?>
<?php include('classes/user.php');?>
<div class="">
  <?php
   if(isset($_GET['delete-user']) && $_GET['delete-user'] != NULL){
     $user_id = $_GET['delete-user'];
     $indexObj->user_id($user_id);
     if($indexObj->delUser()){
      header('location:user.php');
     }
   }
   if(isset($_REQUEST['disable-user']) && $_REQUEST['disable-user'] != NULL){
     $user_id = $_REQUEST['disable-user'];
     $indexObj->user_id($user_id);
     if($indexObj->disable_user()){
      header("location:user.php");
     }
   }
   if(isset($_GET['enable-user']) && $_GET['enable-user'] != NULL){
     $user_id = $_GET['enable-user'];
     $indexObj->user_id($user_id);
     if($indexObj->enable_user()){
      header("location:user.php");
     }
   }
  ?>
  <table class="table">
    <thead class="thead">
      <tr class="thead-tr">
        <th class="serial">No</th>
        <th class="name">Name</th>
        <th class="email">E-mail</th>
        <th class="action">Action</th>
      </tr>
    </thead>
    <?php
    $i = 0;
    foreach($indexObj->readResult() as $value){
      $i++;
    ?>
    <tr class="tr-content">
      <td <?php if($value['status'] == 1){echo "style='color:red'";}?>><?php echo $i;?></td>
      <td <?php if($value['status'] == 1){echo "style='color:red'";}?>><?php echo $value['name'];?></td>
      <td <?php if($value['status'] == 1){echo "style='color:red'";}?>><?php echo $value['email'];?></td>
      <td><a href="view-user.php?view-user=<?php echo $value['user_id']?>">View</a> ||
        <?php if($value['status'] == 0){?>
        <a href="?disable-user=<?php echo $value['user_id']?>">Disable</a>
      <?php }else{?>
        <a style="color:red;" href="?enable-user=<?php echo $value['user_id']?>">Enable</a>
      <?php } ?>
        || <a href="?delete-user=<?php echo $value['user_id']?>" >Delete</a>
      </td>
    </tr>
  <?php } ?>
  </table>
</div>
<?php include('inc/footer.php');?>
