    <?php
    define ('PL_HOST', $_SERVER['HTTP_HOST']);

    define ('PL_ABS_URL', '/home/playflu');
    
    /*Flussonic */
    define('FL_HOST', 'peerhub.ru');

    define('FL_USR', 'playflu_usr');

    define('FL_PWD', 'letmein!');

    define('FL_PL_DEMO', 'playlist1');

    define('FL_PL_DAILY', 'playlist_daily');

    /* Database credentials. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */

    define('DB_SERVER', 'localhost');

    define('DB_USERNAME', 'root');

    define('DB_PASSWORD', 'trolimoli1218!');

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

