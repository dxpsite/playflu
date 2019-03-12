<?php

$contents = file_get_contents('https://shardik:trolimoli1218!@peerhub.ru/flussonic/api/playlist/playlist1');
if (!empty($contents))
{

$data = $contents;
$info = json_decode($contents);
$name = $info->current_entry;
$namecheck = substr($name,strrpos($name,"/")+3);
$fullname = substr($name,strrpos($name,"/")+1);


$lines = file('https://subty.ru/shed/playlist.txt');
 
$output .= "<table class=\"table\">
    <thead>
      <tr>
        <th>EXTINF#</th>
        <th>Name</th>
     </tr>
    </thead>
    <tbody>
      ";

foreach ($lines as $line_num => $line) {
if (preg_match('/EXTINF/', htmlspecialchars($line))) {
    $extinfo = htmlspecialchars($line);
	}
if (preg_match('/.mp4/', htmlspecialchars($line))) {
    $checked = substr(htmlspecialchars($line), 7);
 // echo "<br>".$checked;
//  echo "<br>".$namecheck;
  //if ($checked == $namecheck)
similar_text($checked, $namecheck, $percent);
//echo $percent;
  	if ($percent > 80)
  {
  $output .= "<tr class=\"info\">
        <td>".$extinfo."";
    $output .= "</td><td>";
  	$output .= "<span class=\"label label-success\">ON AIR NOW</span> <b>" . $checked . "</b>";
  	$output .= "</td><td></td>
      </tr>";
  }
  else
  {
  	$output .= "<tr class=\"default\">
        <td>".$extinfo."";
  	$output .= "</td><td>";
  	$output .= "" . $checked . "";
  	$output .= "</td><td></td>
      </tr>";
  }
  }
  

}
 $output .= "</tbody></table>";
 echo $output;

}
else
{
	echo "No data yet..\n Please startup infochannel.";
}
?>