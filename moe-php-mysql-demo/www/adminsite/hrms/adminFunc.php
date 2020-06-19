<?php
    include("../../config.php");
    
    function  getAcc($db){
        $sql2 = "SELECT account_no,  IBN, status, userName, date, Amount, cnic FROM account ";
        $result2 =$db->query($sql2);
       
        return $result2;
    } 
    function  getCheckbook($db){
        $sql2 = "SELECT account_no,pagescount FROM chequerequest";
        $result2 =$db->query($sql2);
       
        return $result2;
    } 
    function removeChequeRequist($db,$accountNo){

        $sql2 = "DELETE FROM chequerequest WHERE account_no=" . $accountNo;
        $result2 =$db->query($sql2);
       
    }
    if(null !== $_GET['submit']){
       $accno = $_GET['accNo'];
       removeChequeRequist($db, $accno);
       header("Location: users.php");
    
    }
?>