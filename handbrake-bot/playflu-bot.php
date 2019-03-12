<?php

	$db_host="localhost";
	$db_user="root";
	$db_password="trolimoli1218!";
	$db_name="dbase";
	$sleep_duration= 30;				// Bot sleep duration in secs between checks


function connect_to_database($db_host, $db_user, $db_password) {
        $link = mysql_connect($db_host, $db_user, $db_password);
        mysql_set_charset("utf8");
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
	return $link;
}


function get_marked_media($link, $db_name) {

	$contents = file_get_contents('https://shardik:trolimoli1218!@peerhub.ru/flussonic/api/playlist/playlist1');
	if (!empty($contents))
{

$output = "";
$data = $contents;
$info = json_decode($contents);
$name = $info->current_entry;
$namecheck = substr($name,strrpos($name,"/")+1);
$fullname = substr($name,strrpos($name,"/")+1);
$string = explode('/', $name);
$checkedline = $string[1];

	mysql_select_db($db_name, $link);
	mysql_query ('SET NAMES utf8');
	$select_query = "select id, marked, name from media where onair=1 and marked=1;";
	$marked_media = mysql_query($select_query) or die(mysql_error());
	return $marked_media;
	}
}



function mark_media($db_name, $media_id) {

	    // TODO: figure out media_file id prior db insert, avoiding update
	    /*$select_query="select id, from ".$db_name.".media where id='".$media_id."'";
	    mysql_query ('SET NAMES utf8');
	    $result = mysql_query($select_query) or die(mysql_error());
	    $new_id = mysql_fetch_assoc($result);*/
	    $update_query1="update ".$db_name.".media set marked='0' where id='".$media_id."';";
	  //  $result = mysql_query($update_query) or die(mysql_error());
	   $result = mysql_query($update_query1) or die(mysql_error());

}




###### MAIN ######
while(true) {	
	$link = connect_to_database($db_host, $db_user, $db_password);	
	mysql_set_charset("utf8");
	$marked_media = get_marked_media($link, $db_name);

	while($row = mysql_fetch_assoc($marked_media)){
		foreach($row as $cname => $cvalue){
        		print "$cname: $cvalue\t";
	    	}

		// Get File to be transcoded
	   // $media_file_name= $row['unique_id'];
	    $media_id = $row['id'];
	    $nameline = $row['name'];
	   // $media_size = $row['mediasize'];
	   // $author_email = $row['author_email'];
		//$new_media_file_name = replace_extension($media_file_name, $new_extension);
		//$command = getTranscodeCommandString($handbrake_command, $handbrake_preset, $new_extension, $mediadrop_video_dir, $media_file_name, $new_media_file_name);
        		//email_submitter($media_file_name);

	//insert_new_movie_to_database($db_name, $mediadrop_video_dir, $new_media_file_name, $media_id);    

	//	mark_media($db_name, $media_id);

		//generate_thumbnail_file($mediadrop_thumbnail_dir, $thumbnail_extension, $mediadrop_video_dir, $thumbnail_script_name, $row['unique_id'], $media_id);
       // shell_exec("curl -u shardik:trolimoli1218! https://peerhub.ru/flussonic/api/stream_restart/playlist1");

	    	// transcode file
	    	// TODO: support for multiple profiles
		//shell_exec($command);

	$contents = file_get_contents('https://shardik:trolimoli1218!@peerhub.ru/flussonic/api/playlist/playlist1');
	if (!empty($contents))
{

$output = "";
$data = $contents;
$info = json_decode($contents);
$name = $info->current_entry;
$namecheck = substr($name,strrpos($name,"/")+1);
$fullname = substr($name,strrpos($name,"/")+1);
$string = explode('/', $name);
$checkedline = $string[1];

similar_text($checkedline, $nameline, $percent);

    if ($percent > 99)
{

		echo "\nTV stream was reloaded successfully!";	
		echo "\nNow on air:".$nameline;	
		shell_exec("curl https://subty.ru/api/restart_stream_api.php");
}

		
	}
}
//	shell_exec("curl https://subty.ru/api/plist3_api.php?action=save");

	
	mysql_close($link);

	// Sleep till next check
	sleep($sleep_duration);
}
?>
