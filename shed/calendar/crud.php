<?php

require_once '../../auth/auth.php';
                        // HTML authentication
                        authHTML();
                        include '../../theme/header.php';
                        include '../../config.php';


$plsid = $_GET["id"];

$data = mysqli_query($link, "SELECT count(*) as total FROM pevents WHERE idpls = $plsid");
$info = mysqli_fetch_assoc($data);
$chkid = $info["total"];


if(isset($_GET["id"]) && !empty(trim($_GET["id"])) && ($chkid > 0)) {
//$connect = mysqli_connect("localhost", "root", "trolimoli1218!", "dbase");
$query = "SELECT * FROM pevents LEFT JOIN media ON pevents.idmedia=media.id WHERE idpls = $plsid ORDER BY pevents.event_order ASC";
$result = mysqli_query($link, $query);
?>
   <?php
}
else
{
//echo "No data yet.. Please add one from list below and refresh page.";
}
?>

  <div class="col-sm-6">

   <h1 align="center">Playlist #<?php echo $_GET["id"];?> Edit</h1>
   <!--<p>Total data: <?php echo $chkid;?></p>-->
        <p>You can sort the playlist by dragging the media links. The order of reproduction is strictly from top to bottom.</p>
     <script language="javascript">
  //var localTime = new Date();
  //document.write("Local machine time is: " + localTime + "<br>");
  document.write("Server time is: " + date);
  </script>
   <br />

   <ul class="list-unstyled" id="page_list">
   <?php 


$new_array[] = $row;
$new_array_order = $row;

   while($row = mysqli_fetch_array($result))
   {
   	$idevent = $row["eventid"];
   	$duration = $row['duration'];
    $duration_custom = $row['duration_custom'];
    $extinfdata = ($duration_custom != 0) ? $duration_custom : $duration;
    $duration_2 = gmdate("H:i:s", $extinfdata);
    echo '<li id="'.$row["eventid"].'">'.$row["fname"].'- ID: '. $idevent .'';
    echo '<a href="#" title="Remove Item" onclick="delitem('. $idevent .')"><span class="glyphicon glyphicon-remove"></span>
        </a>';
    echo '<h6><span class="label label-primary">'.$extinfdata.'</span> or <span class="label label-success">'.$duration_2.' seconds</span></h6></li>';
    
    $new_array[$row['name']] = $row;
    $new_array[$row['stored']] = $row;
    $new_array[$extinfdata] = $row;
    $new_array[$row['duration']] = $row;
    $new_array[$row['duration_custom']] = $row;
    $new_array_order[$row['event_order']] = $row;

   }
   
  
   ?>
   </ul>
   <input type="hidden" name="page_order_list" id="page_order_list" />
  </div>

   <div class="col-sm-6">

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

  <br>
  <br>
  <div id="plslist">
  <div class="well well-lg">

    Playlist's Generator:<br><code>
  
  <?php
$filename = $_SERVER['DOCUMENT_ROOT']."/playlists/playlist_".$plsid.".txt";

if (file_exists($filename)) {
    echo "<b>The file $filename exists<br></b>";
} else {
    echo "<b>The file $filename does not exist, please check it<br></b>";
}
  //echo $_GET["id"];


  array_multisort($new_array, $new_array_order);

$myfile = "/playlists/playlist_".$plsid.".txt";

if (!file_exists($myfile)) {
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . $myfile,"w+"); 

//echo "#EXT-X-PROGRAM-DATE-TIME: 2018-03-12T12:58:08Z<br>";
/*$startstring = "#EXT-X-PROGRAM-DATE-TIME: 2018-03-12T12:58:08Z\n";
fwrite($myfile, $startstring);*/
foreach ($new_array_order as $array) {


  $setextinf = ($array['duration_custom'] != 0) ? $array['duration_custom'] : $array['duration'];

//  echo "Stored value: ".$array['stored'];

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

    fwrite($fp, $test);

}
}
   ?>
     
  
<?
//echo "Success write to file!" . $result2;
fclose($fp);


   
?>

<!--<form action=# method=post>
    <button type='submit' class='btn btn-primary' name='action' value='compile'>Compile playlist..</button>
</form>
<br>
<form action=/api/plist3_api.php method=post>
    <button type='submit' class='btn btn-primary' name='action' value='save'>..and restart stream too!</button>
</form>
-->
</div>
</div>
</code>
</div>

<!--///////////////-->

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
<?php
/*}
else
{
  echo "ID not detected..";
}*/
?>
<script>
$(document).ready(function(){

 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
   /*over: function () {
            removeIntent = false;
},
 out: function () {
            removeIntent = true;
},
beforeStop: function (event, ui) {
            if(removeIntent === true) {
                ui.item.hide();
                if (confirm('Are you sure want to remove this item?')) {
                    ui.item.remove();
                    var delid = $(this).ui.item.attr("id");
                         $.ajax({
  method: "POST",
  url: "delitem.php",
  data: {delid:delid}
})
  .done(function( msg ) {
    $.notify("Item deleted");
  });
                } else {
                    ui.item.show();
                }
            }
},*/
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
      $.notify(data);
      reload_div();
     }
   });
  }
 });

});
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
    var plsid = <?php echo $plsid;?>;
    	$.ajax({
			url:"mng.php",
			method:"post",
			data:{plsid:plsid,query:query},
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
<script>
	function delitem(id)
	{
    if (confirm('Are you sure want to remove this item?')) {
    	$.ajax({
			url:"delitem.php",
			method:"post",
			data:{id:id},
			success:function(data)
			{

				   $.notify(data);
                   reload_div();
			}
		});
    }
	}

       $("#compile").click(function(){
          //var send = $("#form-compile").serializeArray()
        var plsid = <?php echo $plsid;?>;
        var playlist = document.getElementById('well well-lg').innerHTML;     
        //var playlist = new array {lol:"1",fu:"2",ept:"3"}; 
             //var s = $('playlist_data').serializeArray();
         //playlist.toString(); 
         //document.getElementById("playlist_data").innerHTML = playlist;
           $.ajax ({
         url:"compile.php",
         method:"POST",
         data: {plsid:plsid,playlist:playlist},
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
     





</script>
