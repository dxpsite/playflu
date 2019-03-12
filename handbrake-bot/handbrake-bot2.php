<?php

	
		shell_exec("HandBrakeCLI -i /home/sample/files/1.avi -o /home/sample/files/1.mp4 -m -E copy –audio-copy-mask ac3,dts,dtshd –audio-fallback ffac3 -e x264 -q 20 -x level=4.1:ref=4:b-adapt=2:direct=auto:me=umh:subq=8:rc-lookahead=50:psy-rd=1.0,0.15:deblock=-1,-1:vbv-bufsize=30000:vbv-maxrate=40000:slices=4");
		echo "\nEncoding \"".$new_media_file_name."\" Complete.";	

	
?>
