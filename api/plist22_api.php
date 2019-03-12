<?php



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

echo "The current server timezone is: " . $timezone."<br>";


$t=time();
echo("Linux timestamp: ".$t . "<br>");
echo "Realtime: ".(date("H:i:s",$t));
echo "<br>Current data: ".$checkedline;

$output = "<table class=\"table\">
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

    if ($percent > 80)
{


  $output .= "<tr class=\"info\">
         <td>".$extinfo." | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
    $output .= "</td><td>";
    $output .= "<span class=\"label label-success\">".$percent."%<br>ON AIR NOW</span> <b>(ID: ". $id .")". $nameline . "</b>";
    $output .= "</td><td></td>
      </tr>";
  
  }
  else
  {
    $output .= "<tr class=\"default\">
        <td>".$extinfo." | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
    $output .= "</td><td>";
    $output .= "".$percent."%(ID:". $id .")" . $nameline . "";
    $output .= "</td><td></td>
      </tr>";
    
  }
}
       /* }*/
    }
   // echo "<br />Checked: $checked";
    mysql_data_seek($sql,0); // <=== Set the resultsets internal pointer back to zero (the first record).
}

 $output .= "</tbody></table>";
 echo $output;
//}

}

else
{
	echo "No data yet..\n Please startup infochannel.";
}


function is_bot()
{
	/* Эта функция проверки на робота */

	$botlist = array("Teoma", "alexa", "froogle", "Gigabot", "inktomi",
	"looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory",
	"Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot",
	"crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp",
	"msnbot", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz",
	"Baiduspider", "Feedfetcher-Google", "TechnoratiSnoop", "Rankivabot",
	"Mediapartners-Google", "Sogou web spider", "WebAlta Crawler","TweetmemeBot",
	"Butterfly","Twitturls","Me.dium","Twiceler");

	foreach($botlist as $bot)
	{
		if(strpos($_SERVER['HTTP_USER_AGENT'],$bot)!==false)
		return true;	// Is a bot
	}

	return false;	// Not a bot
}
?>