<?php
	
	// $AccountNo = $_POST['accountNumber'];
	// $AmountNo  = $_POST['amount'];
	// $transfermessage = $_POST['TransferMessage'];
	// var regex_digit = /^(\d{13})?$/;
	// var Message_Reg = /^[A-Za-z]*{1,130}$/;
	function validatetrasaction($AccountNo,$AmountNo,$transfermessage)
	{
		if (!preg_match("/^(\d{10})?$/", $AccountNo)) {
			///10 echo "string";
			//echo  $AccountNo;
			$_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Account Number not valid.
        </div>';
        header("location:transaction.php");
        exit();
			return false;
		}
		if (!preg_match("/^(\d{3,})?$/", $AmountNo)) {
			//100 rps ahead echo "amout";
			$_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> AmountNo should be greater then 99 rps.
        </div>';
        header("location:transaction.php");
        exit();
			return false;
		}
		if (!preg_match("/^[a-zA-Z0-9\s]+$/", $transfermessage)) {
			//only loweer and upper case allowed echo "trans";
			$_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> No special character allowed.
        </div>';
        header("location:transaction.php");
        exit();
			return false;
		}
		return true;
	}
  ?>