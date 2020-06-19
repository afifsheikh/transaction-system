<?php
   include("session.php");
   $sql2 = "SELECT * FROM account where cnic = (SELECT cnic from registration WHERE userName = '$user_check')";
   $result2 = mysqli_query($db,$sql2);
    if (!$result2) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
   
    $sql = "SELECT * FROM `transactions` WHERE sender_acc_no =".$row2['account_no']." OR receiver_acc_no =".$row2['account_no'];
    $result = $db->query($sql); 

    
?>