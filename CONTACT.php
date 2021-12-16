
<?php
require('include.php');
?>
<?php include('header.php');
?>
<div id="container" class="container">
<div id ="left" class="col-md-6" style="border:1px solid #ccc; border-radius:4px;">
<form action="contact.php" class="form-group" method="post" >
<label><p>To leave any question,comment or concerns,kindly do so by filling the details below.</p></label>
                    <p>Name:<br />
                        <input name="name" class="form-control add-todo" placeholder="Enter Your Name" type="text" class="ed"required />
                        <br />
                      Email Address:<br />
                      <input name="email" class="form-control add-todo" placeholder="Enter Your E-mail" type="email" class="ed" required/>
                      <br />
                      Messages:<br />
                      <textarea name="message" class="form-control add-todo" placeholder="Leave us you comment or concern" rows="8" cols="23" class="ed" required></textarea>
                      <br />
                      <input name="Input" class="form-control add-todo btn btn-primary" type="submit" value="Submit" id="button" />
                    </p>
                  </form>
				  </div>
				  <div id ="right" class="col-md-6" style="border:1px solid #ccc; border-radius:4px;">
				  <img class="img-rounded" src="images/recep.jpg"></img><br>
				  <p>
				  If you have any questions, comments or concerns about our services, please don't hesitate to contact us.
				  We ensure that we will make your stay here an enjoyable and pleasant experience.</p>
				   <p><span class="label label-info">Telephone:</span> <span class="label label-success">+254(034)432-1708</span></p>
                    <p><span class="label label-info">Telefax:</span> <span class="label label-success"> +254(034) 709-0886</span></p>
                    <p><span class="label label-info">Mobile:</span> <span class="label label-success"> 0727524179</span>
                  </p>
				  </div>
				  <?php
error_reporting(0);
require('include.php');
	$name = @$_POST['name'];
	$email = @$_POST['email'];
	$message = @$_POST['message'];	
	 $querry=mysql_query("INSERT INTO feedback (`name`, `email`, `message`) VALUES('".$name."','".$email."','".$message."')");
	$rows=mysql_num_rows($querry);
	if(mysql_num_rows($querry)!=0){
		echo "message successfully saved";
	}
	
?>
</div>
<?php include('footer.php');
?>
</html>