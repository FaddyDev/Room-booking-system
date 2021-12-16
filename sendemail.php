<?php include('header.php');
?>
<div id="container">
<?php
require('include.php');
if(isset($_POST['submit'])){
		$email = $_POST['email'];
	$query = mysql_query("select * from signup where email='".$email."' ")
	or die(mysql_error());  
$row = mysql_fetch_array($query);
$rownum = mysql_num_rows($query);

	$to= $row['email']; 
  $subject= "password"; 
if(!$rownum) {
echo "We can not find your email in our records";
}
if($rownum >1  ){
$message= "Name:" . $row['email']. "\n\n Your password is:" . $row['password']. "\n\n";
 $header = "";     
     
 $sent =  mail($to,$subject,$message,$header);
 
 
 require 'PHPMailer/PHPMailerAutoload.php';
 $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'linnetmbuthia5@gmail.com';                 // SMTP username
    $mail->Password = 'linnet11';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('linnetmbuthia5@gmail.com', 'Linnet');
    $mail->addAddress($to);               // Name is optional
    $mail->addReplyTo('linnetmbuthia5@gmail.com', 'Information');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'DEHUB OFFICE SPACE RESERVATION SYSTEM';
    $mail->Body    = 'forgot your password?';
    $mail->AltBody = 'Body of message goes here<for non html mail client>';
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
if($sent)
{
echo ("<script language='javascript'> window.alert('your password has been sent to your email address.')</script>");
			echo "<meta http-equiv='refresh' content='0;url=index.php'> ";
}else{
echo ("<script language='javascript'> window.alert('your password has been sent to your email address.')</script>");
			echo "<meta http-equiv='refresh' content='0;url=index.php'> ";
}
}
}
?>
</div>
<?php include('footer.php');
?>