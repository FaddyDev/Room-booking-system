<?php
require('include.php');
?>
<?php include('headeradmin.php');
?>
<div id="container">
	<?php
require('include.php');
?>
<?php
if(isset($_GET['del']))
{
$id=$_GET['del'];

$sql="DELETE FROM room WHERE room_id='".$id."' ";
$result=mysql_query($sql);
echo ("<script language='javascript'> window.alert('Room Deleted successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ";
}

?>
</div>
<?php include('footer.php');
?>