<?php
   session_start();
   include("config.php");
   include('Allclass.php');
   include('loginvalidation.php');
   $validate = loginvalidate($_POST['user'],$_POST['pass']);
   if ($validate == true) 
    {
      if($_SERVER["REQUEST_METHOD"] == "POST") {
         $myusername= mysqli_real_escape_string($db,$_POST['user']);
         $sql = "SELECT * FROM registration WHERE userName = '$myusername'";
         $result = mysqli_query($db,$sql);
         if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $count = mysqli_num_rows($result);
         if($count == 1) {
           if (password_verify($_POST['pass'], $row['pass'])) {
            $_SESSION['login_user'] = $myusername;
            header("location:dashBoard.php");
            }else{
               $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Error!</strong> Invalid password..
               </div>';
               header("location:loginPanel.php");
            }
         }else {
            $_SESSION["error"] = '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Your Login Name or Password is invalid..
            </div>';
               header("location:loginPanel.php");
         }
      }
    }
    else {
            $_SESSION["error"] = '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Your Login Name or Password is invalid..
            </div>';
      		header("location:loginPanel.php");
          }
?>
