<?php

 require_once '../config.php';
header('Content-type: text/html; charset=utf-8');
function translit($s) {
  $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $s = str_replace(" ", "_", $s); // заменяем пробелы знаком минус
  return $s; // возвращаем результат
}
//$descr = $_GET['description'];
$fileName1 = $_FILES["file1"]["name"]; // The file name
$fileName = translit($fileName1);
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "files/$fileName")){
$duration = shell_exec("ffprobe -i /home/crud/media/files/" .$fileName. " -show_entries format=duration -v quiet -of csv=\"p=0\"");
$duration_file = substr($duration, 0, -8);
//$fsize = formatBytes($fileSize, 2); 
$date = date("Y:m:d");
//$container = substr($fileType, 6);

$sql = "INSERT HIGH_PRIORITY INTO media (name, size, duration) VALUES ('".$fileName."', '".$fileSize."', '".$duration_file."')";
//$mysqli->query($sql);
//printf ("ID новой записи: %d.\n", $mysqli->insert_id);


$sql2 = "SELECT * FROM media ORDER BY id DESC LIMIT 1";



if($result = mysqli_query($link, $sql2)){

                            if(mysqli_num_rows($result) > 0){

                            	 while($row = mysqli_fetch_array($result)){

                            	 //	echo "ID file is: ".$row[id]."<br>";
                                $idmedia = $row[id]+1;
                            	 	
                            	 	//$lastid = mysqli_insert_id();

                            	 	//echo "ID1 file is: ".$idmedia."<br>[".$lastid."]";

                            	 }

                            }

                            else
                            {
                               $idmedia = '1';     
                            }


                        }

                   

//echo = "id"
$sql3 = "INSERT LOW_PRIORITY INTO media_files (id, type, unique_id, media_id, storage_id, display_name, size, created_on, modified_on, bitrate, width, height, author_email, container) 
VALUES ('".$idmedia."','video','".$fileName."', '".$idmedia."','1','".$fileName."','".$fileSize."','".$date."','".$date."','5000','720','560','dxpsite@gmail.com','".$fileType."')";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully!<br>";
 echo "filesize: ".$fileSize."<br>";
    echo "ID2 file is: ".$idmedia."<br>";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

if ($link->query($sql3) === TRUE) {
    echo "Second record created successfully!<br>";
     echo "filetype: ".$fileType."<br>";
     echo "filesize: ".$fileSize."<br>";
     echo "Duration: ".$duration_file." sec.";
} else {
    echo "Error: " . $sql3 . "<br>" . $link->error;
}


$link->close();

    echo "$fileName upload is complete! <br><a href=\"/index.php\" class=\"btn btn-primary\">Return to homepage</a>";
} else {
    echo "move_uploaded_file function failed";
}
?>