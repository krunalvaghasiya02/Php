<?php
         $conn = new mysqli('localhost','root','', 'ticrou');       
         if($conn->connect_errno){
            printf("Connect failed: %s<br />", $conn->connect_error);
            exit();
         }
         $message='Connected successfully';
?>