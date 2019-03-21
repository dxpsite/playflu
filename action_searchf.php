<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
    .btn.active {                
	display: none;		
}

.btn span:nth-of-type(1)  {            	
	display: none;
}
.btn span:last-child  {            	
	display: block;		
}

.btn.active  span:nth-of-type(1)  {            	
	display: block;		
}
.btn.active span:last-child  {            	
	display: none;			
}
    </style>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php
//include 'theme/header.php';
require_once 'config.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($link, $_POST["query"]);
	$query = "
	SELECT * FROM media
	WHERE fname LIKE '%".$search."%' ORDER BY id DESC
	";
}
else
{
	$query = "SELECT * FROM media ORDER BY id DESC";
}
$result = mysqli_query($link, $query);
mysqli_set_charset($link,"utf8");
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="editable_table" class="table table-bordered table-striped">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Duration</th>
							<th>On Air</th>
							<th>VOD</th>
							<th>Size</th>
							<th>Encoded</th>
							<th>Local/S3</th>
							<th>Preview</th>
							<th>Delete</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
$extinfdata = ($row['duration_custom'] != 0) ? $row['duration_custom'] : $row['duration'];
		$duration = gmdate("H:i:s", $extinfdata);
     	$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["fname"];

//$filename = '/home/playflu/media/files/'.$row["name"].'';

if (file_exists($filename)) {
    $output .=' ';
} else {
//    $output .=' (отсутствует в локальной папке, возможно удален)';
}


$extinfdata = ($duration_custom != 0) ? $duration_custom : $duration;

	    $output .='</td>
				<td>'.$duration.'</td>
				<td><div data-toggle="buttons">';

         if($row['onair'] !='0')
		{
			//$output .= '<input type="checkbox" name="toggle" id="toggle_'.$row["id"].'" value="'.$row["id"].'" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="default">';

			$output .= '<label class="btn btn-success">
                <input type="radio" name="toggle" value="'.$row["id"].'" id="false">
                <i class="fa fa-play"></i> On air
            </label>  
            <label class="btn btn-default active">
                <input type="radio" name="toggle" value="'.$row["id"].'" id="true">
                <i class="fa fa-pause"></i> Offline
            </label>        
        ';
			
		}


		 if($row['onair'] !='1')
		{
			
			 //$output .= '<input type="checkbox" name="toggle" id="toggle_'.$row["id"].'" value="'.$row["id"].'" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="warning" checked>';
			 $output .= '<label class="btn btn-default">
                <input type="radio" name="toggle" value="'.$row["id"].'" id="true">
                <i class="fa fa-pause"></i> Offline
            </label>  
            <label class="btn btn-success active">
                <input type="radio" name="toggle" value="'.$row["id"].'" id="false">
                <i class="fa fa-play"></i> On air
            </label>  
           ';
			
		}		

		$output .= '
			</div></td>';

			if ($row["vod"] == '1')
            {
			$output .= '<td><i class="fas fas fa-check fa-lg"></i></td>';
			}
			else
			{
			$output .= '<td>none</td>';
			}
			$output .= '<td>'.humanFileSize($row['size']).'</td>';

        


                                            if ($row['encoded'] != '1')
                                             {
                                            $output .= '<td><i class="fas fa-cog fa-spin fa-lg"></i></td>';
                                             }
                                             else 
                                             {
                                            $output .= '<td><i class="fas fas fa-check fa-lg"></i></td>';
                                                   }
                                             if (($row['stored'] == '0') && ($row['encoded'] == '1'))
                                             {
                                            $output .= '<td><a href="addfile-'.$row["id"].'" title="Put in Storage" data-toggle="tooltip"><span class="glyphicon glyphicon-cloud-upload"></span></a>&nbsp;Loc</td>';
                                             }
                                             elseif (($row['stored'] == '1') && ($row['encoded'] == '1'))
                                             {
                                            $output .= '<td>Loc & S3 <a href="delfile-'.$row["id"].'" title="Delete from Storage" data-toggle="tooltip"><span class="glyphicon glyphicon-cloud-download"></span></a></td>';
                                                   }
                                                   else
                                                   {

                                                    $output .= '<td>Encoder is working.<br>Store to cloud is possible after encoding..</td>';
                                                   }
                                                   
                                            $output .= '<td>';

                                                $output .= '<a href="item-'.$row["id"].'" title="View Record data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open"></span></a>';
                                            
                                                //$output .= '<a href="erase-'.$row["id"].'" title="Delete Record" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>';

                                            $output .= '</td>';
	    //$output .= '<td>'.$row["encoded"].'</td>
		//		<td>'.$row["stored"].'</td>
		//		<td>some action</td>';
			$output .='</tr>';
	}
	echo $output;
}


?>
     <script>
      $('input[name=toggle]').change(function(){
        var mode=$(this).prop('id');
        var id=$(this).val();
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

<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'action_indexd.php',
      //eventType: 'dblclick',
    editButton: false,
     columns:{
       identifier:[0, "id"],
       editable:[[1, "fname"]]
      },
     onDraw: function() {
        console.log('onDraw()');
    },
    onSuccess: function(data, textStatus, jqXHR) {
        console.log('onSuccess(data, textStatus, jqXHR)');
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
        location.reload();
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    onAlways: function() {
        console.log('onAlways()');
    },
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        console.log(serialize);
    }
     });
 
});  
 </script>
