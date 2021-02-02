<?php
$servername="localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password);
$sql="CREATE DATABASE netflix";
$result=mysqli_query($conn,$sql);
echo var_dump($result);
if(!$conn)
{
    die("sorry we failed to connect:".mysqli_connect_error());
}
else{
    echo"connection";
}
?>