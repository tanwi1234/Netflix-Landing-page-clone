
<?php
session_start();
include('dbconns.php');

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['ename']);
	$pass = validate($_POST['pname']);

	if (empty($uname)) {
		header("Location: detailspage.html?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: detailspage.html?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM account WHERE Email='$uname' && Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $uname && $row['Password'] === $pass) {
            	$_SESSION['Email'] = $row['Email'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: index.html");
		        exit();
            }else{
				header("Location: detailspage.html?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: detailspage.html?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.html");
	exit();
}
?>