<link rel="stylesheet" href="vod/dplayer/demo/DPlayer.min.css">
<div id="dplayer"></div>
<script src="js/hls.min.js"></script>
<script src="vod/dplayer/demo/DPlayer.js"></script>

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
$source = $row['name'];
$sourcevtt = substr($row['name'],0,-4);
$fsize = humanFileSize($row['size']);
$num = $row['id'];
$stored = $row['stored'];


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


<div id="dplayer"></div>

<hr>

<video id=example-video  class="video-js vjs-default-skin"  
  controls preload="auto" style="position: relative !important;
    width: 100% !important;
    height: auto !important;"  
  data-setup='{"example_option":true}'>
  <?php
  if ($stored == '1')
{
  ?>
 <source src="https://peerhub.ru/privat/<?php echo $source; ?>/index.m3u8" type="application/x-mpegURL">
 <?php
}
 else
{
 ?>
 <source src="https://peerhub.ru/locale/<?php echo $source; ?>/index.m3u8" type="application/x-mpegURL">
 <?php
}
  ?>
  <track kind="captions" src="subtitles/<?php echo $sourcevtt; ?>.vtt" srclang="en" label="Russian" default>
</video>
<script>
var player = videojs('example-video');
player.play();
</script>
<script>
    const dp = new DPlayer({
    container: document.getElementById('dplayer'),
    video: {
        url: 'https://peerhub.ru/locale/<?php echo $source; ?>/index.m3u8',
        type: 'customHls',
        customType: {
            'customHls': function (video, player) {
                const hls = new Hls();
                hls.loadSource(video.src);
                hls.attachMedia(video);
            }
        }
    }
});
</script>

                        </p>

                        </div> 

                          <label>Duration</label>

                        <p class="form-control-static"><?php  echo "".$duration." seconds";  ?> </p>

                        <div class="form-group">

                            <label>Name</label>

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
