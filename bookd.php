<?php
require('include.php');
?>
<?php include('headeradmin.php');
?>
<div id="container" class="container">
<div class="col-md-12" style="border:1px solid #ccc; border-radius:4px;">
<input type="text" class="form-control add-todo" id="searchTerm" class="search_box" placeholder="Type to search..." onkeyup="doSearch()" />

           <table id="dataTable" class="table table-striped table-bordered table-hover table-condensed table-responsive display">
                      <thead>
                        <tr>
                          <th>Room Name</th>
                          <th>Room Number</th>
						   <th>Date</th>
                          <th>Start Time </th>
						  <th>End Time </th>
						  <th align="center">Confirm Payment </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php   
					  ob_start();
                       include('include.php');
					    $today = date('Y-m-d');
                       $query = "SELECT * FROM book where date>='".$today."' ORDER BY date ASC";
                       $result= mysql_query($query);
						   while($row=mysql_fetch_assoc($result)){
                                echo '<tr>';                                
                                echo '<td>'. $row['room'] . '</td>';
                                echo '<td>'. $row['number'] . '</td>';
                                echo '<td>'. date("d/m/Y",strtotime($row['date'])) . '</td>';                         
                                  echo '<td>'. $row['start'] . '</td>';
                                    echo '<td>'. $row['end'] . '</td>'; 						  
                                    echo '<td align="center"> <form method="post" action="bookd.php">
									<input type="hidden" name="id[]" value="'.$row['id'].'">
									<input type="hidden" name="payment['.$row['id'].']" value="Not payed">
									<input class="checkbox" type="checkbox" name="payment['.$row['id'].']" value="payed"';
									if($row['confpayment'] == "payed"){ echo 'checked = true';} echo '>
									
									</td>';                        
                 
                                echo '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
	<a class="btn btn-success" role="button" href="print-all.php"> <span class="glyphicon glyphicon-print"></span> Print</a>

<input type="submit" class="btn btn-primary"  value="Confirm" style="float:right"/>
</form>
<input type="checkbox"  onClick="select_all();" id="select_all" sytle="float:right"/> <span class="label label-info">Select All</span>
</div>
</div>
<?php include('footer.php');
?>
<?php
if($_POST){
	 $item_idCount = count($_POST['id']);
	  for($i=0; $i<$item_idCount; $i++) {
	 $id = @$_POST['id'][$i];
     $payment = @$_POST['payment'][$id];
		  $querry=mysql_query("UPDATE book SET confpayment='".$payment."' WHERE id='".$id."' ");
		echo "<meta http-equiv='refresh' content='0;url=bookd.php'> ";
	}
	
}	  
?>
 
