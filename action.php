<?php
require_once 'config.php';  
//action.php

$input = filter_input_array(INPUT_POST);

$var = mysqli_real_escape_string($link, $input["var"]);
$val = mysqli_real_escape_string($link, $input["val"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE tbl_user 
 SET 
 val = '".$val."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($link, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tbl_user 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($link, $query);
}

echo json_encode($input);

?>