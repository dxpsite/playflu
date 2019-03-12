<?php
//include 'theme/header.php';
require_once 'config.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($link, $_POST["query"]);
	$query = "
	SELECT * FROM media 
	WHERE name LIKE '%".$search."%' ORDER BY id DESC
	";
}
else
{
	$query = "SELECT * FROM media ORDER BY id DESC";
}
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table class="table table-bordered table-striped">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Duration</th>
							<th>On Air</th>
							<th>VOD</th>
							<th>Size</th>
							<th>Encoded</th>
							<th>S3 Storaged</th>
							<th>Action</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['id'];
        $onair = $row['onair'];
		$duration = gmdate("H:i:s", $row['duration']);
     	$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$duration.'</td>
				<td>';

         if($row['onair']=='0')
		{
			$output .= '<input type="checkbox" name="toggle" id="toggle_'.$row["id"].'" value="'.$row["id"].'" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="default">';
			
		}


		 if($row['onair']=='1')
		{
			
			 $output .= '<input type="checkbox" name="toggle" id="toggle_'.$row["id"].'" value="'.$row["id"].'" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="warning" checked>';
			
		}		

		$output .= '
			</td>
				<td>'.$row["vod"].'</td>
				<td>'.humanFileSize($row['size']).'</td>';

        

	    $output .= '<td>'.$row["encoded"].'</td>
				<td>'.$row["stored"].'</td>
				<td>some action</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	

$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table class="table table-bordered table-striped">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Duration</th>
							<th>On Air</th>
							<th>VOD</th>
							<th>Size</th>
							<th>Encoded</th>
							<th>S3 Storaged</th>
							<th>Action</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['id'];
        $onair = $row['onair'];
		$duration = gmdate("H:i:s", $row['duration']);

		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$duration.'</td>
				<td>';

         if($row['onair'] == '0')
		{
			$output .= '<input type="checkbox" name="toggle" id="toggle_"'.$row['id'].'" value="'.$row['id'].'" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="default">';
			
		}


		 if($row['onair'] == '1')
		{
			
			 $output .= '<input type="checkbox" name="toggle" id="toggle_"'.$row['id'].'" value="'.$row['id'].'" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="warning" checked>';
			
		}		

		$output .= '
			</td>
				<td>'.$row["vod"].'</td>
				<td>'.humanFileSize($row['size']).'</td>';

        

	    $output .= '<td>'.$row["encoded"].'</td>
				<td>'.$row["stored"].'</td>
				<td>some action</td>
			</tr>
		';
	}
	echo $output;
}

	//echo 'Data Not Found';
}
?>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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