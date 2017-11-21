<?php
  //値を取得
$left =null;
$right=null;
$ope=null;
$answer=null;
$errors = array();
if($_SERVER['REQUEST_METHOD']== 'POST'){
  if(isset($_POST['leftbox'])){
    $left = $_POST['leftbox'];
  }
  if(isset($_POST['rightbox'])){
    $right = $_POST['rightbox'];
  }
  if(($_POST['symbol']) == '+' || '-' || '×' || '÷'){
    $ope =$_POST['symbol'];
  }

  if((is_numeric($left)) && (is_numeric($right))){
    switch ($ope) {
      case "＋":
        $answer = $left + $right;
        break;

      case "－":
        $answer = $left - $right;
        break;

      case "×":
        $answer = $left * $right;
        break;

      case "÷":
        if($right == '0'){
          $errors['no_division']= 'このような割り算はできません';

        }else{
          $answer = $left / $right;
        }
        break;
      default:

        $errors['no_four_arithmetic'] = '四則演算してください';
        break;
    }
  }else{
    $errors['no_calculation'] ='このような計算はできません';
  }
}