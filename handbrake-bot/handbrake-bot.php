<?php
	// Handbrake-based encoder for MediaDrop
	// *Shamelessly* hacked by DocDawning (doc@dawning.ca), from the FFMPEG encoder Bot for MediaCore by Valero Minetti

	// I forked this micro project because of frustrations with running ffmpeg/avconv on Ubuntu, particularly 
	// when I've had so much nice success with Handbrake.

	// INSTALLATION
	// sudo add-apt-repository ppa:stebbins/handbrake-releases
	// sudo apt-get update
	// sudo apt-get -y install handbrake-cli
	
	// =====================================
	// Configuration: 
	// edit this to adapt bot to your environment/paths
	// =====================================
	// TODO: Config should be done via an INI config file.
	$db_host="localhost";
	$db_user="root";
	$db_password="trolimoli1218!";
	$db_name="dbase";
	//$mediadrop_video_dir="/home/sample/files/"; // Mediadrop Media directory, note the trailing slash
	$mediadrop_video_dir="/home/playtube/crud/media/files/"; // Mediadrop Media directory, note the trailing slash
	$handbrake_bot_dir="/opt/mediadrop-handbrake/";
	$sleep_duration= 10;				// Bot sleep duration in secs between checks
	// =====================================
	

	// =====================================
	// General Settings:
	// These should not require editing 

	$handbrake_command = "HandBrakeCLI ";
	//$handbrake_preset = " --preset=\"Normal\" ";
	$handbrake_preset = " -e x264 -b:v 2048 -b:a 192";
	//$handbrake_preset = " --preset=\"iPhone & iPod touch\" ";
	//$handbrake_preset = " --preset=\"AppleTV 3\" ";	// Presets are defined here: https://handbrake.fr/docs/en/latest/technical/official-presets.html
	//$handbrake_preset = " -m -E copy --width 640 --height 480 –audio-copy-mask ac3,dts,dtshd –audio-fallback ffac3 -e x264 -q 20 -x level=4.1:ref=4:b-adapt=2:direct=auto:me=umh:subq=8:rc-lookahead=50:psy-rd=1.0,0.15:deblock=-1,-1:vbv-bufsize=30000:vbv-maxrate=10000:slices=4";
	$new_extension = "mp4";
	$thumbnail_script_name = $handbrake_bot_dir."scripts/ffmpeg-make-thumbnail.sh"; 
	$thumbnail_extension = "jpg";
	$mediadrop_thumbnail_dir = $mediadrop_video_dir."thumbnail/";
	// =====================================


function connect_to_database($db_host, $db_user, $db_password) {
        $link = mysql_connect($db_host, $db_user, $db_password);
        mysql_set_charset("utf8");
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
	return $link;
}

/*	
function get_unencoded_media($link, $db_name) {
	mysql_select_db($db_name, $link);
	$select_query = "select media.author_email, media.id as mediaid,media_files.id,media_files.type,container,unique_id,media_files.storage_id from media_files left join media on (media_files.media_id = media.id) where (media.encoded=0) and (media_files.storage_id=1);";
	$unencoded_media = mysql_query($select_query) or die(mysql_error());
	return $unencoded_media;
}
*/	
/*
function get_unencoded_media($link, $db_name) {
	mysql_select_db($db_name, $link);
	$select_query = "select media.author_email, media.id as mediaid,media_files.id,media_files.type,container,unique_id,media_files.storage_id from media_files left join media on (media_files.media_id = media.id) where (media.encoded=0) and (media_files.storage_id=1);";
	$unencoded_media = mysql_query($select_query) or die(mysql_error());
	return $unencoded_media;
}	
*/

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


function getTranscodeCommandString($handbrake_command, $handbrake_preset, $new_extension, $mediadrop_video_dir, $srcFile, $destFile) {
	return $handbrake_command.$handbrake_preset." -i ".$mediadrop_video_dir.$srcFile." -o ".$mediadrop_video_dir.$destFile;
}

	
function insert_new_movie_to_database($db_name, $file_path, $new_file, $media_id) {
	$info = pathinfo($new_file);
	$new_extension = $info['extension'];
	$fileSize = filesize($file_path.$new_file);
	$dateNow = date('Y-m-d H:i:s');
	$bitrate = "5000";
	$width = "720";	//FYI: With a hardcoded preset as we're using here, this could be entered, but that's moving in the wrong direction
	$height = "560";

	//$insert_query="insert into ".$db_name.".media_files ( media_id, storage_id, display_name, unique_id, size, created_on, modified_on, bitrate, width, height, type, container ) values ('".$media_id."','1','".$new_file."','".$new_file."','".$fileSize."','".$dateNow."','".$dateNow."',".$bitrate.",".$width.",".$height.",'video','".$new_extension."')";
	//$update_query1="update ".$db_name.".media set encoded='1', name=".$new_file."', size='".$fileSize."' where id='".$media_id."';";
//	$result = mysql_query($insert_query) or die(mysql_error());
//	 $result = mysql_query($update_query1) or die(mysql_error());
//	return $result;
}

