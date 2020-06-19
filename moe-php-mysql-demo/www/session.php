<?php
   include('config.php');
   session_start();
 //  $curr_user_check = $_SESSION['current_user'];
   $user_check = $_SESSION['login_user'];
   if(!isset($user_check)){
      header("location:loginPanel.php");
      die();
   }
   // if(!isset($_SESSION['current_user'])){
   //    header("location:loginPanel.php");
   //    die();
   // }
?>