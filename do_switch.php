<?php
require_once 'config.php';

$mode=$_POST['mode'];

$pid=$_POST['id'];

//echo "test";

if ($mode=='true') //mode is true when button is enabled 
{
	$sql = "UPDATE media SET onair=1 WHERE id=$pid";
	$result = mysqli_query($link, $sql)or die(mysql_error());
	//$str=$db->query("UPDATE media SET onair=1 WHERE id=$pid");
    $message='Button is enabled!';
    $success='Enabled';
    echo json_encode(array('message'=>$message,'$success'=>$success));
    echo 'Success!'; 
}

elseif ($mode=='false') 
{
	$sql = "UPDATE media SET onair=0 WHERE id=$pid";
	$result = mysqli_query($link, $sql)or die(mysql_error());
	//$str=$db->query("UPDATE media SET onair=0 WHERE id=$pid");
    $message='Button is disabled!';
    $success='Disabled';
    echo json_encode(array('message'=>$message,'success'=>$success));

} 
 ?>