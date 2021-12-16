
<?php
session_start();
if(isset($_SESSION["admin"])){  
unset($_SESSION['admin']);
header('Location:Admin.php');	
}else{
unset($_SESSION['username']);
header('Location:index.php');
}
?>

