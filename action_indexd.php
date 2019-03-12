<?php

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);
$fname = mysqli_real_escape_string($mysqli, $input["fname"]);
require 'config.php';
$mysqli = new mysqli('localhost', 'root', '********', 'dbase');
mysqli_set_charset($mysqli,"utf8");
if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}
if ($input['action'] === 'edit') {
    $mysqli->query("UPDATE media SET fname='" . $input['fname'] . "' WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'delete') {
	$getID = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT name FROM media WHERE id='" . $input['id'] . "'"));
	$fileID = $getID['name'];
	$mysqli->query("DELETE FROM media WHERE id = '".$input["id"]."'");
    $mysqli->query("DELETE FROM media_files WHERE id = '".$input["id"]."'");
	
	//$userID = $getID['userID'];
	//$mysqli->query("SELECT media WHERE id='" . $input['id'] . "'");
    //$delname = mysqli_result($mysqli->query("SELECT name FROM media WHERE id='" . $input['id'] . "' LIMIT 1"),0);
   // echo "Del name: ".$fileID;
    unlink("/home/playtube/crud/media/files/".$fileID.""); 
    $mysqli->query("ALTER TABLE media AUTO_INCREMENT = 1");
    //$mysqli->query("UPDATE media SET deleted=1 WHERE id='" . $input['id'] . "'");
} 
/*else if ($input['action'] === 'restore') {
    $mysqli->query("UPDATE media SET deleted=0 WHERE id='" . $input['id'] . "'");
}*/
mysqli_close($mysqli);
echo json_encode($input);

?>