
<?php
 include('include.php');
?>
<?php include('header.php');
if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
		include_once('include.php');
               $query = 'SELECT * FROM book where id='.$id.'';
                 $result= mysql_query($query);
				while($row=mysql_fetch_assoc($result)){
?>
<div id="container" class="container">
<div class="col-md-8" style="border:1px solid #ccc; border-radius:4px;">
<p><span class="label label-info">Room Payment Information.<style font size="12px"></style></span></p>
<form action="pay.php" class="form-group" method="POST">

Room Number:
<input type="text" name="number" class="form-control add-todo" value="<?php  echo  $row['number'];?>" id="number"readonly required><br/>
Date:
<input type="text" name="date" class="form-control add-todo" value="<?php  echo  $row['date'];?>" id="max_date"readonly required><br/>
Amount:
<input type="text" name="amount" class="form-control add-todo" placeholder="Enter The Total Amount"  value="" required><br/>
Method:
<select class="form-control add-todo" name="method">
<option>MPesa</option>
<option>Cheque</option>
<option>Airtel Money</option>
<option> YuCash</option>
</select><br/>
Reference Number:
<input type="text" class="form-control add-todo" placeholder="Enter The Transaction ID" name="reference_no"  value="" required><br/>
<input type="submit" class="btn btn-primary" style="float:right;"  name="submit" value="submit">
</form>
</div>
</div>
<?php }} include('footer.php');
?>
<?php
if(isset($_POST['submit'])){
$number=$_POST['number'];
$date=$_POST['date'];
$amount=$_POST['amount'];
$method=$_POST['method'];
$reference_no=$_POST['reference_no'];
if($number!=''&&$date!='' &&$amount!='' &&$method!='' &&$reference_no!=''){
		  $querry=mysql_query("INSERT INTO payment_received(number,date,amount,method,reference_no)
		values('".$number."','".$date."','".$amount."','".$method."','".$reference_no."')");
				         $phone='';
$sql="select * from admin";
	$result_rows= mysql_query($sql);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql);
		    while($row=mysql_fetch_assoc($result)){
			  $phone = '+254'.$row['phone'];
			  
			}
		}		  
$message = 'Payment Confirmation for '.$_SESSION['username'].',you have paid Ksh'.$amount.',paid via '.$method.',REF_NO:'.$reference_no.', 
for room number '.$number.' booked for '.$date.'';


// Be sure to include the file you've just downloaded
require_once('sms/AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "STELLAWANJIKU";
$apikey     = "4290df108e168c5afc74a460204618fc1ca27c722c53dea7f1583c17303c97ab";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = $phone;
// And of course we want our recipients to know what we really do
$message    = $message;
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    //echo " Number: " .$result->number;
    //echo " Status: " .$result->status;
    //echo " MessageId: " .$result->messageId;
    //echo " Cost: "   .$result->cost."\n";
  
echo ("<script language='javascript'> window.alert('details succesfully sent to the administration.')</script>");
echo "<meta http-equiv='refresh' content='0;url=personalbooked.php'> ";
	
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}	
}	
}
?>