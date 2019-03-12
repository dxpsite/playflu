<?php

require_once '../config.php'; 



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

echo "The current server timezone is: " . $timezone."<br>";


$t=time();
echo("Linux timestamp: ".$t . "<br>");
echo "Realtime: ".(date("H:i:s",$t));
echo "<br>Current data: ".$checkedline;

$sql3 = "SELECT * FROM media WHERE onair = '1' ORDER BY media_order DESC LIMIT 1";
$result3 = mysqli_query($link, $sql3) or die(mysql_error());
$row3 = mysqli_fetch_assoc($result3);
$marked_id = $row3['id'];
$marked = $row3['marked'];
echo "<br>Last media in list as marked: ".$row3['name']."(ID:".$marked_id."), Marked as: ".$row3['marked'];

//$sql_update = "UPDATE media SET marked = 1 WHERE id = $id";
//echo $sql_update;


header( "refresh:5;url=plist3_api.php" );
  echo '<br>You\'ll be redirected in about 5 secs. If not, click <a href="plist3_api.php">here</a>.'; 
$output = "<table class=\"table\">
    <thead>
      <tr>
        <th>TIMELINE#</th>
        <th>Name</th>
     </tr>
    </thead>
    <tbody>
      ";


$sql = "SELECT * FROM media WHERE onair = '1' ORDER BY media_order ASC";

if($result = mysqli_query($link, $sql)){
foreach ($lines as $line_num => $line)
{

    while ($row = mysqli_fetch_array($result))
    {

$id = $row['id'];
$nameline = $row['name'];
$onair = $row['onair'];
$duration = gmdate("H:i:s", $row['duration']);
$rowcalc += $row['duration'];
$ended_time = $rowcalc + $t;
//$ended_time_check  += $ended_time;
$startup_time = $ended_time - $row['duration'];
$human_ended_time = date("H:i:s", $ended_time);
$human_startup_time = date("H:i:s", $startup_time);
//$calc = $duration + ;


similar_text($checkedline, $nameline, $percent);


    if ($percent > 99)
{


  $output .= "<tr class=\"info\">
         <td>".$extinfo." | Duration: ".$duration." [Startup at: (".$startup_time.")".$human_startup_time." End at: (".$ended_time.")".$human_ended_time."]";
    $output .= "</td><td>";
    $output .= "<span class=\"label label-success\">".$percent."%<br>ON AIR NOW</span> <b>(ID: ". $id .")". $nameline . "</b>";
    $output .= "</td><td></td>
      </tr>";
  
  }
  else
  {
    $output .= "<tr class=\"default\">
       <td>".$extinfo." | Duration: ".$duration." [Startup at: (".$startup_time.")".$human_startup_time." End at: (".$ended_time.")".$human_ended_time."]";
    $output .= "</td><td>";
    $output .= "".$percent."%(ID:". $id .")" . $nameline . "";
    $output .= "</td><td></td>
      </tr>";
    
  }

$sql2 = "UPDATE media SET e_time = $ended_time, s_time = $startup_time WHERE id = $id"; 
if (mysqli_query($link, $sql2)) {
      echo "<br>Record #".$id." updated successfully!";
   } else {
      echo "<br>Error updating record: " . mysqli_error($link);
   }

/*$sql_update = "UPDATE media SET marked = 1 WHERE id = $marked_id"; 
if (mysqli_query($link, $sql_update)) {
      echo "<br>Record #".$marked_id." marked successfully!";
   } else {
      echo "<br>Error updating record: " . mysqli_error($link);
   }*/   
 //  mysqli_close($link);

}
       /* }*/
    }
   // echo "<br />Checked: $checked";
    mysql_data_seek($sql,0); // <=== Set the resultsets internal pointer back to zero (the first record).
    shell_exec("curl -u shardik:trolimoli1218! https://peerhub.ru/flussonic/api/stream_restart/playlist1");
}

 $output .= "</tbody></table>";
 //$output .= "<br><a href=\"?action=save\" style=\"color:#999\">Save all data and restart stream</a> | <a href=\"?action=update\" style=\"color:#999\">Update all</a>";

 echo $output;	


}


?>