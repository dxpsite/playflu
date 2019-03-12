<?php



$contents = file_get_contents('https://*************:*************@peerhub.ru/flussonic/api/playlist/playlist1');
if (!empty($contents))
{

//$output = "";
$data = $contents;
$info = json_decode($contents);
$name = $info->current_entry;
$namecheck = substr($name,strrpos($name,"/")+1);
$fullname = substr($name,strrpos($name,"/")+1);



$lines = file('https://subty.ru/shed/playlist.txt');
 

$timezone = date_default_timezone_get();

echo "The current server timezone is: " . $timezone."<br>";


$t=time();
echo("Linux timestamp: ".$t . "<br>");
echo "Realtime: ".(date("H:i:s",$t));

$output .= "<table class=\"table\">
    <thead>
      <tr>
        <th>TIMELINE#</th>
        <th>Name</th>
     </tr>
    </thead>
    <tbody>
      ";


    //$checkedline = substr($line,strrpos($line,"/")+1);
 // echo "<br>".$checked;
//  echo "<br>".$namecheck;
  //if ($checked == $namecheck)




require_once '../config.php'; 
$sql = "SELECT * FROM media WHERE onair = '1' ORDER BY media_order ASC";

if($result = mysqli_query($link, $sql)){
while($row = mysqli_fetch_assoc($result)){


foreach ($lines as $line_num => $line) {

if (preg_match('/EXTINF/i', htmlspecialchars($line))) {
    $extinfo = htmlspecialchars($line);
  }
if (preg_match('/.mp4/i', htmlspecialchars($line))) {
    $checked = substr(htmlspecialchars($line), 7);

similar_text($checked, $namecheck, $percent);



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

if ($percent > 80)
{
  $output .= "<tr class=\"info\">
        <td>".$extinfo."";
    $output .= "</td><td>";
    $output .= "<span class=\"label label-success\">".$percent."%<br>ON AIR NOW</span> <b>(". $id .")". $checked . "</b>";
    $output .= "</td><td></td>
      </tr>";
  
  }
  else
  {
    $output .= "<tr class=\"default\">
        <td>".$extinfo." | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
    $output .= "</td><td>";
    $output .= "(ID:". $id .")" . $nameline . "";
    $output .= "</td><td></td>
      </tr>";
    
  }


//FOREACH BLOCK END
}
}
 /* }
 }  
  else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
*/
/*}
else{





        echo "No records matching your query were found.";

    }*/



//}
 

}
}

 $output .= "</tbody></table>";
 echo $output;
//}

}
else
{
	echo "No data yet..\n Please startup infochannel.";
}
?>