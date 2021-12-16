<?phpsession_start();
$_SESSION["username"]=$username;
<?php
require('include.php');
?>
<?php include('header.php');
?>
<div id="container" class="container">
<input type="text" class="form-control add-todo" id="searchTerm" class="search_box" placeholder="Type to search..." onkeyup="doSearch()" />

           <table id="dataTable" class="table table-striped table-bordered table-hover table-condensed table-responsive display" width="100%">
                      <thead>
                        <tr>
                          <th>Room Name</th>
                          <th>Room Number</th>
						   <th>Date</th>
                          <th>Start Time </th>
						  <th>End Time </th>
						  <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php   
					  ob_start();
                       include('include.php');
					    $today = date('Y-m-d');
                       $query = "SELECT * FROM book where username= '".$_SESSION['username']."' AND confpayment='Not Payed' ORDER BY date ASC";
                       $result= mysql_query($query);
						   while($row=mysql_fetch_assoc($result)){
                                echo '<tr>';                                
                                echo '<td>'. $row['room'] . '</td>';
                                echo '<td>'. $row['number'] . '</td>';
                                echo '<td>'. date("d/m/Y",strtotime($row['date'])) . '</td>';                         
                                  echo '<td>'. $row['start'] . '</td>';
                                    echo '<td>'. $row['end'] . '</td>'; 						  
                                   echo '<td>'. $row['confpayment'] . '</td>';
								   echo '<td><a  href="pay.php?id='.$row['id'].'">Pay Now</a>';
                                     echo '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
</div>
<?php include('footer.php');
?>

 
