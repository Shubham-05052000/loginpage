<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
	<form  action='index.php' method="post">
     	<h2>LOGIN</h2>
     	
     	<label>USERNAME</label>
     	<input type="text" name='email' placeholder="User Name"><br>

        <label>PASSWORD</label>
     	<input type="password" name='pass' placeholder="Password"><br>

     	<button type="submit">Login</button>
		</form>
	</div>
		
		  <?php
         if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_POST['email'];
    $password=$_POST['pass'];
    

  //connecting database
  echo "welocome to database";
//How to connecting to database 
$severname='localhost';
$username='root';
$password='';
$database='shubham2';

//create to connection 
$conn = mysqli_connect($severname,$username,$password,$database);
if (!$conn){
	die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
	$sql = "INSERT INTO `login` (`username`, `password`, `dt`) VALUES ('$email', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);

		if($result){
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> Your entry has been submitted successfully!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>';
		  }
		  else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
}

}
?>
</body>
</html>