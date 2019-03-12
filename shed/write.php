<?php

$content = $_POST['content']; 
$file = "text.txt"; 
$Saved_File = fopen($file, 'w'); 
fwrite($Saved_File, $content); 
fclose($Saved_File);
echo "File saved";
/*$myfile = fopen("playlist.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);*/
?> 