
<?php
session_start();
if(isset($_SESSION["admin"]) || isset($_SESSION["username"])){
	unset($_SESSION["admin"]);
	unset($_SESSION["username"]);
	} 
?>


<?php
if(isset($_POST['submit'])){
require('include.php');
$username=$_POST['username'];
$passwd=$_POST['password'];

	if($username && $passwd){
		$checklogin=mysql_query("select * from admin where username='".$username."' AND password='".$passwd."'");
		$rows=mysql_num_rows($checklogin);
		if(mysql_num_rows($checklogin)!=0){
			while($row=mysql_fetch_assoc($checklogin)){
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
		}
		if($username==$dbusername && $passwd==$dbpassword){
			session_start();
				$_SESSION["admin"]=$username;
				header("Location: bill.php");
			}
		}else{
		echo ("<script language='javascript'> window.alert('Login failed, check username and password then try again')</script>");
echo "<meta http-equiv='refresh' content='0;url=admin.php'> ";
		}
	}
}
?>
<?php
require('include.php');
?>
<?php include('header.php');
?>
<div id="container" class="container" >
<div class="col-md-4" style="border:1px solid #ccc; border-radius:4px;" >
<h3>Admin Login</h3>
<form method="POST" action="admin.php">
Username<input class="form-control add-todo" placeholder="Enter Your Username" type="text" name="username" size="20" required>
Password<input class="form-control add-todo"  type="password" placeholder="Enter Your Password" name="password" size="20" required>
<input type="submit" style="float:right;" class="btn btn-primary" value="Login" name="submit">
</form>
</div>
</div>
<?php include('footer.php');
?>



