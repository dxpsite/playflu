<?php

                        require_once 'auth/auth.php';
                        // HTML authentication
                        authHTML();
                        include 'theme/header.php';
                        
                        // Include config file

                        require_once 'config.php';
?>                        

        <title>Dashboard</title>

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

                            <h2 class="pull-left">Dashboard</h2>

                           

                        </div>

                        <?php

                    

                        // Attempt select query execution

                        $sql = "SELECT * FROM media ORDER BY id DESC";

                        if($result = mysqli_query($link, $sql)){

                            if(mysqli_num_rows($result) > 0){
                               
                           
                                echo "<table class='table table-bordered table-striped'>";

                                    echo "<thead>";

                                        echo "<tr>";

                                            echo "<th>#</th>";

                                            echo "<th>Name</th>";

                                            echo "<th>Duration</th>";

                                            echo "<th>On Air</th>";

                                            echo "<th>VOD</th>";

                                            echo "<th>Size</th>";

                                            echo "<th>Encoded</th>";

                                            echo "<th>S3 Storaged</th>";

                                            echo "<th>Action</th>";

                                        echo "</tr>";

                                    echo "</thead>";

                                    echo "<tbody>";

                                    while($row = mysqli_fetch_array($result)){
                                    	     $id = $row['id'];
                                    	     $onair = $row['onair'];
                                           $duration = gmdate("H:i:s", $row['duration']);

                            	?>

                                     <!--  <script>
                                           $('#setQuickVar1').on('click', function() {
                                             var checkStatus = this.checked ? 'ON' : 'OFF';
                                             var id = "<?php echo $id; ?>";
                                             $.post("queryonofcheck.php", {"quickVar1a": checkStatus, "id": id}, 
                                            function(data) {
                                            $('#resultQuickVar1').html(data);
                                               });
                                              });
                                         </script>-->

      <script>
      $('input[name=toggle]').change(function(){
        var mode= $(this).prop('checked');
		var id=$( this ).val();
        $.ajax({
          type:'POST',
          dataType:'JSON',
          url:'do_switch.php',
          data:{mode:mode,id:id},
          success:function(data)
          {
            var data=eval(data);
            message=data.message;
            success=data.success;
            $("#heading").html(success);
            $("#body").html(message);
          }
        });
      });
    </script>
                            	<?php
                                        echo "<tr>";

                                            echo "<td>" . $row['id'] . "</td>";

                                            echo "<td>" . $row['name'] . "</td>";

                                            echo "<td>" . $duration . "</td>";

                                            echo "<td>";

                                            if($row['onair']=='0')
		{
			?>
			 <input type="checkbox" name="toggle" id="toggle_<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="default">
			<?php
		}


		 if($row['onair']=='1')
		{
			?>
			 <input type="checkbox" name="toggle" id="toggle_<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="warning" checked>
			<?php
		}

		echo "</td>";

                                         //   echo "<td>" . $row['onair'] . "<br><input data-toggle=\"toggle\" type=\"checkbox\"><span id=\"setQuickVar1\">On Air?<input id=\"QuickVar1\" type=\"checkbox\" class=\"make-switch\" data-size=\"big\" data-on-color=\"success\" data-on-text=\"ON\" data-off-color=\"default\" data-off-text=\"OFF\"></span><div id=\"resultQuickVar1\"></div></td>";

                                            echo "<td>" . $row['vod'] . "</td>";

                                            echo "<td>" . humanFileSize($row['size']) . "</td>";

                                             if ($row['encoded'] != '1')
                                             {
                                            echo "<td><i class=\"fas fa-cog fa-spin fa-lg\"></i></td>";
                                             }
                                             else 
                                             {
                                            echo "<td><i class=\"fas fas fa-check fa-lg\"></i></td>";
                                                   }
                                             if (($row['stored'] == '0') && ($row['encoded'] == '1'))
                                             {
                                            echo "<td><a href='addfile-". $row['id'] ."' title='Put in Storage' data-toggle='tooltip'><span class='glyphicon glyphicon-cloud-upload'></span></a>&nbsp;(Local file)</td>";
                                             }
                                             elseif (($row['stored'] == '1') && ($row['encoded'] == '1'))
                                             {
                                            echo "<td><i class=\"fas fas fa-check fa-lg\"></i></td>";
                                                   }
                                                   else
                                                   {

                                                    echo "<td>Store to cloud is possible after encoding..</td>";
                                                   }
                                                   
                                            echo "<td>";

                                                echo "<a href='item-". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            
                                                echo "<a href='erase-". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";

                                            echo "</td>";

                                        echo "</tr>";

                                    }

                                    echo "</tbody>";                            

                                echo "</table>";

                                // Free result set

                                mysqli_free_result($result);

                            } else{

                                echo "<p class='lead'><em>No records were found.</em></p>";

                            }

                        } else{

                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

                        }

     

                        // Close connection

                        mysqli_close($link);

                        ?>

                    </div>

                </div>        

            </div>

        </div>


    <?php

     include 'theme/footer.php';
      ?>