  <link rel="stylesheet" href="slider/css/ion.rangeSlider.css" />
  <link rel="stylesheet" href="slider/css/normalize.css" />
  <link rel="stylesheet" href="slider/css/ion.rangeSlider.skinHTML5.css" />
  <script src="js/bootstrap-notify.js"></script>
  <script src="js/playerjs-9.35.js" type="text/javascript"></script>



    <?php

                        require_once 'auth/auth.php';
                        // HTML authentication
                        authHTML();
                        include 'theme/header.php';


    // Check existence of id parameter before processing further

    if(isset($_GET['id'])){


        // Include config file

        require_once 'config.php';

       $id = $_GET['id']*1; 


        $sql = "SELECT * FROM media WHERE id = $id";


if($result = mysqli_query($link, $sql)){

    if(mysqli_num_rows($result) > 0){


        while($row = mysqli_fetch_array($result)){



$duration = $row['duration'];
$duration_custom = $row['duration_custom'];
$source = $row['name'];
$fname = $row['fname'];
$sourcevtt = substr($row['name'],0,-4);
$fsize = humanFileSize($row['size']);
$num = $row['id'];
$stored = $row['stored'];
$sourcesubs = $row['captions'];


        }

        echo "</table>";


        mysqli_free_result($result);

    } else{





        echo "No records matching your query were found.";

    }

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

 

// Close connection

mysqli_close($link);

    } else{

        // URL doesn't contain id parameter. Redirect to error page

      //  header("location: error.php");

        exit();

    }

    ?>



        <title>View Record</title>


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
                <li><a href="https://subty.ru/shed/">Sheduler</a></li>
                <li><a href="https://subty.ru/settings/">Settings</a></li>
                <li><a href="https://subty.ru/logout.php">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


        <div class="wrapper_">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                     <div class="page-header clearfix">

                            <h2 class="pull-left">View Media</h2>

                            <a href="index.php" class="btn btn-primary pull-right">Back</a>

                        </div>


                        <div class="form-group">

                     <!--   <label>Thumbnail</label>

                        <p class="form-control-static">
       <img src="/media/files/thumbnail/<?php echo $num; ?>orig.jpg" width="570">                     
       <br> <br> <br>-->
       <label>Preview</label>
<div id="player"></div>
  <?php
  if ($stored == '1')
{
  ?>
  <script>
 	var sourcemedia = '<?php echo $source; ?>';
 	var sourcesubs = '<?php echo $sourcesubs; ?>';
    var player = new Playerjs({controls:"false", id:"player", file:"https://peerhub.ru/privat/"+sourcemedia+"/index.m3u8", "subtitle":"[Ru]//../media/captions/"+sourcesubs+"","default_subtitle":"Ru"});
</script>	
 <!--<source src="https://peerhub.ru/privat/<?php echo $source; ?>/index.m3u8" type="application/x-mpegURL">-->
 <?php
}
 else
{
 ?>
 <!--<source src="https://peerhub.ru/locale/<?php echo $source; ?>/index.m3u8" type="application/x-mpegURL">-->
 <script>
 	var sourcemedia = '<?php echo $source; ?>';
 	var sourcesubs = '<?php echo $sourcesubs; ?>';
    var player = new Playerjs({controls:"false", id:"player", file:"https://peerhub.ru/locale/"+sourcemedia+"/index.m3u8", "subtitle":"[Ru]../media/captions/"+sourcesubs+"","default_subtitle":"Ru"});
</script>	
 <?php
}
  ?>
 <!-- <track kind="captions" src="subtitles/<?php echo $sourcevtt; ?>.vtt" srclang="en" label="Russian" default>
</video>-->
<script>
    $(function () {
     
var durat = <?php echo $duration;?>;
var durat_custom = <?php echo $duration_custom;?>;
var num = <?php echo $num;?>;
var selector_dur;
if (durat_custom != 0 )
{
  selector_dur = durat_custom 
}
else
{
  selector_dur = durat
}
//var from = data.from;
$("#range").ionRangeSlider({
    type: "single",
    min: 0,
    max: durat,
    from: selector_dur,
    keyboard: true,
    onStart: function (data) {
        console.log("onStart");
    },
    onChange: function (data) {
        console.log("onChange");
    },
    onFinish: function (data) {
         $.ajax({
    url:"updatedur.php",
    method:"POST",
    data:{from:data.from, num:num},
    success:function(data)
    {
     //alert(data);

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
        console.log(data.from);
    },
    onUpdate: function (data) {
        
        console.log("onUpdate");
    }
});

    });


  
</script>

                        </p>

                        </div> 

                         <label>Name</label>

                        <p><?php  echo "".$fname."";  ?></p>

                          <label>Original duration</label>

                        <p class="form-control-static"><?php  echo "".$duration." seconds";  ?> </p>

                         <label>Custom duration: drag slider on any position (will be automatically save)</label>
                        <div style="position: relative; padding: 10px;">
                          <div>
                          <input type="text" id="range" value="" name="range" />
                          </div>
                        </div>

                        <div class="form-group">

                            <label>File name</label>

                            <p class="form-control-static"><?php echo $source; ?></p>

                        </div>

                        <div class="form-group">

                            <label>Size</label>

                            <p class="form-control-static"><?php echo $fsize; ?></p>

                        </div>

                       

                    </div>

                </div>        

            </div>

        </div>


    <?php

     include 'theme/footer.php';
      ?>
