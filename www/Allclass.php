<?php
    class User{
        public $userName,$cnicPassport,$totalBalance,$accountNo;
     //   private $transaction;

        // public function __construct($username,$cnicpassport,$totalbalance,$accountno){
        //     $this->userName=$username;
        //    // $this->passWord=$password;
        //     $this->cnicPassport=$cnicpassport;
        //   //  $this->address=$add;
        //   //  $this->email=$email;
        //     $this->totalBalance=$totalbalance;
        //     $this->accountNo=$accountno;
        //   //  $this->transaction=new Transaction();
            
        // }
        public function checkBookOrder($date,$numberOfpages,$userAcount,$hexcode){

        }
    }
    class Transaction {
        
        public function gassBill($bill_Acc_No,$userAcount,$amount,$date){

        } 
        public function keBill($bill_Acc_No,$userAcount,$amount,$date){

        }
        public function moneyTranfer($userAcount,$tranferAcount,$amount,$description,$date){

        }
    }
    class SecurityArchitacture{
        

    }

    
?>