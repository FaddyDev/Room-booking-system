
<?php include('header.php');
?>
<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>

<div id="container" class="container">
<div class="col-md-8" style="border:1px solid #ccc; border-radius:4px;">

<?php if ( !empty($_GET['number'])) {
		$number = $_REQUEST['number'];
		include_once('include.php');
               $query = 'SELECT * FROM room where number='.$number.'';
                 $result= mysql_query($query);
				while($row=mysql_fetch_assoc($result)){
		?>
<p><center><span class="label label-success">Boooking details</span></center></p>
<hhr align="right" color="Blue" size="3.5" width="100%" noshade>
<p><span class="label label-info">Please enter your details below to complete booking Request.<style font size="12px"></style></span></p>
<form action="orderdetails.php" class="form-group" method="post">
 Room Name:
<input type="text" class="form-control add-todo" name="name" value="<?php  echo  $row['name'];?>" id="textname" size="30" readonly required><br/>
RoomNo:
<input type="text" class="form-control add-todo" name="number" value="<?php  echo  $row['number'];?>" id="lastname"size="30" readonly required><br/>
Date:
<input type="text" class="datepicker form-control add-todo" placeholder="Choose date" name="date" id="date" size="30" required><br/>
Start Time:
<select class="form-control add-todo" name="hours" id="starttime">
<option value="">select start time</option>
<option value="8:00.AM">8:00.AM</option>
<option value="9:00.AM">9:00.AM</option>
<option value="10:00.AM">10:00.AM</option>
<option value="11:00.AM">11:00.AM</option>
<option value="12:00.PM">12:00.PM</option>
<option value="1:00.PM">1:00.PM</option>
<option value="2:00.PM">2:00.PM</option>
<option value="3:00.PM">3:00.PM</option>
<option value="4:00.PM">4:00.PM</option>
<option value="5:00.PM">5:00.PM</option>
</select><br/>
End Time:
<select class="form-control add-todo" name="times" id="endtime" onChange="gettime()">
<option value="">select end time</option>
<option value="9:00.AM">9:00.AM</option>
<option value="10:00.AM">10:00.AM</option>
<option value="11:00.AM">11:00.AM</option>
<option value="12:00.PM">12:00.PM</option>
<option value="1:00.PM">1:00.PM</option>
<option value="2:00.PM">2:00.PM</option>
<option value="3:00.PM">3:00.PM</option>
<option value="4:00.PM">4:00.PM</option>
<option value="5:00.PM">5:00.PM</option>
</select><br/>
<input type="submit" class="btn btn-primary" style="float:right;" name="submit" value="Book" />

</form>

<?php }}?>
</div>
</div>
<?php include('footer.php');
?>
<?php
//session_start();
require('include.php');

if(isset($_POST['submit'])){
	$room=@$_POST['name'];
$number=@$_POST['number'];
$date=@$_POST['date'];
$day=@$_POST['day'];
$start=@$_POST['hours'];
$end=@$_POST['times'];
$fname=@$_POST[fname];
$username=@$_POST['username'];
$phone=@$_POST['telephoneno'];
if($room!='' &&$number!='' &&$date!='' &&$start!='' &&$end!=''){
	$sql = '';
	$sql2="select * from book where number='".$number."' AND date=STR_TO_DATE('".$date."', '%d/%m/%Y')";
	$result_rows= mysql_query($sql2);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql2);
		    while($row=mysql_fetch_assoc($result)){
			  $st = $row['start'];
			  $end2 = $row['end'];
			  if($start == $st){exit("<script language='javascript'> window.alert('Reserved, select another time')</script>
               <meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ");}
			  else if($end == $end2){exit("<script language='javascript'> window.alert('Reserved, select another time')</script>
               <meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ");}
			  else if(($st<$start) && ($start<$end2)){exit("<script language='javascript'> window.alert('Reserved, select another time')</script>
               <meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ");}
			  else if(($st<$end) && ($end<$end2)){exit("<script language='javascript'> window.alert('Reserved, select another time')</script>
               <meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ");}
	             else if(($st>$start) && ($end<$end2)){exit("<script language='javascript'> window.alert('Reserved, select another time')</script>
               <meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ");}
			  else{$sql = "insert into  book (room, number, date,start,end,username) VALUES('".$room."','".$number."','".$date."','".$start."','".$end."','".$_SESSION['username']."')";}
			} 
	    }else{$sql = "insert into  book (room, number, date,start,end,username) VALUES('".$room."','".$number."',STR_TO_DATE('".$date."', '%d/%m/%Y'),'".$start."','".$end."','".$_SESSION['username']."')";}
	
	$query=mysql_query($sql);
//echo ("<script language='javascript'> window.alert('succesfully booked.Kindly wait for confirmation through sms.')</script>");


if($start =='1:00.PM'){$start = '13:00.PM';}
if($start =='2:00.PM'){$start = '14:00.PM';}
if($start =='3:00.PM'){$start = '15:00.PM';}
if($start =='4:00.PM'){$start = '16:00.PM';}
if($start =='5:00.PM'){$start = '17:00.PM';}

if($end =='1:00.PM'){$end = '13:00.PM';}
if($end =='2:00.PM'){$end = '14:00.PM';}
if($end =='3:00.PM'){$end = '15:00.PM';}
if($end =='4:00.PM'){$end = '16:00.PM';}
if($end =='5:00.PM'){$end = '17:00.PM';}

//session_start();
$sql2="select * from signup where username='".$_SESSION['username']."'";
	$result_rows= mysql_query($sql2);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql2);
		    while($row=mysql_fetch_assoc($result)){
			  $phone = '+254'.$row['telephoneno'];
			  $fname = $row['firstname'];
			}
		}			
$message = 'Dear '.$fname.', You have succesfully booked room number '.$number.' for '.$date.' from '.$start.' to '.$end.'. Kindly pay a Total of Ksh '.($end-$start)*$_SESSION['aph'].'.Thanks in advance.';

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
	
echo ("<script language='javascript'> window.alert('succesfully booked.Kindly wait for confirmation through sms.')</script>");
echo "<meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ";
	
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
}	
 }
?>
 