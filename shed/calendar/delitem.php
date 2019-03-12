<?php
require_once '../../config.php';
$id = $_POST['id'];

	$sql = "DELETE FROM pevents WHERE eventid = $id";
	$result = mysqli_query($link, $sql)or die(mysql_error());
	//$str=$db->query("UPDATE media SET onair=1 WHERE id=$pid");
    $message='Item ID:'.$id.' is deleted from playlist!';
   // $success='OK';
    //echo json_encode(array('message'=>$message,'$success'=>$success));
    echo $message; 

 ?>