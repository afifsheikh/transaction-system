<?php
   session_start();
   
   include("../../config.php");
   include('../../Allclass.php');
   include('loginvalidate.php');

   $validate = loginvalidate($_POST['user'],$_POST['pass']);
   if ($validate == true)
   {
         //  session_start();
      if($_SERVER["REQUEST_METHOD"] == "POST") {
         $myusername= mysqli_real_escape_string($db,$_POST['user']);

         $sql = "SELECT * FROM administration WHERE username = '$myusername'";
         $result = mysqli_query($db,$sql);
         if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         
         $count = mysqli_num_rows($result);
         
         
   // If result matched $myusername and $mypassword, table row must be 1 row
         if($count == 1) {
           if ($_POST['pass']== $row['pass']) {
            //echo "test";
            $_SESSION['login_user'] = $myusername;
            header("location: index.html");

            } else {
               $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Error!</strong> Invalid password..
               </div>';
               //echo "pass wala if hay";
               header("location:page-login.php");
            }
         }else {
            //echo "count wala if hay";
            $_SESSION["error"] = '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Your Login Name or Password is invalid..
            </div>';
               header("location: page-login.php");
         }
      }else{
         echo 'last else';
      }
   }
   else
   {
      $_SESSION["error"] = '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Your Login Name or Password is invalid..
            </div>';
               header("location: page-login.php");
   }
   

?>