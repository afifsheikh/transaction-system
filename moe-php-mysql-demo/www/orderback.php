<?php

    include("session.php");
    $pages= $_POST['pages'];
    
//server side validation 
    if(!empty($pages)){
        
      //for user account number 
      $sql2 = "SELECT * FROM account where cnic = (SELECT cnic from registration WHERE userName = '$user_check')";
      $result2 = mysqli_query($db,$sql2);
      if (!$result2) {
         printf("Error: %s\n", mysqli_error($db));
         exit();
      }
       $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
       $count2 = mysqli_num_rows($result2);
       //  end quary
      
       //if already ordered so it will not request again 
       $q = "SELECT * FROM chequerequest WHERE account_no = '$row2[account_no]'";
       $result3 = mysqli_query($db,$q);
       
       if (!$result3) {
          printf("Error: %s\n", mysqli_error($db));
          exit();
       }
       
        $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
        $count3 = mysqli_num_rows($result3);
       // echo $count3;
      
    if($count2 == 0){
      
            $_SESSION["errorOfTransaction"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong>  Your ACCOUNT Number not exist: '.$user_check.'
            </div>';
            header("location:orderCheque.php");
            exit();
            header("location: logout.php");
    }
    
    else if($count3 >= 1){
        $_SESSION["ChequeBookRequest"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong>  You already requested cheque book 
        </div>';
       header("location:orderCheque.php");
        
    }
    else{
          //pages request  will perfom here
        try{
            $sql = "INSERT INTO  `chequerequest`( `account_no`, `pagescount`)
            VALUES ('".$row2["account_no"]."','".$_POST["pages"]."')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $_SESSION["successfully"] =  '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong>Your cheque book request submited successfully.
            </div>';
            
           header("location:orderCheque.php");
        }catch(Exception $e){
            $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong>Your cheque book request not submited ..
            </div>';
           header("location:orderCheque.php");
        }
        
      }
    }else{
      $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Error!</strong> There is something isssue with your connectivity.
      </div>';
      header("location:dashBoard.php");
      exit();
    }
?>