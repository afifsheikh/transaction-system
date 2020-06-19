<?php
	$username = $_POST['user'];
	$password = $_POST['pass'];

	function loginvalidate($username,$password)
	{
		// if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{3,}$/", $username)) {
		// 	return false;
		// }
		// if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{3,}$/", $password)) {
		// 	return false;
		// }
		// if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{3,10}$/", $password)) {
		// 	return false;
		// }
		if (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,31}$/", $username)) {
			return false;
		}
		if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
			//lower Upper number helao546jfAFDfe003@asd
			return false;
		}

		return true;
	}
 ?>