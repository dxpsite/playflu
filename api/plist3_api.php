<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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


  $output .= "<tr class=\"info\">
         <td> | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
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
       <td> | Duration: ".$duration." [Startup at: ".$human_startup_time." End at: ".$human_ended_time."]";
    $output .= "</td><td>";
    //$output .= "(ID:". $id .")". $percent . "" . $fname . "";
    $output .= "" . $fname . "";
    $output .= "</td><td></td>
      </tr>";
    
  }
}


       /* }*/
    }
   // echo "<br />Checked: $checked";
 //   mysql_data_seek($sql,0); // <=== Set the resultsets internal pointer back to zero (the first record).
}

 $output .= "</tbody></table>";

?>
<script type="text/javascript">
$(function()
{
    $('body').on('click', 'a.ajax', function(event) // вешаем обработчик на все ссылки, даже созданные после загрузки страницы
    {
        event.preventDefault(); // предотвращаем штатное действие, то есть переход по ссылке
        $.get($(this).attr('href'), function(data) // отправляем GET запрос на href, указанный в ссылке
        {
            console.log(data); // выводим полученные данные в консоль.
        }); // закряваем скобку :)
    }); // закрываем скобку :)
});
</script>
<?php 
 $output .= "<br><a class=\"ajax\" href=\"https://subty.ru/api/plist3_api.php?action=save\" style=\"color:#999\"><button type='submit' class='btn btn-primary'>Recalculate all timestamp and restart stream</button></a>
 <p>Warning: after a reboot of the stream, it is possible to freeze clients for a short time</p>";

//$output .= "<form action=/api/plist3_api.php method=post>
  //  <button type='submit' class='btn btn-primary' name='action' value='save'>Recalculate all timestamp and restart stream</button>
//</form>";

 echo $output;	

}
/////////////////////

}

elseif ($action == "save") {

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


header("refresh:0;url=https://subty.ru");
 // echo '<br>You\'ll be redirected in about 5 secs. If not, click <a href="plist3_api.php">here</a>.'; 
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
//$ended_time_check  += $ended_time;
$startup_time = $ended_time - $extinfdata;
$human_ended_time = date("H:i:s", $ended_time);
$human_startup_time = date("H:i:s", $startup_time);
//$calc = $duration + ;


similar_text($checkedline, $nameline, $percent);


    if ($percent > 99)
{


  $output .= "<tr class=\"info\">
         <td> | Duration: ".$duration." [Startup at: (".$startup_time.")".$human_startup_time." End at: (".$ended_time.")".$human_ended_time."]";
    $output .= "</td><td>";
    $output .= "<span class=\"label label-success\">".$percent."%<br>ON AIR NOW</span> <b>(ID: ". $id .")". $nameline . "</b>";
    $output .= "</td><td></td>
      </tr>";
  
  }
  else
  {
    $output .= "<tr class=\"default\">
       <td> | Duration: ".$duration." [Startup at: (".$startup_time.")".$human_startup_time." End at: (".$ended_time.")".$human_ended_time."]";
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

$sql_update = "UPDATE media SET marked = 1 WHERE id = $marked_id"; 
if (mysqli_query($link, $sql_update)) {
      echo "<br>Record #".$marked_id." marked successfully!";
   } else {
      echo "<br>Error updating record: " . mysqli_error($link);
   }  
 //  mysqli_close($link);

}
       /* }*/
    }
   // echo "<br />Checked: $checked";
    //mysql_data_seek($sql,0); // <=== Set the resultsets internal pointer back to zero (the first record).
    shell_exec("curl -u shardik:trolimoli1218! https://peerhub.ru/flussonic/api/stream_restart/playlist1");
}

// $output .= "</tbody></table>";
 //$output .= "<br><a href=\"?action=save\" style=\"color:#999\">Save all data and restart stream</a> | <a href=\"?action=update\" style=\"color:#999\">Update all</a>";

// echo $output;	


}
/////////////////////	

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