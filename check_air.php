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



if ($_GET['run']=='start') 
{
shell_exec("kill -9 ".$output."");
shell_exec("killall screen");
shell_exec("cd /opt/handbrake-bot/ && ./start_playlist_bot.sh");
//shell_exec("./start_playlist_bot.sh");
//shell_exec("./handbrake_bot.sh");
}
if ($_GET['run']=='stop') 
{
shell_exec("kill -9 ".$output."");
shell_exec("killall screen");
}

$cnt1 = shell_exec("pgrep handbrake -f -c");
$cnt2 = shell_exec("pgrep playlist -f -c");
$outputcntrs = ($cnt+$cnt2)-1; //grep cnt
//$output = shell_exec("ps aux | grep playlist-bot.php | awk {'print $2'}");
//echo "<pre>$output</pre>";
/*$pos = strpos($output, "\n");
if (!empty($pos)) $line = trim(substr($output, 0, $pos)); else $line = $output;*/
if ($outputcntrs==2)
{
echo "<br>Playlist and handbrake bots active now (PIDS: ".$outputcntrs.")"; 
}

else
{
echo "<br>Daemons not started yet. Press start! (PIDS: ".$outputcntrs.")";
}
?>
 <a href="?run=start" class="btn-xs btn btn-success small">Start/restart daemons</a>
&nbsp;<a href="?run=stop" class="btn-xs btn btn-danger small">Eliminate daemons</a>
