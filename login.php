<?php
if(isset($_POST['submit'])){
require('include.php');
$username=$_POST['username'];
$passwd=$_POST['password'];
	if($username && $passwd){
		$checklogin=mysql_query("select * from signup where username='".$username."' AND password='".$passwd."'");
		$rows=mysql_num_rows($checklogin);
		if($rows>0){
			session_start();
				$_SESSION["username"]=$username;
				$_SESSION["aph"]=200;
				header("Location: personalbooked.php");
			}else{
				echo ("<script language='javascript'> window.alert('wrong username or wrong password')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.php'> ";
				
			}
			}
     }
?>