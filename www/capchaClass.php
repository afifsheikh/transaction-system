<?php 
	if(isset($_POST['submit'])){
        //store all form items here like below
        $userName=$_POST['accountNumber'];
        //etc etc
        
        //backend capcha work
        $secretKey="6LdnkP4UAAAAAHyXZuE62gjC48xz7wNqKk-RR3Mk";
        $response =$_POST['g-rechaptcha-response'];
        $userIp=$_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIp";
        
        $res=file_get_contents($url);
        $res=json_decode($res);

        if($res->success){
            //all code here after varification either want to save in data base
            echo" You are Registered Successfully";
        }else{
            echo"<span> Invalid Captcha,Please try again</span>";
        }
    }
 ?>