<?php
session_start();
if(isset($_SESSION["admin"]) || isset($_SESSION["username"])){
	unset($_SESSION["admin"]);
	unset($_SESSION["username"]);
	} 
?>
<?php require('include.php');
?>
<?php include('header.php');
?>
<div  class="container">
<div class="col-md-7" style="border:1px solid #ccc; border-radius:4px; margin-right:0.5%;">
<?php include('slider.php'); ?>
</div>
<div class="col-md-4" style="border:1px solid #ccc; border-radius:4px;">
<fieldset><legend>Login  to book</legend>
<form action="login.php" class="form-group" method="post">
<input type="text" name="username" class="form-control add-todo" id="log" placeholder="Enter Your Username"  required /></br>
<td><input type="password" class="form-control add-todo" name="password" id="log" placeholder="Enter Your Password"  required/></br>
<a href=recover.php>Forgot Password? </a></td>
<input type="submit" name="submit" class="btn btn-primary" style="float: right;" value="Log In" id="submit">			
</form>

<hr>
Not Registered? Click<a href="register.php"> Here</a> to register.
</fieldset>
<img src="images/03.jpg" width="100%" height="auto"/> 
</div>
</div>
<?php include('footer.php');
?>