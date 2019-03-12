<?php

require_once '../config.php'; 


//$select_query = "SELECT * FROM playlists WHERE DATE(start) >= CURDATE() AND DATE(end) <= CURDATE()";
$select_query = "SELECT * FROM playlists WHERE ( NOW() BETWEEN start AND end)";
$result_pls = mysqli_query($link, $select_query) or die(mysqli_error());
$row_pls = mysqli_fetch_assoc($result_pls);
$id_pls = $row_pls['id'];
$title_pls = $row_pls['title'];
echo "<br>Playlist ID: <u>".$id_pls."</u> with title '<b>".$title_pls."</b>'<br>";


$action = (string)$_GET['action'];

if (!$action) {
        $action = (string)$_POST['action'];
if (!$action) {
	$action = 'all';
	}
}

if ($action == "all") {

///////////////////////////////////
$contents = file_get_contents('https://shardik:trolimoli1218!@peerhub.ru/flussonic/api/playlist/playlist_daily');
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




$lines = file('https://subty.ru/shed/calendar/playlist.txt');
 

$timezone = date_default_timezone_get();

echo "The current server timezone is: " . $timezone."<br>";


$t=time();
echo("Linux timestamp: ".$t . "<br>");
echo "Realtime: ".(date("H:i:s",$t));
echo "<br>Current data: ".$checkedline;

$sql_last = "SELECT media.id, pevents.marked as marker, pevents.name FROM media LEFT JOIN pevents ON pevents.idmedia = media.id AND pevents.idpls = $id_pls ORDER BY pevents.event_order DESC LIMIT 1";
$result_last = mysqli_query($link, $sql_last) or die(mysqli_error());
$row_last = mysqli_fetch_assoc($result_last);
$marked_id = $row_last['id'];
$marked = $row_last['marker'];
echo "<br><b>Last media in list as marked: ".$row_last['name']."(ID:".$marked_id."), Marked as: ".$marked."</b>";


$output = "<table class=\"table\">
    <thead>
      <tr>
        <th>TIMELINE1#</th>
        <th>Name</th>
     </tr>
    </thead>
    <tbody>
      ";


$sql = "SELECT pevents.idmedia, pevents.name, pevents.event_order, pevents.idpls as playlistnum, media.media_order, pevents.marked, media.name as nameorig, media.fname, media.onair, media.duration, media.duration_custom, pevents.e_time, pevents.s_time  FROM media LEFT JOIN pevents ON  media.id = pevents.idmedia WHERE pevents.idpls = $id_pls ORDER BY pevents.event_order ASC";

if($result = mysqli_query($link, $sql)){
foreach ($lines as $line_num => $line)
{

    while ($row = mysqli_fetch_array($result))
    {

$id = $row['id'];
$plsid = $row['playlistnum'];
$nameline = $row['nameorig']; 
$fname = $row['fname'];
$onair = $row['onair'];
$duration = $row['duration'];
$duration_custom = $row['duration_custom'];

if ($duration_custom != 0)
{
$extinfdata = $duration_custom;
}
else
{
$extinfdata = $duration;
}

$duration = gmdate("H:i:s", $extinfdata);

$rowcalc += $extinfdata;
$ended_time = $row['e_time'];
$startup_time = $row['s_time'];
$human_ended_time = date("H:i:s", $ended_time);
$human_startup_time = date("H:i:s", $startup_time);
$estimate = ($t-$startup_time) / ($ended_time-$startup_time) * 100;
$estimate = round($estimate);

similar_text($checkedline, $nameline, $percent);

    if ($percent > 99)
{


  $output .= "<tr class=\"info\">
         <td><b>Playlist #".$plsid."</b> ".$extinfo." | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
    $output .= "</td><td>";
    //$output .= "<span class=\"label label-success\">ON AIR NOW</span> <b>(ID: ". $id .")". $percent . "". $fname . "</b>";
    $output .= "<span class=\"label label-success\">ON AIR NOW</span> <b>". $fname . "</b>";
    $output .="<div class=\"progress\">
  <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"".$estimate."\"
  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:".$estimate."%\">
    ".$estimate."% Complete
  </div>
</div>";
    $output .= "</td><td></td>
      </tr>";
  
  }
  else
  {
    $output .= "<tr class=\"default\">
       <td><b>Playlist #".$plsid."</b> ".$extinfo." | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
    $output .= "</td><td>";
    $output .= "" . $fname . "";
    $output .= "</td><td></td>
      </tr>";
    
  }
}


    }

}

 $output .= "</tbody></table>";

?>
<script type="text/javascript">
$(function()
{
    $('body').on('click', 'a.ajax', function(event) 
    {
        event.preventDefault(); 
        $.get($(this).attr('href'), function(data) 
        {
            console.log(data); 
        }); 
    }); 
});
</script>
<?php 
 $output .= "<br><a class=\"ajax\" href=\"https://subty.ru/api/dpl_api.php?action=save\" style=\"color:#999\"><button type='submit' class='btn btn-primary'>Recalculate all timestamp and restart stream</button></a>
 <p>Warning: after a reboot of the stream, it is possible to freeze clients for a short time</p>";


 echo $output;	

}
/////////////////////

}

