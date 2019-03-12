<?php
//include 'theme/header.php';
require_once 'config.php';
//$output = '';
/*$query = "SELECT COUNT(*) FROM media WHERE onair = 1 ORDER BY id DESC";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_array($result))
	{
 $output .= $row['name'].'\n';
	}
	echo $output;
}*/

$query="SELECT count(*) as total FROM media WHERE onair = 1";
$result = mysqli_query($link, $query);
$data = mysqli_fetch_assoc($result);
$output = $data['total'];
if ($output != 0)
{
//echo "Prepared: ".$output." files <button type=\"button\" class=\"btn btn-primary\">Setup playlist now</button>";
 echo "Prepared: ".$output." files <a href=\"/shed\">Setup playlist now</a>";
}
else
{
echo "Infochannel has not files yet. Please select from dashboard below.";	
}


?>