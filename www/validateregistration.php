<?php
	
    function validateregistration($accountNo,$cnicNo,$DobNo,$MobileNo,$CarierNo,$username,$password)
    {
    	
    	if (strlen($accountNo) <> 10) {
			//echo strlen($accountNo);
			$_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Invalid Account Number.
                </div>';
                header("location:registrationForm.php");
    		return false;
    	}
    	if (strlen($cnicNo) <> 13) {
			//echo "cnicNo";
			$_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Invalid CNIC Number.
                </div>';
                header("location:registrationForm.php");
    		return false;
    	}
    	if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $DobNo)) {
            
            //echo $DobNo;
            //^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$
            //(?=\d)^(?:(?!(?:10\D(?:0?[5-9]|1[0-4])\D(?:1582))|(?:0?9\D(?:0?[3-9]|1[0-3])\D(?:1752)))((?:0?[13578]|1[02])|(?:0?[469]|11)(?!\/31)(?!-31)(?!\.31)|(?:0?2(?=.?(?:(?:29.(?!000[04]|(?:(?:1[^0-6]|[2468][^048]|[3579][^26])00))(?:(?:(?:\d\d)(?:[02468][048]|[13579][26])(?!\x20BC))|(?:00(?:42|3[0369]|2[147]|1[258]|09)\x20BC))))))|(?:0?2(?=.(?:(?:\d\D)|(?:[01]\d)|(?:2[0-8])))))([-.\/])(0?[1-9]|[12]\d|3[01])\2(?!0000)((?=(?:00(?:4[0-5]|[0-3]?\d)\x20BC)|(?:\d{4}(?!\x20BC)))\d{4}(?:\x20BC)?)(?:$|(?=\x20\d)\x20))?((?:(?:0?[1-9]|1[012])(?::[0-5]\d){0,2}(?:\x20[aApP][mM]))|(?:[01]\d|2[0-3])(?::[0-5]\d){1,2})?$
			$_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Invalid DOB.
                </div>';
                header("location:registrationForm.php");
			return false;
    	}
    	if (!preg_match("/^\d{11}$/", $MobileNo)) {
		   // echo "mobileNumber";
		   $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Invalid Mobile Number.
                </div>';
                header("location:registrationForm.php");
    		return false;
    	}
    	if ($CarierNo < 1) {
			//echo "Select Cariers";
			$_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Invalid Carier Selection.
                </div>';
                header("location:registrationForm.php");
    		return false;
    	}
    	if (!preg_match("/^[A-Za-z][A-Za-z0-9]{8,31}$/", $username)) {
		   // echo "username";
		   $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Invalid User Name: atleast 8 charater .
                </div>';
                header("location:registrationForm.php");
    		return false;
    	}
    	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", 
            $password)) {
		   // echo "password";
		   $_SESSION["error"] =  '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong>Invalid Password eg-> must have lowercase,uppercase,numaric and should include special charater.
                </div>';
                header("location:registrationForm.php");
    		return false;
    	}
    	return true;
    }
 ?>