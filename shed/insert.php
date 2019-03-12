<?php
//insert.php
if(isset($_POST["subject"]))
{
 $connect = mysqli_connect("localhost", "root", "*************", "dbase");
 $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
 $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
 $query = "
  INSERT INTO comments(comment_subject, comment_text)
 VALUES ('$subject', '$comment')
 ";
 mysqli_query($connect, $query);
}
?>