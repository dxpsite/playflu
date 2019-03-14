<?php
echo "success started..";
    $db_host="localhost";
	$db_user="root";
	$db_password="***************";
	$db_name="dbase";
	$playlists_dir="/home/playflu/playlists/"; // directory, note the trailing slash
	$sleep_duration= 600;				// Bot sleep duration in secs between checks
	

	function connect_to_database($db_host, $db_user, $db_password) {
        $link = mysqli_connect($db_host, $db_user, $db_password);
        mysqli_set_charset($link, "utf8");
        if (!$link) {
            die('Could not connect: ' . mysqli_error());
        }
	return $link;
}


function get_playlist_from_database($link, $db_name) {
	
	mysqli_select_db($link,$db_name);
	$select_query = "SELECT * FROM playlists WHERE ( NOW() BETWEEN start AND end)";
	//$select_query = "SELECT * FROM playlists WHERE start >= '2019-01-13 00:00:00' AND end <= '2019-01-19 00:00:00'";
	$unencoded_media = mysqli_query($link, $select_query) or die(mysqli_error());
	return $unencoded_media;

}

function email_submitter($playlist_name) {
  // send email to media owner
	    $to = '*********@gmail.com';
	    $subject = "PlayFlu event: Daily playlist setup successfully";
	    $message = "Your playlist with name '".$playlist_name."' has been set in to the mainframe.";
	    $from = "bot@subty.ru";
	    $headers = "From:" . $from;
	    mail($to,$subject,$message,$headers);
}

while(true){	
	$link = connect_to_database($db_host, $db_user, $db_password);	
	mysqli_set_charset($link, "utf8");
	$unencoded_media = get_playlist_from_database($link, $db_name);

	while($row = mysqli_fetch_array($unencoded_media)){
	    $playlist_name = $row['title'];
	    $playlist_id = $row['id'];
		echo $playlist_name."\n";
		echo "File: playlist_".$playlist_id.".txt\n";
		$file = "/home/playflu/playlists/playlist_".$playlist_id.".txt";
        $newfile = "/home/playflu/shed/calendar/playlist_daily/playlist.txt";
        if (!copy($file, $newfile)) {
        echo "Не удалось скопировать $file...\n";
}


	}
	
	mysqli_close($link);

	// Sleep till next check
	sleep($sleep_duration);
}
	
?>