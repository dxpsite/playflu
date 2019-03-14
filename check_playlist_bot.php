<?php
if ($_GET['run']) 
{
shell_exec("cd /opt/handbrake-bot/ && ./start_playlist_bot.sh");
}
?>
<a href="?run=true" class="btn btn-success small">Click Me!</a>
   