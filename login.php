<?php
echo "1";
error_reporting(E_ALL);
ini_set("display_errors",1);

session_start();

$id=$_POST["id"];
$pw=$_POST["pw"];

$connect = mysqli_connect("localhost","root","toor");
if(!$connect){
    die('Could no connect: '.mysql_error());
}
echo 'Connected successfully';
echo '<br/>';

mysqli_query($connect,"set names euckr");

mysqli_select_db($connect, "sfgg");

$query = "select * from user where username='$id'";

$result=mysqli_query($connect, $query);

$data=mysqli_fetch_array($result,MYSQLI_NUM);

echo "1";
echo $data[0];
if($data[1]==$id) {
    echo "no erorr id == $id <br/>";
    if($data[2]==$pw) {
        echo "no error pw = $pw <br/>";
        
        $_SESSION['id']=$id;
        $_SESSION['is_logged']=1;

    }else{
        echo"<script>alert(\"실패\");
            history.back(1);
            </script>";
        $_SESSION['is_logged']=2;
    }
}else{
    $_SESSION['is_logged']=2;
    echo "<script>alert(\"실패\");
            history.back(1);
            </script>";
}

mysql_close($connect);
?>
