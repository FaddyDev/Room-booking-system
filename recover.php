<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
</head>
<?php include('header.php');
?>
<div id="container" class="container">
<body>
<form method="post" class="form-group" action="sendemail.php">
Email Address:<br />
  <input name="email" class="form-control add-todo" placeholder="Provide an email address to which your password will be send (Should be the email you registered with)" type="email" name="email" id="ed" size="50" />
  <br />
<input name="submit" type="submit" class="form-control add-todo btn btn-primary" value="Submit"/>
</form>
</div>
<?php include('footer.php');
?>
</body>
</html>