elseif ($action == "save") {

///////////////////////////////////
$contents = file_get_contents('https://shardik:trolimoli1218!@peerhub.ru/flussonic/api/playlist/playlist_daily');
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




$lines = file('https://subty.ru/shed/calendar/playlist.txt');
 

$timezone = date_default_timezone_get();

echo "The current server timezone is: " . $timezone."<br>";


$t=time();
echo("Linux timestamp: ".$t . "<br>");
echo "Realtime: ".(date("H:i:s",$t));
echo "<br>Current data: ".$checkedline;

$sql3 = "SELECT pevents.idmedia, pevents.name, pevents.event_order, pevents.idpls, media.media_order, media.marked, media.fname, media.onair, media.duration, media.duration_custom  FROM media LEFT JOIN pevents ON pevents.idmedia = media.id AND pevents.idpls = $id_pls ORDER BY pevents.event_order DESC LIMIT 1";
$result3 = mysqli_query($link, $sql3) or die(mysqli_error());
$row3 = mysqli_fetch_assoc($result3);
$marked_id = $row3['idmedia'];
$marked = $row3['media.marked'];
echo "<br>Last media in list as marked: ".$row3['pevents.name']."(ID:".$marked_id."), Marked as: ".$marked;


header("refresh:0;url=https://subty.ru/api/dpl_api.php");
$output = "<table class=\"table\">
    <thead>
      <tr>
        <th>TIMELINE#</th>
        <th>Name</th>
     </tr>
    </thead>
    <tbody>
      ";


$sql = "SELECT pevents.idmedia, pevents.name, pevents.event_order, pevents.idpls as playlistnum, media.media_order, pevents.marked, media.name as nameorig, media.fname, media.onair, media.duration, media.duration_custom, pevents.e_time, pevents.s_time  FROM media LEFT JOIN pevents ON  media.id = pevents.idmedia WHERE pevents.idpls = $id_pls ORDER BY pevents.event_order ASC";

if($result = mysqli_query($link, $sql)){
foreach ($lines as $line_num => $line)
{

    while ($row = mysqli_fetch_array($result))
    {

$id = $row['idmedia'];
$plsid = $row['playlistnum'];
$nameline = $row['nameorig']; 
$fname = $row['fname'];
$onair = $row['onair'];
$duration = $row['duration'];
$duration_custom = $row['duration_custom'];

if ($duration_custom != 0)
{
$extinfdata = $duration_custom;
}
else
{
$extinfdata = $duration;
}

$duration = gmdate("H:i:s", $extinfdata);

$rowcalc += $extinfdata;
$ended_time = $rowcalc + $t;
$startup_time = $ended_time - $extinfdata;
$human_ended_time = date("H:i:s", $ended_time);
$human_startup_time = date("H:i:s", $startup_time);


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

$sql2 = "UPDATE pevents SET e_time = $ended_time, s_time = $startup_time WHERE idmedia = $id"; 
if (mysqli_query($link, $sql2)) {
      echo "<br>Times for #".$id." updated successfully!";
   } else {
      echo "<br>Error updating record: " . mysqli_error($link);
   }

$sql_update = "UPDATE pevents SET marked = 1 WHERE idmedia = $marked_id"; 
if (mysqli_query($link, $sql_update)) {
      echo "<br>Record #".$marked_id." marked successfully!";
   } else {
      echo "<br>Error updating record: " . mysqli_error($link);
   }  




}
      
    }
     unlink("/home/playtube/crud/shed/calendar/playlist_daily/playlist.txt");
     echo "Playlist file (playlist_".$id_pls.".txt) will be updated in rotate..\n";

        $file = "/home/playtube/crud/playlists/playlist_".$id_pls.".txt";
        $newfile = "/home/playtube/crud/shed/calendar/playlist_daily/playlist.txt";

        if (!copy($file, $newfile)) {
        echo "Не удалось скопировать $file...\n";
      }

    shell_exec("curl -u shardik:trolimoli1218! https://peerhub.ru/flussonic/api/stream_restart/playlist_daily");
}




}


}


elseif ($action == "update") {


}

elseif ($action == "add") {

	
}

elseif ($action == "saveAdd") {

	

	}

elseif ($action == "edit") {
	
	}

elseif ($action == "saveEdit") {


	}

elseif ($action == "delete") {


	}

?>