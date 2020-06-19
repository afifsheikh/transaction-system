<?php
   include("session.php");
    $sql = "SELECT * FROM account where cnic = (SELECT cnic from registration WHERE userName = '$user_check')";
    $result = mysqli_query($db,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
     }
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
    if($count == 1){
        $balance = $row['Amount'];
    }
    
?>