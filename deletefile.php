<?php
require 'aws/aws-autoloader.php';
require 'config.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

if(isset($_GET['id'])){
 
 $id = $_GET['id']*1; 


$query = "SELECT * FROM media WHERE id = $id AND stored = 1 LIMIT 1 FOR UPDATE";
$result = mysqli_query($link,$query);

while ($row = mysqli_fetch_array($result)) {

$bucket = "".HB_BUCKET."";
$keyname = $row['name'];
// $filepath should be absolute path to a file on disk                      
$filePath = "".PL_ABS_URL."/media/files/".$row['name']."";

// Instantiate the client.
 $s3 = new S3Client([
    'version'     => 'latest',
    'region'      => 'ru-msk',
    'credentials' => [
        'key'    => "".HB_ACCESSKEY."",
        'secret' => "".HB_SECRETKEY."",
    ],
    'endpoint' => "".HB_ENDPOINT.""
 ]);

try {
    // delete data.
     $results3 = $s3->deleteObject([
                'Key'    => $keyname,
                'Bucket' => $bucket,
            ]);

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

 mysqli_query($link,"UPDATE media SET stored=0 WHERE id='".$row['id']."'");

 header("location: index.php");
}  
mysqli_close($link);  
}
