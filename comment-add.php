<?php

    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
    
      include('datab.php');

      if(isset($_POST['name']))  {
           
           $name = $_POST['name'];
           $description  = $_POST['description'];
           $query = "INSERT into comments( name , description ) VALUES ('$name','$description')";
           $result = mysqli_query($connection, $query);
           if(!$result) {
               die('Comment Failed.');
           }
           echo 'Comment Added Successfully';
       }
       
?>