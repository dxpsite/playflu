<?php

require 'aws/aws-autoloader.php';
//require 'config.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//use Aws\Exception\AwsException;

if(isset($_GET['id'])){
 
 $id = $_GET['id']*1; 

        // Prepare a select statement
$link = mysqli_connect("localhost", "root", "trolimoli1218!", "dbase");
if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$query = "SELECT * FROM media WHERE id = $id AND stored = 0 LIMIT 1 FOR UPDATE";
$result = mysqli_query($link,$query);
 


while ($row = mysqli_fetch_array($result)) {




$bucket = 'testbox1';
$keyname = $row['name'];
// $filepath should be absolute path to a file on disk                      
$filePath = '/home/playtube/crud/media/files/'.$row['name'].'';

// Instantiate the client.
 $s3 = new S3Client([
    'version'     => 'latest',
    'region'      => 'ru-msk',
    'credentials' => [
        'key'    => 'faGeMDnBHQjsgUa9Apbt2z',
        'secret' => 'fFLoRrXFmU9ELDMziopzXkvJYoVMpmsDm3t4tgLprSog',
    ],
    'endpoint' => 'https://hb.bizmrg.com'
 ]);

try {
    // Upload data.
    $results3 = $s3->putObject(array(
        'Bucket' => $bucket,
        'Key'    => $keyname,
        'SourceFile'   => $filePath,
        'ACL'    => 'public-read',
        'ContentType' => 'video/mp4'
    ));

echo $results3['@metadata']["statusCode"]. "\n";
echo $id . "\n";
    // Print the URL to the object.
    echo $results3['ObjectURL'] . "\n";
} 

catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}


 echo $row['name']."<br />";  
 echo $row['id']."<br />";  

//$duration_1 = shell_exec("ffprobe -i /home/crud/media/files/" . $row['name'] . " -show_entries format=duration -v quiet -of csv=\"p=0\"");
//$duration = substr($duration_1, 0, -8);

 //mysql_query("UPDATE media SET stored=1, duration='".$duration_1."' WHERE id='".$row['id']."'");
 mysqli_query($link,"UPDATE media SET stored=1 WHERE id='".$row['id']."'");

 header("location: index.php");
}  
mysqli_close($con);  
}
