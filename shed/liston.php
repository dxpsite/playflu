<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php
// путь к файлу с инициализацией к БД
include ('../config.php');

$userstable = "media";

$query = "SELECT * FROM $userstable WHERE onair = 1 ORDER by media_order DESC";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) > 0)
{

print "<div class=\"container-fluid\"><div class=\"row\"><h4>Infochannel Live:</h4>";

while($row = mysqli_fetch_array($result))
 {
$namer = $row['name'];
$duration = $row['duration'];
//$namer = mysqli_result($result,$i,"name");
//$media = mysqli_result($result,$i,"media");
//$duration = mysqli_result($result,$i,"duration");
//$description = mysqli_result($result,$i,"description");
//$shedule_time = mysqli_result($result,$i,"shedule_time");


$contents = file_get_contents('api_get.php');
//$my_file = 'infotrack.txt';
//$pfile = 'playinfo.txt';
//$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$data = $contents;
//fwrite($handle, $data);

$info = json_decode($contents);
$name = $info->current_entry;
//$time = $info->position;

//обрезаем liv/ получаем только название файла с расширением

$fullname = substr($name, 6);

// считаем временную метку в настоящем времени
//$second = $time / 1000;

//sscanf($duration, "%d:%d:%d", $hour, $minutes, $seconds);

// считаем длительность файла
//$ms = $seconds * 1000 + $minutes * 60 * 1000 + $hour * 30 * 60 * 1000;

//$ostatok = ($ms - $second);


if ($namer == $fullname)
{

print "<a href=\"#\" class=\"list-group-item active\" title=\"".$description."\"><h4 class=\"list-group-item-heading\"><span class=\"label label-success\">On air!</span> ".$namer."</h4>";


echo "<h4><i class=\"fa fa-play-circle-o\"></i>";
$estimated = gmdate("H:i:s", $second);
echo $estimated;
$elapsed = gmdate("H:i:s", $ostatok-25500);

$conv_total_time = strtotime($duration);
$conv_est_time = strtotime($estimated);
$calc_time = $conv_total_time - $conv_est_time;
$calctime = gmdate("H:i", $calc_time);

$nowtime = time();
$next_time = $nowtime + $calc_time;
$res_time = date("H:i", $next_time);

echo " | <i class=\"fa fa fa-clock-o\"></i> ".$duration." <br><i class=\"fa fa-cc fa-2x\" title=\"Русские субтитры\"></i></h4>";

echo "Осталось до конца: ".$calctime."<br>";
echo "Время начала следующей передачи: ".$res_time."<br>";

print "</a>
  <div class=\"list-group\">
  <div class=\"progress\">
  <div class=\"progress-bar progress-bar-success progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"></div></div></div>";
}
else
{
    $conv_duration = strtotime($duration);
    $conv_res_time = strtotime($res_time);
    $res_final_time = $conv_duration + $conv_res_time;
    $res_time2 = date("H:i",$res_final_time+3600);
    print "<div class=\"list-group\"><a href=\"#\" class=\"list-group-item\" title=\"".$description."\">
    <h4 class=\"list-group-item-heading\"><span class=\"label label-default\">".$res_time."</span> ".$namer."</h4>
    <p class=\"list-group-item-text\"><h5>Длительность: ".$duration." <i class=\"fa fa-cc fa-2x\" title=\"Русские субтитры\"></i></h5></a></div>";

}

//$i++;
}
print "</center></div></div>";
}
?>
