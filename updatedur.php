<?php
//update.php
$connect = mysqli_connect("localhost", "root", "trolimoli1218!", "dbase");
$from = $_POST["from"];
$id = $_POST["num"];
//for($i=0; $i<count($_POST["page_id_array"]); $i++)
//{
 $query = "
 UPDATE media 
 SET duration_custom = '".$from."' 
 WHERE id = '".$id."'";
 mysqli_query($connect, $query);
//}
echo 'Custom duration has been updated'; 

?>