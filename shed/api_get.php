<?php
$contents = file_get_contents('https://**********:************@peerhub.ru/flussonic/api/playlist/playlist1');
if (!empty($contents))
{
print $contents;
}
else
{
	print "No data yet..\n Please startup infochannel.";
}
?>