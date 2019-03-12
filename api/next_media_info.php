<?php

require_once '../config.php'; 

$action = (string)$_GET['action'];

if (!$action) {
        $action = (string)$_POST['action'];
if (!$action) {
	$action = 'all';
	}
}

if ($action == "all") {

///////////////////////////////////
$contents = file_get_contents('https://*************:*************@peerhub.ru/flussonic/api/playlist/playlist1');
if (!empty($contents))
{

$output = "";
$data = $contents;
$info = json_decode($contents);
$name = $info->current_entry;
$namecheck = substr($name,strrpos($name,"/")+1);
$fullname = substr($name,strrpos($name,"/")+1);

$string = explode('/', $name);
$checkedline = $string[1];




$lines = file('https://subty.ru/shed/playlist.txt');
 

$timezone = date_default_timezone_get();

//echo "The current server timezone is: " . $timezone."<br>";


$t=time();
//echo("Linux timestamp: ".$t . "<br>");
//echo "Realtime: ".(date("H:i:s",$t));
//echo "<br>Current data: ".$checkedline;

$sql = "SELECT * FROM media WHERE onair = '1'  ORDER BY media_order ASC";

if($result = mysqli_query($link, $sql)){
foreach ($lines as $line_num => $line)
{

    while ($row = mysqli_fetch_array($result))
    {

$id = $row['id'];
$mediaid = $row['media_order'];
$nameline = $row['name'];
$fname = $row['fname'];
$onair = $row['onair'];
$duration = gmdate("H:i:s", $row['duration']);
$rowcalc += $row['duration'];
$ended_time = $row['e_time'];
//$ended_time_check  += $ended_time;
$startup_time = $row['s_time'];
$human_ended_time = date("H:i:s", $ended_time);
$human_startup_time = date("H:i:s", $startup_time);
//$calc = $duration + ;
$estimate = ($t-$startup_time) / ($ended_time-$startup_time) * 100;
$estimate = round($estimate);

similar_text($checkedline, $nameline, $percent);

    if ($percent > 99)
{

$nowid = $mediaid; 
  $output .= "<tr class=\"info\">
         <td>".$extinfo." | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
    $output .= "</td><td>";
    //$output .= "<span class=\"label label-success\">ON AIR NOW</span> <b>(ID: ". $id .")". $percent . "". $fname . "</b>";
    $output .= "<span class=\"label label-success\">ON AIR NOW</span> <b>". $fname . "".$nowid."</b>";
    $output .="<div class=\"progress\">
  <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"".$estimate."\"
  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:".$estimate."%\">
    ".$estimate."% Complete
  </div>
</div>";
    $output .= "</td><td></td>
      </tr>";
  
  }
 


}



       /* }*/
    }

    $sql3 = "SELECT * FROM media WHERE onair = '1' AND media.media_order = $nowid+1 ORDER BY media_order ASC LIMIT 1";
$result3 = mysqli_query($link, $sql3) or die(mysql_error());
$row3 = mysqli_fetch_assoc($result3);
$marked_id = $row3['id'];
$marked = $row3['marked'];
$mediaorder = $row3['media_order'];
$startup_time3 = $row3['s_time'];
$human_ended_time3 = date("H:i:s", $ended_time3);
$human_startup_time3 = date("H:i", $startup_time3);
//$calc = $duration + ;
$estimate3 = ($t-$startup_time3) / ($ended_time3-$startup_time3) * 100;
$estimate3 = round($estimate3);
echo "<img src=\"https://subty.ru/media/files/thumbnail/".$marked_id."orig.jpg\" class=\"image\"><h4>Next media is: ".$row3['fname']."<br>Will start at ".$human_startup_time3."</h4>";
   // echo "<br />Checked: $checked";
    mysql_data_seek($sql,0); // <=== Set the resultsets internal pointer back to zero (the first record).
}




 //$output .= "</tbody></table>";
 //$output .= "<br><a href=\"?action=save\" style=\"color:#999\">Recalculate all timestamp and restart stream</a>";

 //echo $output;	

}


$sql2 = "SELECT * FROM media WHERE media.media_order > $nowid DESC LIMIT 1";
$result2 = mysqli_query($link, $sql2) or die(mysql_error());
$row2 = mysqli_fetch_assoc($result2);

echo  $row2['fname'];
/////////////////////

}



?>