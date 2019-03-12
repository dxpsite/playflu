<?php
// путь к файлу с инициализацией к БД
include ('../../config.php');

$userstable = "pevents";

$query = "SELECT * FROM $userstable ORDER BY id DESC LIMIT 1";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) > 0)
{

//print "<div class=\"container-fluid\"><div class=\"row\"><h4>Infochannel Live:</h4>";

while($row = mysqli_fetch_array($result))
 {
$id = $row['id'];

print "Последняя запись с ID:".$id;

//$i++;
}
//print "</center></div></div>";
}
?>
