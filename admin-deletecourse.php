<?php 
//conection to database
$pd = new PDO('mysql:dbname=groupdatabse;host=localhost','root','root');
if(isset($_GET['delU'])){ //encode the information
    $stmt = $pd->prepare("DELETE FROM assignments WHERE assignment_id = :assignment_id");//statement is being queried fro preparation 
    $criteria = [
      'assignment_id' => $_GET['delU'] //getting the del id
    ];
    //executing the prpeared criteria
    if($stmt ->execute($criteria)) echo '<h1>User is removed Successfully</h1>';
  }
  ?>
 