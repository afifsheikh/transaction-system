<?php
    include("session.php");
    include("validatetransaction.php");
    // include transion php file regex
    $validate =  validatetrasaction($_POST['accountNumber'], $_POST['amount'], $_POST['TransferMessage']);

    if ($validate == true)
      {
             $AccountNo= $_POST['accountNumber'];
             $amount= $_POST['amount'];
      
             $plaintext = $AccountNo.':'.$amount;
             $password = '3sc3RLrpd17';

             $method = 'aes-256-cbc';

             $key = substr(hash('sha256', $password, true), 0, 32);
               // echo "Password:" . $password . "\n";

             $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0); 

             $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
             $newtext_trasaction=$encrypted;
          if (!$newtext_trasaction)
          {
             $newtext_trasaction=0;
             $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Invalid Input Identified!
        </div>';
        header("location:transaction.php");
          //return;    
          }

           $decrypted = openssl_decrypt(base64_decode($newtext_trasaction), $method, $key, OPENSSL_RAW_DATA, $iv);
          
        // echo $decrypted ; 
           $var = explode(':', $decrypted);
           $AccountNo=$var[0];
           $amount=$var[1];

           //server side validation 
      if(!empty($AccountNo) || !empty($amount)){
          $sql = "SELECT * FROM account WHERE account_no = '$AccountNo'";
          $result = mysqli_query($db,$sql);
        if (!$result) {
           printf("Error: %s\n", mysqli_error($db));
           exit();
       }
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

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
        
        $count = mysqli_num_rows($result);
        
        if($count ==0){
          $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> This Reciver Acc Number not exist: '.$AccountNo.'
              </div>';
              header("location:transaction.php");
              exit();
        }else if($count2 == 0){
              $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong>  Your Acc Number not exist: '.$user_check.'
              </div>';
              header("location:transaction.php");
              exit();
              header("location: logout.php");
        }else{
            //tramsaction will perfom here
          try{
              $pdo->beginTransaction();
              // get available amount of the transferer account
              $sql = 'SELECT Amount FROM account WHERE account_no =:from';
              $stmt = $pdo->prepare($sql);
              $stmt->execute(array(":from" => $row2['account_no']));
              $availableAmount = (int) $stmt->fetchColumn();
              $stmt->closeCursor();
   
              if ($availableAmount < $amount) {
                $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Insufficient amount to transfer
                </div>';
                header("location:transaction.php");
                exit();
                  return false;
              }
              // deduct from the transferred account
              $sql_update_from = 'UPDATE account
                  SET Amount = Amount - :amount
                  WHERE account_no = :from';
              $stmt = $pdo->prepare($sql_update_from);
              $stmt->execute(array(":from" => $row2['account_no'], ":amount" => $amount));
              $stmt->closeCursor();

              // add to the receiving account
              $sql_update_to = 'UPDATE account
                                  SET Amount = Amount + :amount
                                  WHERE  account_no = :to';
              $stmt = $pdo->prepare($sql_update_to);
              $stmt->execute(array(":to" => $row['account_no'], ":amount" => $amount));
   
              // commit the transaction
              $sql= "INSERT INTO `transactions`( `type`, `amount`, `sender_acc_no`, `receiver_acc_no`, `date`) VALUES ('transfer money',".$amount.",".$row2['account_no'].",".$row['account_no'].",'".date("Y/m/d")."')";
              $stmt = $pdo->prepare($sql);
              $stmt->execute();
   
              $pdo->commit();
              $_SESSION["successfullyOftrans"] =  '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success!</strong>The amount has been transferred successfully.
              </div>';
              header("location:transaction.php");
              exit();
          }catch (PDOException $e) {
              $pdo->rollBack();
              die($e->getMessage());
          }

        }
      }else{
        $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> There is something isssue with your connectivity.
        </div>';
        header("location:transaction.php");
        exit();
      }
    }
    else{
        $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> There is something isssue with your connectivity.
        </div>';
        header("location:transaction.php");
        exit();
      }
?>