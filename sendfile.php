<?php

require 'aws/aws-autoloader.php';
require 'config.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

if(isset($_GET['id'])){
 $id = $_GET['id']*1; 

        // Prepare a select statement

 
        $query = "SELECT * FROM files WHERE id = $id AND stored = 0 LIMIT 1 FOR UPDATE";

  // Attempt select query execution

//$sql = "SELECT * FROM persons WHERE first_name='john'";

if($result = mysqli_query($link, $query)){

    if(mysqli_num_rows($result) > 0){

        echo "<table>";

            echo "<tr>";

                echo "<th>id</th>";

                echo "<th>first_name</th>";

                echo "<th>last_name</th>";

                echo "<th>email</th>";

                echo "<th>Hotbox</th>";

            echo "</tr>";

        while($row = mysqli_fetch_assoc($result)){


/*$d = mysqli_query("UPDATE files SET stored = 1 WHERE id = $id");

if ($d) {echo "da"; }
else { echo mysql_error(); }
*/
//$sql_table_data[] = $row;

//mysql_query("COMMIT;");

//if ($d) {echo "da"; }
//else { echo mysql_error(); }

            echo "<tr>";

                echo "<td>" . $row['id'] . "</td>";

                echo "<td>" . $row['name'] . "</td>";

                echo "<td>" . $row['title'] . "</td>";

                echo "<td>" . $row['size'] . "</td>";

                 echo "<td>" . $row['stored'] . "</td>";

            echo "</tr>";

mysqli_query("UPDATE files SET stored = 1 WHERE id = '".$id."'");
//$bucket = 'dxponebucket';
$bucket = 'testbox1';
$keyname = $row['name'];
// $filepath should be absolute path to a file on disk                      
$filePath = '/home/playtube/crud/media/files/'.$row['name'].'';

// Instantiate the client.
 $s3 = new S3Client([
    'version'     => 'latest',
    'region'      => 'ru-msk',
    'credentials' => [
        //'key'    => 'b3pH8xGkTchQxJNdHFn6V6',
        //'secret' => 'f2DW59tqDS3oMjZHi2MqtPtdY9mYdTC4qx2diPxDH5Yw',\
   // s3://faGeMDnBHQjsgUa9Apbt2z:fFLoRrXFmU9ELDMziopzXkvJYoVMpmsDm3t4tgLprSog@hb.bizmrg.com/textbox1
           'key' => 'faGeMDnBHQjsgUa9Apbt2z',
           'credentials' => 'fFLoRrXFmU9ELDMziopzXkvJYoVMpmsDm3t4tgLprSog',    
    ],
    'endpoint' => 'https://hb.bizmrg.com'
 ]);

try {
    // Upload data.
    $result = $s3->putObject(array(
        'Bucket' => $bucket,
        'Key'    => $keyname,
        'SourceFile'   => $filePath,
        'ACL'    => 'public-read',
        'ContentType' => 'video/mp4'
    ));

echo $result['@metadata']["statusCode"]. "\n";
echo $id . "\n";
    // Print the URL to the object.
    echo $result['ObjectURL'] . "\n";
} 

catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}


        }

        echo "</table>";


      

   // Close result set

        mysqli_free_result($result);

    } else{

        echo "No records matching your query were found.";

    }

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

 

// Close connection

mysqli_close($link);
/*
function mysql_insert() {
  //  $values = array_map('mysql_real_escape_string', array_values($inserts));
 //   $keys = array_keys($inserts);
       
    return mysql_query('UPDATE files SET stored = 1 WHERE id = $id');
}

mysql_insert();
*/
    } else{

        // URL doesn't contain id parameter. Redirect to error page

        header("location: error.php");

        exit();

    }




?>