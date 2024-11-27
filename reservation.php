<?php
include "conn.php";

$message='';
if (isset($_POST['booking'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobilenumber = $_POST['mobilenumber'];
  $tabelnumber = $_POST['tabelnumber'];
  $person = $_POST['person'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $request = $_POST['request'];
   
    $insertQuery = "INSERT INTO reservation(name,email,mobilenumber,tabelnumber,person,bookingdate,bookingtime,request) VALUES ('$name','$email','$mobilenumber','$tabelnumber','$person','$date','$time','$request')";
    if ($conn->query($insertQuery) == TRUE) {
      echo "data insertad successfully";  
      header('Location:index.php') ;
    } 
    else {
     echo "error" . $conn->error;
    }
  
}
?>