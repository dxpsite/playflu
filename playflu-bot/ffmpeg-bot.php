<?php
	$db_host="localhost";
	$db_user="root";
	$db_password="************";
	$db_name="dbase";
	
	$playflu_media_dir="/home/playflu/media/files/"; 
	$ffmpeg_bot_dir="/opt/handbrake-bot/";
	$sleep_duration= 10;				// Bot sleep duration in secs between checks
	// =====================================
	

	// =====================================
	// General Settings:
	// These should not require editing 

	$ffmpeg_command = "ffmpeg ";
	//$ffmpeg_preset = " -map 0:0 -map 0:0 -map 0:0 -map 0:1 -c:v:0 libx264 -b:v:0 1800k -metadata:s:v:0 language=eng -c:v:1 libx264 -b:v:1 900k -metadata:s:v:1 language=eng -c:v:2 libx264 -b:v:2 300k -metadata:s:v:2 language=eng -c:a:0 copy -metadata:s:a:0 language=rus -c:a:1 copy -metadata:s:a:1 language=eng -c:s:0 copy -metadata:s:s:0 language=rus -c:s:1 copy -metadata:s:s:1 language=eng -async 1 -vsync 1 ";
	$ffmpeg_preset = "-vcodec h264 -threads 0 -r 25 -g 50 -b 500k -bt 500k -acodec mp3 -ar 44100 -ab 64k";
	
	$new_extension = "mp4";
	$thumbnail_script_name = $ffmpeg_bot_dir."scripts/ffmpeg-make-thumbnail.sh"; 
	$thumbnail_extension = "jpg";
	$mediadrop_thumbnail_dir = $playflu_media_dir."thumbnail/";
	// =====================================


function connect_to_database($db_host, $db_user, $db_password) {
        $link = mysql_connect($db_host, $db_user, $db_password);
        mysql_set_charset("utf8");
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
	return $link;
}


function get_unencoded_media($link, $db_name) {
	mysql_select_db($db_name, $link);
	mysql_query ('SET NAMES utf8');
	$select_query = "select media_files.author_email, media.id as mediaid,media_files.id,media_files.size as mediasize,media_files.type,container,unique_id,media_files.storage_id from media_files left join media on (media_files.media_id = media.id) where (media.encoded=0) and (media_files.storage_id=1);";
	$unencoded_media = mysql_query($select_query) or die(mysql_error());
	return $unencoded_media;
}

//Liberated from: http://stackoverflow.com/questions/193794/how-can-i-change-a-files-extension-using-php
function replace_extension($filename, $new_extension) {
	$info = pathinfo($filename);
	return $info['filename'] . '.' . $new_extension;
}


function getTranscodeCommandString($ffmpeg_command, $ffmpeg_preset, $new_extension, $playflu_media_dir, $srcFile, $destFile) {
	return $ffmpeg_command." -i ".$playflu_media_dir.$srcFile." ".$ffmpeg_preset." ".$playflu_media_dir.$destFile." 1> ".$playflu_media_dir."eta.txt 2>&1";
}

	
function mark_new_media_as_not_queued($db_name, $media_id) {
	     $update_query = "update ".$db_name.".media set queued='0' where id=media.id;";
	     $result = mysql_query($update_query) or die(mysql_error());
}


function mark_new_media_as_encoded($db_name, $new_media_file_name, $playflu_media_dir, $media_id,$media_size) {

	    $select_query="select id, size from ".$db_name.".media_files where unique_id='".$new_media_file_name."'";
	    mysql_query ('SET NAMES utf8');
	    $result = mysql_query($select_query) or die(mysql_error());
	    $new_id = mysql_fetch_assoc($result);
	    rename($playflu_media_dir.$new_media_file_name, $playflu_media_dir.$new_id['id']."-".$new_media_file_name );
	     $update_query1="update ".$db_name.".media set encoded='1', name='".$new_id['id']."-".$new_media_file_name."', fname='".$new_id['id']."-".$new_media_file_name."', size='".$media_size."' where id='".$media_id."';";
	   $result = mysql_query($update_query1) or die(mysql_error());

}


###### MAIN ######
while(true){	
	$link = connect_to_database($db_host, $db_user, $db_password);	
	mysql_set_charset("utf8");
	$unencoded_media = get_unencoded_media($link, $db_name);

	while($row = mysql_fetch_assoc($unencoded_media)){
		foreach($row as $cname => $cvalue){
        		print "$cname: $cvalue\t";
	    	}

		// Get File to be transcoded
	    $media_file_name= $row['unique_id'];
	    $media_id = $row['mediaid'];
	    $media_size = $row['mediasize'];
	    // Set current file not queued
	    $update_query = "update ".$db_name.".media set queued='0' where id=".$media_id.";";
	    $result = mysql_query($update_query) or die(mysql_error());
		$new_media_file_name = replace_extension($media_file_name, $new_extension);
        //mark_new_media_as_not_queued ($db_name, $media_id); 
		$command = getTranscodeCommandString($ffmpeg_command, $ffmpeg_preset, $new_extension, $playflu_media_dir, $media_file_name, $new_media_file_name);

	    	// transcode file
	    	// TODO: support for multiple profiles
		shell_exec($command);
		echo "\nEncoding \"".$new_media_file_name."\" Complete.";	
		mark_new_media_as_encoded($db_name, $new_media_file_name, $playflu_media_dir, $media_id, $media_size);

		
	}
	
	mysql_close($link);

	// Sleep till next check
	sleep($sleep_duration);
}
?>
