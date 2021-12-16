<link rel="stylesheet" type="text/css" href="css/responsive.css">
<?php include('headeradmin.php');
?>
<div id="container" class="container">
<input type="text" class="form-control add-todo" id="searchTerm" class="search_box" placeholder="Type to search..." onkeyup="doSearch()" />

           <table class="table table-striped table-bordered table-hover table-condensed table-responsive display" id="dataTable"  width="100%">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
						   <th>ID Number</th>
                          <th>Phone Number </th>
						  <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php   
					  ob_start();
                       include('include.php');
                       $query = 'SELECT * FROM signup ORDER BY email ASC';
                       $result= mysql_query($query);
						   while($row=mysql_fetch_assoc($result)){
                                echo '<tr>';                                
                                echo '<td>'. $row['firstname'] . '</td>';
                                echo '<td>'. $row['lastname'] . '</td>';
                                echo '<td>'. $row['idnumber'] . '</td>';                         
                                  echo '<td>'. $row['telephoneno'] . '</td>';
                                    echo '<td>'. $row['email'] . '</td>'; 						  
                                                            //echo '&nbsp;';
                                //echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                //echo '&nbsp;';
                                //echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
				<a style="float:right;" class="btn btn-success" role="button" href="print-user.php"> <span class="glyphicon glyphicon-print"></span> Print</a> 

</div>
<?php include('footer.php');
?>