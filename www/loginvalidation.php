<?php
	function loginvalidate($username,$password)
	{
		if (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,31}$/", $username)) {
			return false;
		}
		if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
			
			return false;
		}

		return true;
	}
?>
