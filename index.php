<?php
                        require_once 'auth/auth.php';
                        authHTML();
                        include 'theme/header.php';

?>

     <script type="text/javascript">

            $(document).ready(function(){

                $('[data-toggle="tooltip"]').tooltip();   

            });

        </script>
 <script src="js/jquery.tabledit.min.js"></script>

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
<div id="plistapi" style="overflow: auto;max-height: 70vh;">Be patient..<i class="fas fa-cog fa-spin fa-lg"></i></div>
</div>
<div class="col-lg-6">
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
      src: 'https://peerhub.ru/playlist1/index.m3u8?token=O8uYcNBFo0',
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
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>    
	</body>
</html>

<script>
    function show()
    {
      $.ajax({
        url: "/time.php",
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
$(document).ready(function(){
  //$("button").click(function(){
    $("#plistapi").load("/api/plist3_api.php");
  //});
});
$(function() {
    setInterval(function() {
        $.ajax({
            type: "GET",
            url: "/api/plist3_api.php",
            success: function(html) {
                $("#plistapi").html(html);

/*                 $.ajax({
      url: '/api/plist3_api.php?action=save',
      type: 'GET',
      success: function(response) {
        alert('Saved!')
      }

    })*/
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
            url: "/check_air.php",
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
			url:"/action_searchf.php",
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






