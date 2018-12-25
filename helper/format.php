<?php
/**
* Format Class
*/
class Format{
 public function formatDate($date){
  return date('F j, Y, g:i a', strtotime($date));
 }
 public function formatDatetwo($date){
  return date('F j,y. g:i a', strtotime($date));
 }

 public function textShorten($text, $limit = 40){
  $text = $text. " ";
  $text = substr($text, 0, $limit);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text."..";
  return $text;
 }

 public function validation($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 } 
 public function passValidation($data){
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

 public function title(){
  $path = $_SERVER['SCRIPT_FILENAME'];
  $title = basename($path, '.php');
  //$title = str_replace('_', ' ', $title);
  if ($title == 'index') {
   $title = 'home';
  }elseif ($title == 'contact') {
   $title = 'contact';
  }
  return $title = ucfirst($title);
 }
}
$formatObj = new Format();
?>
