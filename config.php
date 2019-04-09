    <?php
    /* System */
    define ('PL_HOST', $_SERVER['HTTP_HOST']);

    define ('PL_ABS_URL', '/home/playflu');
    
    /* Flussonic */
    
    define('FL_HOST', 'yoururl'); // without http:// or https:// ex. stream.com

    define('FL_USR', 'login');

    define('FL_PWD', 'passsomecoded');

    define('FL_PL_DEMO', 'playlist_demo');

    define('FL_PL_DAILY', 'playlist_daily');

    /* FFMPEG Settings */
    define('FFMPEG_COMMAND', '-map 0:0 -map 0:0 -map 0:0 -map 0:1 -c:v:0 libx264 -b:v:0 2024k -metadata:s:v:0 language=eng -c:v:1 libx264 -b:v:1 1024k -metadata:s:v:1 language=eng -c:v:2 libx264 -b:v:2 500k -metadata:s:v:2 language=eng');

    /* Hotbox settings */

    define('HB_ACCESSKEY', '***********************'); // Access key

    define('HB_SECRETKEY', '****************************************'); // Secret key

    define('HB_BUCKET', 'testbox1');

    define('HB_ENDPOINT', 'https://hb.bizmrg.com');

    /* Database credentials */

    define('DB_SERVER', 'localhost');

    define('DB_USERNAME', 'login');

    define('DB_PASSWORD', 'password');

    define('DB_NAME', 'dbase');



    /* Attempt to connect to MySQL database */

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


    mysqli_set_charset($link, 'utf8');
    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

function humanFileSize($size,$unit="") {
  if( (!$unit && $size >= 1<<30) || $unit == "GB")
    return number_format($size/(1<<30),2)."GB";
  if( (!$unit && $size >= 1<<20) || $unit == "MB")
    return number_format($size/(1<<20),2)."MB";
  if( (!$unit && $size >= 1<<10) || $unit == "KB")
    return number_format($size/(1<<10),2)."KB";
  return number_format($size)." bytes";
}

function getEncodedVideo($type, $file) {
   return 'data:video/' . $type . ';base64,' . base64_encode(file_get_contents($file));
}
/*
    function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
     //$bytes /= pow(1024, $pow);
    // $bytes /= (1 << (10 * $pow)); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
    } 
*/
    ?>

