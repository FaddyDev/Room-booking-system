    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php include('header.php');
?>
<div id="container" class="container">
<div class="col-md-8" style="border:1px solid #ccc; border-radius:4px;">
<form role="form" class="form-group" action="register.php" name="myform"onsubmit="return confirmpass();" method="POST">
<p><span class="label label-info">KIndly fill the details below for registration purposes.<style font size="12px"></style></span></p>
First Name
<input type="text" class="form-control add-todo" placeholder="Enter Your First Name" name="firstname" value="" size="40" maxlength="15" required><br />
Last Name
<input type="text" class="form-control add-todo" placeholder="Enter Your Last Name" name="lastname" value="" size="40" maxlength="15"required><br />
ID Number
<input type="text" class="form-control add-todo" name="idnumber" placeholder="Enter Your Identification Number" value="" size="40" maxlength="10"required onkeydown="return numbersonly(event)"><br />
Telephone Number<input type="text" class="form-control add-todo" placeholder="Enter Your Telephone Number" name="telephoneno" value="" size="40" maxlength="10"required onkeydown="return numbersonly(event)"><br />
Username
<input type="text" class="form-control add-todo" name="username" placeholder="Provide a Username" value="" size="40" maxlength="20"required><br />
Password
<input type="password" class="form-control add-todo"  placeholder="Provide a Memorable Password" name="password" value="" size="40" maxlength="20"required><br />
Confirm Password<input type="password" class="form-control add-todo" placeholder="Confirm the Password" name="confirmpass" value="" size="40" maxlength="20"required><br />
Email
<input type="email" class="form-control add-todo" placeholder="Enter Your Your E-mail" name="email" value="" size="40" maxlength="30" required>
<input type="submit" class="btn btn-primary" style="float:right;" name="submit" value="Register">
</form>
</div>
</div>
<?php include('footer.php');
?> 
<?php
//session_start();
require('include.php');

if(isset($_POST['submit'])){
	$firstname=@$_POST['firstname'];
$lastname=@$_POST['lastname'];
$idno=@$_POST['idnumber'];
$telephoneno=@$_POST['telephoneno'];
$username=@$_POST['username'];
$passwd=@$_POST['password'];
$confirmpass=@$_POST['confirmpass'];
$email=@$_POST['email'];
if($firstname &&$lastname &&$idno &&$telephoneno &&$username &&$passwd &&$email){
	 if(strlen($username)>=3 && strlen($username)<20 && strlen($passwd)>=4){
	 if($confirmpass==$passwd){
          $sql="select* from signup where username='".$username."'";
		   $querry=mysql_query($sql);
	      if(mysql_num_rows($querry)>0){
			  echo ("<script language='javascript'> window.alert('username already exist')</script>");
echo "<meta http-equiv='refresh' content='0;url=register.php'> ";
		  }
		  else{
		  $querry=mysql_query("INSERT INTO signup(firstname,lastname,idnumber,telephoneno,username,password,email)
		  values('".$firstname."','".$lastname."','".$idno."','".$telephoneno."','".$username."','".$passwd."','".$email."')");

			echo 'succesfully registered.click<a href="register.php"> Here</a> to login'; 
		  }
	 }else{
		 echo ("<script language='javascript'> window.alert('failed.Password did not match')</script>");
echo "<meta http-equiv='refresh' content='0;url=register.php'> ";
		  }	  
}
else{
			if(strlen($username)<3 || strlen($username)>20){
				echo "you have exceeded the limit".'<br>';
			}
			if(strlen($passwd)<4){
				
				echo "I recommend you use more than 4 letters in the password field".'<br>';
			}
		}
	}
	
}	  
?>
 