<?php

                        require_once '../auth/auth.php';
                        // HTML authentication
                        authHTML();
                        include '../theme/header.php';
                        
                        // Include config file

                        require_once '../config.php';



$query = "SELECT * FROM media WHERE onair=1 ORDER BY media_order ASC";
$result = mysqli_query($link, $query);
?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
    <script src="serverDate.js"></script>
      <script src="bootstrap-notify.js"></script>
 
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
                <li><a href="https://subty.ru">Home</a></li>
                <li><a href="https://subty.ru/addmedia/">Upload</a></li> 
                <li class="active"><a href="https://subty.ru/shed/">Sheduler</a></li>
                <li><a href="https://subty.ru/settings/">Settings</a></li>
                <li><a href="https://subty.ru/logout.php">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

  <div class="container-fluid">
  <div class="row">
  <div class="col-sm-8">
  <div class="well well-lg">

  <!--<video id="my_video_1" class="video-js vjs-default-skin" controls preload="auto" width="720" height="576"
  data-setup='{}'>
  </video>

  <script>
    const player = videojs('my_video_1');
    player.src({
      src: 'https://peerhub.ru/playlist1/index.m3u8',
      type: 'application/x-mpegURL'
    });
  </script>-->

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
    
   <h1 align="center">Create Daily Playlist</h1>
   <p>You can sort the playlist by dragging the media links. The order of reproduction is strictly from top to bottom.</p>
     <script language="javascript">
  var localTime = new Date();
  document.write("Local machine time is: " + localTime + "<br>");
  document.write("Server time is: " + date);
  </script>
  
      <ul class="list-unstyled" id="page_list">
   <?php 


$new_array[] = $row;
$new_array_order = $row;
//$stored=$row['stored'];

   while($row = mysqli_fetch_array($result))
   {

$duration = $row['duration'];
$duration_custom = $row['duration_custom'];
//$extinfdata = 0;
//$stored = $row['stored'];
//$duration_2 = substr($duration_1, 0, -8);

/*
if ($duration_custom != 0)
{
$extinfdata = $duration_custom;
}
else
{
$extinfdata = $duration;
}
*/

$extinfdata = ($duration_custom != 0) ? $duration_custom : $duration;

$duration_2 = gmdate("H:i:s", $extinfdata);


echo '<li id="'.$row["id"].'">'.$row["fname"].'<br>  <h6><span class="label label-primary">'.$extinfdata.'</span> or <span class="label label-success">'.$duration_2.' seconds</span></h6></li>';

    $new_array[$row['name']] = $row;
    $new_array[$row['stored']] = $row;
    $new_array[$extinfdata] = $row;
    $new_array[$row['duration']] = $row;
    $new_array[$row['duration_custom']] = $row;
    $new_array_order[$row['media_order']] = $row;

//$timemedia[] = $duration_2;

  //$totalexp = "#EXTINF: ".$duration_2."<br>private/".$row["name"]."\n";
  //$totalexp = "tests";
   }

   //var_dump($new_array_order);


//function myCmp($a, $b) {
    //if ($a['media_order'] === $b['media_order']) return 0;
    //return $a['media_order'] < $b['media_order'] ? 1 : -1;
//}
 
//uasort($new_array, 'myCmp');
   ?>
   </ul>
   <input type="hidden" name="page_order_list" id="page_order_list" />



  <!--<button class="btn btn-primary">Compile daily playlist</button>-->
<!--
 <form method="post" id="comment_form">
    <div class="form-group">
     <label>Enter Subject</label>
     <input type="text" name="subject" id="subject" class="form-control" />
    </div>
    <div class="form-group">
     <label>Enter Comment</label>
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
    </div>
   </form> -->


  </div>
  </div>
  <div class="col-sm-4">

 <!--<form method="post" id="form">
    <div class="form-group">
     <label>Choose startup time: </label>
     <input class="timepicker" name="time" id="time" />
    </div>
    <div class="form-group">
     <input name="post" id="send" class="btn btn-info" value="Set time" />
    </div>
   </form>-->


  <!--Export example:<br><code><br>#EXT-X-MEDIA-SEQUENCE:20<br>#EXT-X-PROGRAM-DATE-TIME:2013-02-12T12:58:08Z<Br>-->
  <div class="well well-lg"><br />
   <!--Set start time:  <input class="timepicker" name="time" id="time" /><span class="help-line"></span>-->

    Export example:<br><code><br><br>
  
  <?php
    

array_multisort($new_array, $new_array_order);

$myfile = fopen("playlist.txt", "w+") or die("Unable to open file!");

echo "#EXT-X-PROGRAM-DATE-TIME: 2018-03-12T12:58:08Z<br>";
/*$startstring = "#EXT-X-PROGRAM-DATE-TIME: 2018-03-12T12:58:08Z\n";
fwrite($myfile, $startstring);*/
foreach ($new_array_order as $array) {


  $setextinf = ($array['duration_custom'] != 0) ? $array['duration_custom'] : $array['duration'];

//	echo "Stored value: ".$array['stored'];

  if ($array['stored'] == 1)
{

    echo "#EXTINF:".$setextinf."<br>privat/".$array['name']." <br>";
    $test = "#EXTINF:".$setextinf."\nprivat/".$array['name']."\n";

}
 else
{

  echo "#EXTINF:".$setextinf."<br>locale/".$array['name']." <br>";
    $test = "#EXTINF:".$setextinf."\nlocale/".$array['name']."\n";

}

  //  echo    "#EXTINF:".$array['duration']."<br>private/".$array['name']." <br>";
  //  $test = "#EXTINF:".$array['duration']."\nprivate/".$array['name']."\n";

    fwrite($myfile, $test);

}
   ?>
     
  
