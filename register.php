<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Project Knowasarc | Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
</head>
<body style="background-color:#bdc3c7">
	<div class="slideshow">
        <canvas width="1" height="1" id="container" style="position:absolute"></canvas>
        <div class="container-fluid">
            <div class="col-sm-4 col-sm-offset-4">
                <div id="main-wrapper">
                    <div class="imgcontainer">
                        <img src="img/ka-avatar-txt.png" alt="Avatar" class="avatar">
                    </div>
					<form action="register.php" method="post">
					<div class="inner_container">
							<div class="form-group">
                                <label><b>Username</b></label>
                                <input type="text" class="form-control" placeholder="Enter Username" name="ZionianName" required>
                            </div>
                            <div class="form-group">
                                <label><b>Password</b></label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="ZionianPW" required>
                            </div>
                            <div class="form-group">
                                <label><b>Confirm Password</b></label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="cZionianPW" required>
                            </div>
							<div class="form-group">
                                <button type="submit" class="btn btn-primary sign_up_btn" name="register">Sign Up</button>
                            </div>
                            <div class="form-group">
                                <a href="index.php"><button type="button" class="btn btn-default back_btn">&lt;&lt; Back to Login</button></a>
                            </div>
						</div>
					</form>
			<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['ZionianName'];
				@$password=$_POST['ZionianPW'];
				@$cpassword=$_POST['cZionianPW'];
				
				if($password==$cpassword)
				{
					$query = "select * from Zionians where ZionianName='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into Zionians (ZionianName, ZionianPW) values('$username','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['ZionianName'] = $username;
								$_SESSION['ZionianPW'] = $password;
								header( "Location: homepage.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="js/index.min.js"></script>
</body>
</html>