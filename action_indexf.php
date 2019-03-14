<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', 'trolimoli1218!', 'dbase');
mysqli_set_charset($connect,"utf8");
$input = filter_input_array(INPUT_POST);

//$first_name = mysqli_real_escape_string($connect, $input["fname"]);
$fname = mysqli_real_escape_string($connect, $input["fname"]);


if($input["action"] === 'edit')
{
 $query = "
 UPDATE media
 SET 
 fname = '".$fname."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);
 //mysqli_set_charset($connect,"utf8");

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM media 
 WHERE id = '".$input["id"]."'
 ";
  mysqli_query($connect, $query);
 // mysqli_set_charset($connect,"utf8");

  unlink("/home/playflu/media/files/".$name.".mp4"); 
}

echo json_encode($input);

?>