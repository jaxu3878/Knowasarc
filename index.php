<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Project Knowasarc | Login</title>
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
                    <form action="index.php" method="post">
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
                                <button type="submit" class="btn btn-primary login_button" type="submit">Login</button>
                            </div>
                            <div class="form-group">
                                <a href="register.php"><button type="button" class="btn btn-default register_btn">Register</button></a>
                            </div>
                        </div>
                    </form>
                    <?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['ZionianName'];
				@$password=$_POST['ZionianPW'];
				$query = "select * from userinfotbl where ZionianName='$username' and ZionianPW='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['ZionianName'] = $username;
					$_SESSION['ZionianPW'] = $password;
					
					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
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