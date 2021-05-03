  
<?php

  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Max-Age: 1000');
  header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');

  include('datab.php');

  $query = "SELECT * from comments";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'name' => $row['name'],
      'description' => $row['description'],
      'id' => $row['id'],
      'date' =>$row['date']
    );
  }

  $jsonstring = json_encode($json);
  echo $jsonstring;

?>