<?php
                        require_once 'auth/auth.php';
                        // HTML authentication
                        authHTML();
                        include 'theme/header.php';
                        
                        // Include config file

//                        require_once 'config.php'; 
?>

     <script type="text/javascript">

            $(document).ready(function(){

                $('[data-toggle="tooltip"]').tooltip();   

            });

        </script>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PlayFLU</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="https://subty.ru">Home</a></li>
                <li><a href="https://subty.ru/addmedia/">Upload</a></li> 
                <li><a href="https://subty.ru/shed/">Sheduler</a></li>
                <li><a href="https://subty.ru/settings/">Settings</a></li>
                <li><a href="https://subty.ru/logout.php">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <div class="page-header clearfix">

<div class="container-fluid">
  <div class="row">
  <div class="col-lg-6"> 
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Program</h2>
                        </div>
<div id="plistapi">Be patient..<i class="fas fa-cog fa-spin fa-lg"></i></div>
</div>
<div class="col-lg-6 pull-right">
<div class="page-header clearfix">
                            <h2 class="pull-left">Preview Stream</h2>
                        </div>
	<div type="button" class="btn btn-default" id="time"></div>
<a href="/shed"><div type="button" class="btn btn-default" id="checkair">Be patient..<i class="fas fa-cog fa-spin fa-lg"></i></div></a>
<hr>
<!--<iframe style="width:600px; height:290px; top:-300px;" allowfullscreen src="https://peerhub.ru/playlist1/embed.html"></iframe>-->

 <video id="my_video_1" class="video-js vjs-default-skin vjs-16-9 vjs-big-play-centered" controls autoplay preload="auto" width="640" height="268"
  data-setup='{}'>
  </video>

  <script>
    const player = videojs('my_video_1');
    player.src({
      src: 'https://peerhub.ru/playlist1/index.m3u8',
      type: 'application/x-mpegURL'
    });
  </script>


  </div>
  </div>
</div>                        

                        </div>
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Dashboard</h2>
                        </div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Print any words.." class="form-control" />
				</div>
			</div>
			<br />
            			<div class="scroll-area" id="result"></div>
     		
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>

<script>
    function show()
    {
      $.ajax({
        url: "time.php",
        cache: false,
        success: function(html){
          $("#time").html(html);
        }
      });
    }
  
    $(document).ready(function(){
      show();
      setInterval('show()',1000);
    });
  </script>
<script>
/*$(document).ready(function(){

$("tones").change(function(){
$.ajax({
type: "POST",
url: "test.php",
data: {tones : $("#tones").val(), data:$("#data").val()},

success: function(html){
$("#checkair").html(html);
}
});
return false;
});

});
*/

$(function() {
    setInterval(function() {
        $.ajax({
            type: "GET",
            url: "/api/plist3_api.php",
            success: function(html) {
                 // html is a string of all output of the server script.
                // $("#checkair").fadein(html);
                $("#plistapi").html(html);

       /*         $("#checkair").fadeOut(600, function ()
       {
          $("#checkair").html(html)
        });
   $("#checkair").fadeIn(600);
   */
           }

        });
    }, 5000);
});


$(function() {
    setInterval(function() {
        $.ajax({
            type: "GET",
            url: "/api/dashboard_api.php",
            success: function(html) {
                 // html is a string of all output of the server script.
                // $("#checkair").fadein(html);
                $("#dashapi").html(html);

       /*         $("#checkair").fadeOut(600, function ()
       {
          $("#checkair").html(html)
        });
   $("#checkair").fadeIn(600);
   */
           }

        });
    }, 5000);
});

$(function() {
    setInterval(function() {
        $.ajax({
            type: "GET",
            url: "check_air.php",
            success: function(html) {
                 // html is a string of all output of the server script.
                // $("#checkair").fadein(html);
                $("#checkair").html(html);

       /*         $("#checkair").fadeOut(600, function ()
       {
          $("#checkair").html(html)
        });
   $("#checkair").fadeIn(600);
   */
           }

        });
    }, 10000);
});

$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"action_search1.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>





