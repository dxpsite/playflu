<?php
/*ob_start();
var_dump($_POST);
$result = ob_get_clean();*/
//$result = strip_tags($result);
//$result = array("one","two","three");
$plsid = $_POST['plsid'];
$playlist = $_POST['playlist'];
$result2 = json_encode($playlist);
/*$num_elements = count($result);*/
//echo $num_elements;
//for ($idx =0; $idx < $num_elements; ++$idx;)
/*while (list ($key,$val) = each ($result))
{*/	
	$myfile = "/playlists/playlist_".$plsid.".txt";

if (!file_exists($myfile)) {
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . $myfile,"w+"); 
//$myfile = fopen("/playlists/playlist_".$plsid.".txt", "w+") or die("Unable to open file!");
fwrite($myfile, $result2);
}
//echo $result[$idx] "<br>\n"; 
//}
//$result=preg_replace("![\\x00-\\x1F]!s","",$result);

//echo'<pre>',var_dump($result),'</pre>';

//$bla = implode(",", $txt);
//$result = $_POST["playlist"];
//echo $txt;
//fwrite($myfile, $txt);
//fopen("playlist.txt", "w");
echo "Success write to file!" . $result2;
fclose($myfile);
?>