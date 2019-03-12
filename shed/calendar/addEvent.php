<?php

require_once('../../config.php');
require_once('bdd.php');


if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){


	$userstable = "playlists";

$quer = "SELECT * FROM $userstable ORDER BY id DESC LIMIT 1";
$result = mysqli_query($link, $quer);
if(mysqli_num_rows($result) > 0)
{


while($row = mysqli_fetch_array($result))
 {
$lastid = $row['id'];

print "Последняя запись с ID:".$lastid;


}

}
	
    $id = $lastid + 1;
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO playlists(id, title, start, end, color) values ('$id', '$title', '$start', '$end', '$color')";

	//$sql1 = "INSERT INTO pevents (id, title, start, end, color) values ('$id', '$title', '$start', '$end', '$color')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	//echo $sql1;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Err execute');
	}



}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