<?
//echo "Success write to file!" . $result2;
fclose($myfile);


?>

 <!--<form method="post" id="form-compile">
         <div class="form-group">
     <input name="post" id="compile" class="btn btn-info" value="Compile playlist now" />
    </div>
   </form>-->
<form action=/shed/index.php method=post>
    <button type='submit' class='btn btn-primary' name='action' value='compile'>Compile playlist..</button>
</form>
<br>
<form action=/api/plist3_api.php method=post>
    <button type='submit' class='btn btn-primary' name='action' value='save'>..and restart stream too!</button>
</form>
<?
$action = (string)$_GET['action'];

if (!$action) {
        $action = (string)$_POST['action'];
if (!$action) {
  $action = 'all';
  }
}

if ($action == "compile") {

header("refresh:0;url=https://subty.ru/shed");
}
?>

</div>
  </div>
</div>
</div>
 </body>
</html>

<script>

  //    var send = {};
   //   send['a'] = $('time').text();
   //   send['b'] = $("#two").text();
  
    
        $("#compile").click(function(){
          //var send = $("#form-compile").serializeArray()
        playlist = document.getElementById('playlist_data').innerHTML;     
        //var playlist = new array {lol:"1",fu:"2",ept:"3"}; 
             //var s = $('playlist_data').serializeArray();
         //playlist.toString(); 
         //document.getElementById("playlist_data").innerHTML = playlist;
           $.ajax ({
         url:"compile.php",
         method:"POST",
         data: playlist,
         //some: "content=document.getElementById('playlist_data').innerHTML",
         success: function(data){
             alert(data);
        //   $.notify("File updated " + content);
           //$("span.compiled-data").text(data);
         },
         /*complete: function(){
             alert("Complete!");
         },*/
         error: function(data){
          $.notify("Wrong data");
           alert(data);
         } 
       //  beforeSend: function(){
       //   alert("Before");
      //   }
        });

        });
     


$(document).ready(function(){
  //    var send = {};
   //   send['a'] = $('time').text();
   //   send['b'] = $("#two").text();
    
        $("#send").click(function(){
          var send = $("#form").serializeArray()
        
           $.ajax ({
         url:"getdate.php",
         type:"GET",
         data: send,
         success: function(data){
           //  alert("Success!");

           $.notify("You choose "+ data);
           $("span.container-data").text(data);
         },
       //  complete: function(){
       //      alert("Complete!");
       //  },
         error: function(){
          $.notify("Wrong data");
         } 
       //  beforeSend: function(){
       //   alert("Before");
      //   }
        });

        });
     


  });

$(document).ready(function(){
    $('input.timepicker').timepicker({
       
        change: function(time) {
            // the input field
            var element = $(this), text;
            // get access to this Timepicker instance
            var timepicker = element.timepicker();
            texttime = 'Selected time is: ' + timepicker.format(time);
            //texttimer = timepicker.format(time);
            element.siblings('span.help-line').text(texttime);
            name = "<? echo $texttime; ?>"
            //element.siblings('span.texttimer').text(texttime);
        }
    });
});


/*$(function(){
  $(".btn").on("click",function(){
    $.notify({
     // title: '<strong>Success!</strong>',
      title: '<strong>Oupps!</strong>',
      icon: 'glyphicon glyphicon-warning-sign',
     // message: "Playlist file compiled and flussonic was reloaded."
      message: "Something is wrong."
    },{
      type: 'danger',
      animate: {
        enter: 'animated fadeInUp',
        exit: 'animated fadeOutRight'
      },
      placement: {
        from: "bottom",
        align: "right"
      },
      offset: 20,
      spacing: 10,
      z_index: 1031,
    });
  });
});*/

$(document).ready(function(){
 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#page_list li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
     //alert(data);
 /*  $.notify({
      title: '<strong>Done!</strong>',
      icon: 'glyphicon glyphicon-handup',
      message: "Page Order has been updated!"
    },{
      type: 'success',
      animate: {
        enter: 'animated fadeInUp',
        exit: 'animated fadeOutUp'
      },
      placement: {
        from: "top",
        align: "right"
      },
      offset: 20,
      spacing: 10,
      z_index: 1031,
    });*/

    $.notify({
      title: '<strong>Done!</strong>',
      icon: 'glyphicon glyphicon-sort',
      message: data
    },{
      type: 'warning',
      animate: {
        enter: 'animated fadeInUp',
        exit: 'animated fadeOutRight'
      },
      placement: {
        from: "bottom",
        align: "right"
      },
      offset: 20,
      spacing: 10,
      z_index: 1031,
    });

    }
   });
  }
 });


 /*setInterval(function(){
  load_last_notification();
 }, 5000);

 function load_last_notification()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('.content').html(data);
   }
  })
 }*/

 $('#comment_ form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
  // var form_data = $(this).serialize();
  //var form_data = 'bla bla bla bla';
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
    }
   })
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
});



</script>
<?
//include '../templates/footer.php';