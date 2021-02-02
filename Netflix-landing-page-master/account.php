<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = $_POST['ename'];
	
  $servername="localhost";
  $username="root";
  $password="";
  $database="netflix";
  $conn=mysqli_connect($servername,$username,$password,$database);
  if(!$conn)
  {
	  die("sorry we failed to connect:".mysqli_connect_error());
  }
  else{
    echo"connection successfull <br>";
  }
  $sql="INSERT INTO `account` (`email`) VALUES ( '$name')";
  $result= mysqli_query($conn,$sql);
  if(!$result)
  {
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Invalid username </strong> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">×</span>
	</button>
  </div>';
  }
  
	}
  
  ?>