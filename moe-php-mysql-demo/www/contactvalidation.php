<?php

  $name = $_POST['username1'];
  $subject = $_POST['usersubject1'];
  $email = ['useremail1'];
  $message = $_POST['usermessage1'];
  $error_message = $_POST['error_message1'];

  $invalid = "Invalid Input";
  $valid = "Form Submitted";  

function validate($name,$subject,$email,$message,$error_message)
{
	if (!preg_match("/^[a-zA-Z]{3,7}$/", $username)) 
	{
 	document.getElementById("error_message").innerHTML = "<?php echo $invalid ?>";
 	return false;
	}
	if (!preg_match("/^[a-zA-Z]{3,10}$/", $subject)) 
	{
		document.getElementById("error_message") = "<?php echo $invalid ?>";
		return false;
	}
	if (!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		document.getElementById("error_message") = "<?php echo $invalid ?>";
		return false;
	}
	if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $message)) 
	{
    	document.getElementById("error_message") = "<?php echo $invalid ?>";
		return false;
	} 
	return true;
}
if (validate($name,$subject,$email,$message,$error_message)=true) 
{
		document.getElementById("error_message") = "<?php echo $valid ?>";
}

?>