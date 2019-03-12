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
$contents = file_get_contents('https://shardik:trolimoli1218!@peerhub.ru/flussonic/api/playlist/playlist1');
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

$sql3 = "SELECT * FROM media WHERE onair = '1' ORDER BY media_order DESC LIMIT 1";
$result3 = mysqli_query($link, $sql3) or die(mysql_error());
$row3 = mysqli_fetch_assoc($result3);
$marked_id = $row3['id'];
$marked = $row3['marked'];
//echo "<br>Last media in list as marked: ".$row3['name']."(ID:".$marked_id."), Marked as: ".$row3['marked'];


/*$output = "<table class=\"table\">
    <thead>
      <tr>
        <th>TIMELINE#</th>
        <th>Name</th>
     </tr>
    </thead>
    <tbody>
      ";
*/

$sql = "SELECT * FROM media WHERE onair = '1' ORDER BY media_order ASC";

if($result = mysqli_query($link, $sql)){
foreach ($lines as $line_num => $line)
{

    while ($row = mysqli_fetch_array($result))
    {

$id = $row['id'];
$nameline = $row['name'];
$fname = $row['fname'];
$onair = $row['onair'];
$duration = gmdate("H:i", $row['duration']);
$rowcalc += $row['duration'];
$ended_time = $row['e_time'];
//$ended_time_check  += $ended_time;
$startup_time = $row['s_time'];
$human_ended_time = date("H:i", $ended_time);
$human_startup_time = date("H:i", $startup_time);
//$calc = $duration + ;
$estimate = ($t-$startup_time) / ($ended_time-$startup_time) * 100;
$estimate = round($estimate);

similar_text($checkedline, $nameline, $percent);

    if ($percent > 99)
{


//  $output .= "<tr class=\"info\">
//         <td>".$extinfo." | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
//    $output .= "</td><td>";
    //$output .= "<span class=\"label label-success\">ON AIR NOW</span> <b>(ID: ". $id .")". $percent . "". $fname . "</b>";
    $output .= "<h4><span class=\"label label-success\">ON AIR</span><b> ". $fname . "</b><p></p>";
    $output .="<div class=\"progress\">
  <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"".$estimate."\"
  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:".$estimate."%\">
    ".$estimate."% Complete
  </div>
</div>
[".$human_startup_time." - ".$human_ended_time."]
</h4>";
    //$output .= "</td><td></td>
      //</tr>";
  
  }
  else
  {
    $output .= "";
    
  }
}


       /* }*/
    }
   // echo "<br />Checked: $checked";
    mysql_data_seek($sql,0); // <=== Set the resultsets internal pointer back to zero (the first record).
}

 //$output .= "</tbody></table>";
 //$output .= "<br><a href=\"?action=save\" style=\"color:#999\">Recalculate all timestamp and restart stream</a>";

 echo $output;	

}
/////////////////////

}


?>