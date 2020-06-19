<?php
   session_start();
    include("validateregistration.php");
    $AccountNo= $_POST['accountNumber'];
    $CNIC= $_POST['CNIC'];
    $DOB= $_POST['DOB'];
    $mobileNo= $_POST['mobileNumber'];
    $carier= $_POST['Cariers'];
    $userName=htmlentities($_POST['userName']);

    $validate =   validateregistration($_POST['accountNumber'],$_POST['CNIC'],$_POST['DOB'],$_POST['mobileNumber'],$_POST['Cariers'],$_POST['userName'],$_POST['pass']);

    if ($validate == true)
    {
        //server side validation 
        if(!empty($AccountNo) || !empty($CNIC) || !empty($DOB) || !empty($mobileNo) || !empty($carier) || !empty($userName)){
            $servername = "moe-mysql-app";
            $username = "geekware_etsbanking";
            $password = "DIEqFfC@e_v@";
            $dbname = "geekware_bankingsystem";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
            $query = "SELECT * FROM account WHERE account_no =".$_POST['accountNumber']." AND cnic =".$_POST['CNIC'];
            $result = mysqli_query($conn,$query);

            if (!$result) {
                printf("Error: %s\n", mysqli_error($conn));
                
            }
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if($count<1){

                $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Account not registerd.
                </div>';
                header("location:registrationForm.php");
                exit();
            }
            $sql = "INSERT INTO  registration(`cnic`, `date`, `mobileNumber`, `Carrier`, `userName`, `pass`)
            VALUES (".$_POST["CNIC"].",'".$_POST["DOB"]."','".$_POST["mobileNumber"]."','".$_POST["Cariers"]."','".$_POST["userName"]."','".$hash."')";
            
            if ($conn->query($sql) === TRUE) {
                $_SESSION["successfully"] =  '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong>You are registerd successfully.
                </div>';
                
                header("location:registrationForm.php");
            } else {
                $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Account not registerd.
                </div>';
                header("location:registrationForm.php");
            }
            $conn->close();
        }else{
            $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong>All fields are required.
            </div>';
                
                header("location:registrationForm.php");
            die();
        }
    }
    else{
            $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Invalid Input.
            </div>';
                
                header("location:registrationForm.php");
            die();
        }
    

?>
