<?php

  include 'function.php';

  $db = connection();

  $sqlSelect = 'SELECT * from Users';
  $results = $db->query($sqlSelect);


  if(isset($_POST['name']))
  {
   // get values form input text and number
   $username = $_POST['name'];
   $password = $_POST['password'];

   // mysql query to insert data
   $sqlSubmit = "INSERT INTO `Users`(`userName`, `password`) VALUES (:name,:password)";

   $pdoResult = $db->prepare($sqlSubmit);

   $pdoExec = $pdoResult->execute(array(":name"=>$username,":password"=>$password));
   echo "<meta http-equiv='refresh' content='0'>";
  }

?>

<html>
  <head>
    <title>Outputting the data</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
    <br/>
    <form id="form" method="post" action="">
      
      <label> User name:</label><br/>
      <input type="text" name="name" /> <br/>
      
      <label id="first">Password:</label><br/>
      <input type="password" name="password" /><br/>
      
      <button>Submit</button>
    </form> 
    
    <hr/>
    <br/>
    
    <table>
      <tr>
        <th>User Name</th>
        <th>Password</th>
      </tr>
      
      <?php
        foreach($results as $row) {
          echo '<tr>';
          echo '<td>' . $row['userName'].'</td><td>'.$row['password'].'<td>';
          echo '</tr>';
        }
      ?>
      
    </table>
   
  </body>

</html>