<?php
//fetch.php;
$connect = mysqli_connect("localhost", "root", "trolimoli1218!", "dbase");
$query = "SELECT * FROM comments WHERE comment_status = 0 ORDER BY comment_id DESC";
$result = mysqli_query($connect, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <div class="alert alert_default">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>'.$row["comment_subject"].'</strong>
   <small><em>'.$row["comment_text"].'</em></small>
  </p>
 </div>
 ';
}
$update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status = 0";
mysqli_query($connect, $update_query);
echo $output;

?>
