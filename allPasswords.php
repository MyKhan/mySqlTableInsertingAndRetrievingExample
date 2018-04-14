<?php

include 'function.php';

$db = connection();

$sql = 'SELECT * from Users';
$results = $db->query($sql);

foreach($results as $row) {
  echo $row['userName'].', '.$row['password'].'<br>';
}

?>