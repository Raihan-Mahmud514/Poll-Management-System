
<?php

//poll.php

$connect = new PDO("mysql:host=localhost;dbname=poll", "root", "");

if(isset($_POST["poll_option"]))
{
 $query = "
 INSERT INTO poll_tbl 
 (cms_software) VALUES (:cms_software)
 ";
 $data = array(
  ':cms_software'  => $_POST["poll_option"]
 );
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

?>