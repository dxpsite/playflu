<?php
echo "success started..";
    $db_host="localhost";
	$db_user="root";
	$db_password="trolimoli1218!";
	$db_name="dbase";
	$playlists_dir="/home/playtube/crud/playlists/"; // Mediadrop Media directory, note the trailing slash
	//$handbrake_bot_dir="/opt/handbrake-bot/";
	$sleep_duration= 600;				// Bot sleep duration in secs between checks
	//$datetime = date_create()->format('Y-m-d H:i:s');
	//$datetime = date_create()->format('Y-m-d H:i:s');
//$datetime = date_create()->format('Y-m-d H:i:s');

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
	//mysqli_query ('SET NAMES utf8');
	//$datetime = date_create()->format('Y-m-d H:i:s');
	//$select_query = "SELECT * FROM playlists WHERE DATE(start) = CURDATE()";
	$select_query = "SELECT * FROM playlists WHERE ( NOW() BETWEEN start AND end)";
	//$select_query = "SELECT * FROM playlists WHERE start >= '2019-01-13 00:00:00' AND end <= '2019-01-19 00:00:00'";
	$unencoded_media = mysqli_query($link, $select_query) or die(mysqli_error());
	return $unencoded_media;

}

function email_submitter($playlist_name) {
  // send email to media owner
	    $to = 'dxpsite@gmail.com';
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
	//	foreach($row as $cname => $cvalue){
     //   		print "$cname: $cvalue\t";
	  //  	}

		// Get File to be transcoded
	    $playlist_name = $row['title'];
	    $playlist_id = $row['id'];
	    // $author_email = $row['author_email'];
		//$new_media_file_name = replace_extension($media_file_name, $new_extension);
		//$command = getTranscodeCommandString($handbrake_command, $handbrake_preset, $new_extension, $playlists_dir, $media_file_name, $new_media_file_name);

	    	// transcode file
	    	// TODO: support for multiple profiles
		//shell_exec($command);
		//echo "\nEncoding \"".$new_media_file_name."\" Complete.";	

		//email_submitter($media_file_name);

	//insert_new_movie_to_database($db_name, $playlists_dir, $new_media_file_name, $media_id);    

		//mark_new_media_as_encoded($db_name, $new_media_file_name, $playlists_dir, $media_id, $media_size);

		//generate_thumbnail_file($mediadrop_thumbnail_dir, $thumbnail_extension, $playlists_dir, $thumbnail_script_name, $row['unique_id'], $media_id);

		echo $playlist_name."\n";
		echo "File: playlist_".$playlist_id.".txt\n";

		$file = "/home/playtube/crud/playlists/playlist_".$playlist_id.".txt";
        $newfile = "/home/playtube/crud/shed/calendar/playlist_daily/playlist.txt";

        if (!copy($file, $newfile)) {
        echo "Не удалось скопировать $file...\n";
}

		//email_submitter($playlist_name);



	}
//}
	
	mysqli_close($link);

	// Sleep till next check
	sleep($sleep_duration);
}
	
?>