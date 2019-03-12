<?php
$contents = file_get_contents('https://shardik:trolimoli1218!@peerhub.ru/flussonic/api/playlist/playlist1');
if (!empty($contents))
{

$data = $contents;
$info = json_decode($contents);
$name = $info->current_entry;
$fullname = substr($name,strrpos($name,"/")+1);
//$fullname = substr($name, 6);
echo "<span class=\"label label-success\">ON AIR NOW</span> ".$fullname."";

}
else
{
	echo "No data yet..\n Please startup infochannel.";
}
?>