<?php
 $dbh=mysqli_connect("localhost","root","");
 mysqli_select_db($dbh,'registration');
 $sql="delete from uploads where id='$_GET[id]'";
 if(mysqli_query($dbh,$sql))
 header("refresh:1;url=upload.php");
 else
 echo "not deleted"
?>
