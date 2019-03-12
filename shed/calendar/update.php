<?php
//update.php
$connect = mysqli_connect("localhost", "root", "trolimoli1218!", "dbase");
$page_id = $_POST["page_id_array"];
for($i=0; $i<count($_POST["page_id_array"]); $i++)
{
 $query = "
 UPDATE pevents
 SET event_order = '".$i."' 
 WHERE eventid = '".$_POST["page_id_array"][$i]."'";
 mysqli_query($connect, $query);
}
echo 'Playlist order has been updated'; 

?>