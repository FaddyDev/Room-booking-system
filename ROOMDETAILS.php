<?php
if(session_status()==PHP_SESSION_NONE){
session_start();}
if(isset($_SESSION["admin"])){
	include('headeradmin.php');
	}
else{
	include('header.php');}
 
?>
<div id="container" class="container">
<input type="text" class="form-control add-todo" id="searchTerm" class="search_box" placeholder="Type to search..." onkeyup="doSearch()" />

           <table class="table table-striped table-bordered table-hover table-condensed table-responsive display" id="dataTable"  width="100%">
                      <thead>
                        <tr>
                          <th>Room Image</th>
                          <th>Room Name</th>
						   <th>Room Number</th>
                          <th>Room Description</th>
                          <th style="color:#7F5FFF"><?php if(!(isset($_SESSION["username"]))){echo '<font color="white">Login to Book</font>';} 
						    else{echo '<font color="white">Booking</font>';}
						  ?>
                                </th>
                    
                          <!--<th>Action</th>-->
                        </tr>
                      </thead>
                      <tbody>
                      <?php   
					  ob_start();
                       include('include.php');
                       $query = 'SELECT * FROM room ORDER BY number ASC';
                       $result= mysql_query($query);
						   while($row=mysql_fetch_assoc($result)){
                                echo '<tr>';
                                echo '<td><img src="'. $row['image'] . '"height="70" width="70"/></td>';
                                echo '<td>'. $row['name'] . '</td>';
                                echo '<td>'. $row['number'] . '</td>';
                                echo '<td>'. $row['descr'] . '</td>';                         
        
                                echo '<td style="color:#7F5FFF">';
								if(isset($_SESSION["username"])){
                                echo '<a class="btn btn-success" href="orderdetails.php?number='.$row['number'].'">Book</a>';}
                                //echo '&nbsp;';
                                //echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                //echo '&nbsp;';
                   if(isset($_SESSION["admin"])){ echo '<a class="btn btn-success" href="javascript:confirm_delete_room('.$row['room_id'].')">Delete</a>';}
                                echo '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>

</div>
<?php include('footer.php');
?>