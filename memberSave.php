<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

 $host = 'localhost';
 $user = 'root';
 $pw = 'toor';
 $dbName = 'sfgg';
 $mysqli = new mysqli($host, $user, $pw, $dbName);

 if($mysqli->connect_error) {
	 echo '-1';
 }else{
	 echo '1';
 }

 $id=$_POST['id'];
 $password=md5($_POST['pwd']);
 $password2=$_POST['pwd2'];
 $name=$_POST['name'];
 $email=$_POST['email'];
 
 $sql = "insert into account_info (id, pw, name, email) values ('$id','$password','$name','$email')";
 if($mysqli->query($sql)){
  echo 'success inserting';
 }else{
  echo 'fail to insert sql';
 }
?>
