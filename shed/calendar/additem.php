<?php
require_once '../../config.php';

//$mode=$_POST['mode'];

//$id=$_POST['id'];
$idmedia = $_POST['idmedia'];
$name = $_POST['name'];
$idpls = $_POST['idpls'];


//$conn = new mysqli('localhost', 'root', 'trolimoli1218!', 'dbase');
$stmt = $link->prepare("SELECT * FROM pevents WHERE idpls = $idpls ORDER BY event_order DESC LIMIT 1");
$stmt->bind_param("s", $idpls);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$eventer = $row['event_order'];

$cntevent = $eventer + 1;


//echo $eventer;

if(isset($eventer))
{
$sql = "INSERT INTO pevents(idmedia, name, idpls, event_order) values ( '$idmedia', '$name', '$idpls', '$cntevent')";
//	$sql = "INSERT INTO pevents(idmedia, name, idpls) values ( '$idmedia', '$name', '$idpls')";
	$result = mysqli_query($link, $sql)or die(mysql_error());
	//$str=$db->query("UPDATE media SET onair=1 WHERE id=$pid");
    $message='Item '.$name.' is added in playlist!';
    $success='OK';
    echo json_encode(array('message'=>$message,'$success'=>$success));
    //echo 'Success!'; 
    //echo mysqli_num_rows($result);

}
else
{
$sql = "INSERT INTO pevents(idmedia, name, idpls) values ( '$idmedia', '$name', '$idpls')";
//	$sql = "INSERT INTO pevents(idmedia, name, idpls) values ( '$idmedia', '$name', '$idpls')";
	$result = mysqli_query($link, $sql)or die(mysql_error());
	//$str=$db->query("UPDATE media SET onair=1 WHERE id=$pid");
    $message='First item '.$name.' is added in playlist!';
    $success='OK';
    echo json_encode(array('message'=>$message,'$success'=>$success));	
}

 ?>