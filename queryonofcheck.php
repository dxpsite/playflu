<?php
require_once 'config.php';

if (isset($_POST['quickVar1a']))
{
    $quickVar1a = $_POST['quickVar1a'];
   // $id = $_POST['id'];
    $sql = "UPDATE media SET onair = '" . $quickVar1a . "' WHERE onair != '".$quickVar1a."'"; 
}
$result = mysqli_query($link, $sql)or die(mysql_error());
echo 'Updating To: '.$quickVar1a.''; 
?>