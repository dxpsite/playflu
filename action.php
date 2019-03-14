<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', 'trolimoli1218!', 'dbase');

$input = filter_input_array(INPUT_POST);

$var = mysqli_real_escape_string($connect, $input["var"]);
$val = mysqli_real_escape_string($connect, $input["val"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE tbl_user 
 SET 
 val = '".$val."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tbl_user 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>