<?php
require('include.php');
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
			$name=$_POST['name'];
			$number=$_POST['number'];
			$descr=$_POST['descr'];
			
$query=mysql_query("insert into room (name, number, descr, image )VALUES('".$name."','".$number."','".$descr."','".$location."')");
			
			echo ("<script language='javascript'> window.alert('room succesfully added')</script>");
			echo "<meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ";
			}
	}
?>
