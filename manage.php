<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nrb";
$db = new mysqli($servername, $username, $password, $dbname);

$act = $_POST['action'];

if($act=="add"){
  $title = $_POST['title'];
  $vid = $_POST['vid']; 
  mysqli_query($db, "INSERT INTO `songs` (`no`, `title`, `vid`) VALUES (NULL, '$title', '$vid');");
  mysqli_query($db, "ALTER TABLE `songs` AUTO_INCREMENT=1;");
  mysqli_query($db, "SET @COUNT = 0;");
  mysqli_query($db, "UPDATE `songs` SET no = @COUNT:=@COUNT+1;");
}
else if($act=="remove"){
  $vid = $_POST['vid']; 
  mysqli_query($db, "DELETE FROM songs WHERE `songs`.`no` = 1;");
  mysqli_query($db, "ALTER TABLE `songs` AUTO_INCREMENT=1;");
  mysqli_query($db, "SET @COUNT = 0;");
  mysqli_query($db, "UPDATE `songs` SET no = @COUNT:=@COUNT+1;");
}
else if($act=="cancle"){
  $no = $_POST['no']; 
  mysqli_query($db, "DELETE FROM songs WHERE `songs`.`no` = $no;");
  mysqli_query($db, "ALTER TABLE `songs` AUTO_INCREMENT=1;");
  mysqli_query($db, "SET @COUNT = 0;");
  mysqli_query($db, "UPDATE `songs` SET no = @COUNT:=@COUNT+1;");
}




?>