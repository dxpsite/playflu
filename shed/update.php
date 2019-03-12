<?php
//update.php
$connect = mysqli_connect("localhost", "root", "******************", "dbase");
//$page_id = $_POST["page_id_array"];
for($i=0; $i<count($_POST["page_id_array"]); $i++)
{
 $query = "
 UPDATE media 
 SET media_order = '".$i."' 
 WHERE id = '".$_POST["page_id_array"][$i]."'";
 mysqli_query($connect, $query);
}
echo 'Media order has been updated'; 

?>