<?php
require('include.php');
?>
<?php include('headeradmin.php');
?>
<div id="container" class="container">
<div id="main">
<h2><center> WEEKLY EARNINGS</center></h2>
<?php
echo'<table class="table table-striped table-bordered table-hover table-condensed table-responsive display">
<thead> <tr>
<th>DATE</th>
<th>Amount (KShs.)</th>
</tr></thead>';
$d1='01';$d2='07';$d3='08';$d4='14';$d5='15';$d6='21';$d7='22';$d8='28';$d9='29';$d10='31';
$dt1 = date('Y-m-').$d1;
$dt2 = date('Y-m-').$d2;
$dt3 = date('Y-m-').$d3;
$dt4 = date('Y-m-').$d4;
$dt5 = date('Y-m-').$d5;
$dt6 = date('Y-m-').$d6;
$dt7 = date('Y-m-').$d7;
$dt8 = date('Y-m-').$d8;
$dt9 = date('Y-m-').$d9;
$dt10 = date('Y-m-').$d10;
//echo $dt;
echo '<tbody><tr>';

	$sql = "select sum(amount) from  payment_received where date between '".$dt1."' and '".$dt2."'";
	$sum1 = 0;
$result_rows= mysql_query($sql);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql);
		    while($row=mysql_fetch_assoc($result)){
				$sum1=$row['sum(amount)'];
				

		echo '<td>Week 1 ('.$dt1.' to '.$dt2.')</td><td>'.$sum1;
			echo '</td></tr>';
		}	
		
		$sql = "select sum(amount) from  payment_received where date between '".$dt3."' and '".$dt4."'";
$sum2 = 0;
$result_rows= mysql_query($sql);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql);
		    while($row=mysql_fetch_assoc($result)){
				$sum2=$row['sum(amount)'];
				}
		echo '<tr>';
		echo '<td>Week 2 ('.$dt3.' to '.$dt4.')</td><td>'.$sum2;
		echo '</td></tr>';
		}
		$sql = "select sum(amount) from  payment_received where date between '".$dt5."' and '".$dt6."'";
$sum3 = 0;
$result_rows= mysql_query($sql);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql);
		    while($row=mysql_fetch_assoc($result)){
				$sum3=$row['sum(amount)'];
				}
		echo '<tr>';
		echo '<td>Week 3 ('.$dt5.' to '.$dt6.')</td><td>'.$sum3;
			echo '</td></tr>';
		}
	
			$sql = "select sum(amount) from  payment_received where date between '".$dt7."' and '".$dt8."'";
$sum4 = 0;
$result_rows= mysql_query($sql);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql);
		    while($row=mysql_fetch_assoc($result)){
				$sum4=$row['sum(amount)'];
				}
	echo '<tr>';
		echo '<td>Week 4 ('.$dt7.' to '.$dt8.')</td><td>'.$sum4;
	
		}
		
		$sql = "select sum(amount) from  payment_received where date between '".$dt9."' and '".$dt10."'";
$sum5=0;
$result_rows= mysql_query($sql);
		$rows=mysql_num_rows($result_rows);
		if($rows>0){
		    $result= mysql_query($sql);
		    while($row=mysql_fetch_assoc($result)){
				$sum5=$row['sum(amount)'];
				}
		echo '<tr>';
		echo '<td>Week 5 ('.$dt9.' to '.$dt10.')</td><td>'.$sum5;
			echo '</td></tr></tbody></table>';
		}
		}
		
?>
<h2><center>MONTHLY EARNINGS</center></h2>
<p><span class="label label-info">Amount:</span> <span class="label label-success"><?php echo '<td>KShs. '.($sum1+$sum2+$sum3+$sum4+$sum5); ?></span></p>
</div>
</div>
<?php include('footer.php');
?>