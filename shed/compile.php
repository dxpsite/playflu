<?php
/*ob_start();
var_dump($_POST);
$result = ob_get_clean();*/
//$result = strip_tags($result);
//$result = array("one","two","three");
$result = $_POST['spge'];
$result2 = json_encode($result);
/*$num_elements = count($result);*/
//echo $num_elements;
//for ($idx =0; $idx < $num_elements; ++$idx;)
/*while (list ($key,$val) = each ($result))
{*/	
$myfile = fopen("playlist.txt", "w") or die("Unable to open file!");
fwrite($myfile, $result2);
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