function email_submitter($media_file_name) {
  // send email to media owner
	    $to = 'dxpsite@gmail.com';
	    $subject = "PlayFlu event: Video Transcoded";
	    $message = "Your file '".$media_file_name."' has been fed in to the mainframe and converted in to epic media.";
	    $from = "bot@subty.ru";
	    $headers = "From:" . $from;
	    mail($to,$subject,$message,$headers);
}


function mark_new_media_as_encoded($db_name, $new_media_file_name, $mediadrop_video_dir, $media_id,$media_size) {

	    // TODO: figure out media_file id prior db insert, avoiding update
	    $select_query="select id, size from ".$db_name.".media_files where unique_id='".$new_media_file_name."'";
	    mysql_query ('SET NAMES utf8');
	    $result = mysql_query($select_query) or die(mysql_error());
	    $new_id = mysql_fetch_assoc($result);
	   // $fileSize = filesize($file_path.$new_file);
	    
	    // rename and update transcoded media file and db row
	    rename($mediadrop_video_dir.$new_media_file_name, $mediadrop_video_dir.$new_id['id']."-".$new_media_file_name );
	    //rename($mediadrop_video_dir.$new_media_file_name, $mediadrop_video_dir.$new_media_file_name );
	  //  $update_query= "update ".$db_name.".media_files set unique_id='".$new_id['id']."-".$new_media_file_name."' where id='".$new_id['id']."';";
	   //$update_query1="update ".$db_name.".media set encoded='1', name='".$new_id['id']."-".$new_media_file_name."', size='".$media_size."' where id='".$media_id."';";
	     $update_query1="update ".$db_name.".media set encoded='1', name='".$new_id['id']."-".$new_media_file_name."', fname='".$new_id['id']."-".$new_media_file_name."', size='".$media_size."' where id='".$media_id."';";
	  //  $result = mysql_query($update_query) or die(mysql_error());
	   $result = mysql_query($update_query1) or die(mysql_error());

}

//TODO: It'd be nice to use the mediadrop thumbnail library instead. It doesn't work for me.
function generate_thumbnail_file($mediadrop_thumbnail_dir, $thumbnail_extension, $mediadrop_video_dir, $thumbnail_script_name, $src_media_file, $media_id) {
	$thumbnail_orig_name = $mediadrop_thumbnail_dir.$media_id."orig.".$thumbnail_extension;
	$src_media_file = $mediadrop_video_dir . $src_media_file;
	echo "\nGenerating Thumbnail Image from file: \"".$src_media_file."\", saving to image file: ".$thumbnail_orig_name."\"\n";
	shell_exec($thumbnail_script_name." ".$src_media_file." ".$thumbnail_orig_name);
	
	//This is hacky/lazy. We could use imagemagick or something to make actually differing sizes of thumbnails, or we could call the mediadrop thumbnail lib for this
	$thumbnail_s_name = $mediadrop_thumbnail_dir.$media_id."s.".$thumbnail_extension;
	$thumbnail_m_name = $mediadrop_thumbnail_dir.$media_id."m.".$thumbnail_extension;
	$thumbnail_l_name = $mediadrop_thumbnail_dir.$media_id."l.".$thumbnail_extension;
	shell_exec("cp ".$thumbnail_orig_name." ".$thumbnail_s_name);
	shell_exec("cp ".$thumbnail_orig_name." ".$thumbnail_m_name);
	shell_exec("cp ".$thumbnail_orig_name." ".$thumbnail_l_name);
	echo "\nThumbnails are done!";	
	unlink($src_media_file);
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
	   // $author_email = $row['author_email'];
		$new_media_file_name = replace_extension($media_file_name, $new_extension);
		$command = getTranscodeCommandString($handbrake_command, $handbrake_preset, $new_extension, $mediadrop_video_dir, $media_file_name, $new_media_file_name);

	    	// transcode file
	    	// TODO: support for multiple profiles
		shell_exec($command);
		echo "\nEncoding \"".$new_media_file_name."\" Complete.";	

		email_submitter($media_file_name);

	//insert_new_movie_to_database($db_name, $mediadrop_video_dir, $new_media_file_name, $media_id);    

		mark_new_media_as_encoded($db_name, $new_media_file_name, $mediadrop_video_dir, $media_id, $media_size);

		generate_thumbnail_file($mediadrop_thumbnail_dir, $thumbnail_extension, $mediadrop_video_dir, $thumbnail_script_name, $row['unique_id'], $media_id);

		
	}
	
	mysql_close($link);

	// Sleep till next check
	sleep($sleep_duration);
}
?>
