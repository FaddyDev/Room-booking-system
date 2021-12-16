<?php if(session_status()==PHP_SESSION_NONE){
session_start();} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/sticky-footer.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/jquery.dataTables.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="css/jquery.dataTables_themeroller.css">
 <link rel="stylesheet" href="css/style.css">
  
  <script src="js/jquery.min.js"></script>
  <script src="js/datetime.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment-with-locales.js"></script>
  <script src="js/bootstrap-datetimepicker.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
  <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="ccss/dehub.css">
<link rel="stylesheet" href="datepicker/css/jquery-ui.css">
<script src="datepicker/js/jquery-1.10.2.js"></script>
  <script src="datepicker/js/jquery-ui.js"></script>
  <script src="js/scripts.js"></script>

  <script>
  $(function() {
    $( ".datepicker" ).datepicker({dateFormat: "dd/mm/yy",minDate: new Date()});
  });
  </script>
  <script type="text/javascript">
        function doSearch() {
            var searchText = document.getElementById('searchTerm').value;
            var targetTable = document.getElementById('dataTable');
            var targetTableColCount;

            //Loop through table rows
            for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
                var rowData = '';

                //Get column count from header row
                if (rowIndex == 0) {
                    targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
                    continue; //do not execute further code for header row.
                }

                //Process data rows. (rowIndex >= 1)
                for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
                    var cellText = '';

                    if (navigator.appName == 'Microsoft Internet Explorer')
                        cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).innerText;
                    else
                        cellText = targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;

                    rowData += cellText;
                }

                // Make search case insensitive.
                rowData = rowData.toLowerCase();
                searchText = searchText.toLowerCase();

                //If search term is not found in row data
                //then hide the row, else show
                if (rowData.indexOf(searchText) == -1)
                    targetTable.rows.item(rowIndex).style.display = 'none';
                else
                    targetTable.rows.item(rowIndex).style.display = 'table-row';
            }
        }
    </script>
	<script type="text/javascript">
function gettime()
{var selectBox1 = document.getElementById("starttime").selectedIndex;
//var selectedValue1 = selectBox1.options[selectBox.selectedIndex];
//var selectedValue1 = selectBox1.getSelectedItem.Index();
var selectBox2 = document.getElementById("endtime").selectedIndex;
//var selectedValue2 = selectBox2.getSelectedItem.Index();
//var selectedValue2 = selectBox2.options[selectBox.selectedIndex];
   if(selectBox1>=selectBox2){
	   alert("End time should be greater than start time");
	   return false;
   }
   
 }
 function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8 & unicode!=46 & unicode!=37 & unicode!=39 ){ //if the key isn't the backspace,delete,left and right arrow keys (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}
function confirmpass(){
	var pass1=document.myform.password.value;
	var pass2=document.myform.confirmpass.value;
	if(pass1!=pass2){
		alert('passwords do not match');
		return false;
	}
	return true;
}
</script>
<style>
body{background-color:#249D1E;}
.container{background-color:#959595;}
.navbar, .name, .foot{background-color:#E6E126;}
.col-md-8,.col-md-7,.col-md-6, .col-md-4{background-color:#FFF;}
.name{
colorR:#FFF;
font-family:"Times New Roman", Times, serif;}
</style>

</head>
<body onLoad="renderTime();">
<div id="header">
<div class="name">
<h2></h2>
<h2><center>DEHUB OFFICE SPACE RESERVATION SYSTEM</center></h2>
 </div>
<nav class="navbar navbar-inverse" id="nv">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav"><li>
     <li><a href="index.php">HOME</a>
	 </li>
	   <li><a href="ROOMDETAILS.php">ROOM DETAILS</a></li>
	    <li><a href="bookedroom.php">BOOKED ROOMS</a></li>
      <li><a href="CONTACT.php">CONTACT</a></li>
	  <li><a href="Admin.php">ADMIN LOGIN</a></li>
	  <li><a href="register.php">SIGNUP</a></li>
	   <?php if(isset($_SESSION["username"])){  
					  //ob_start();
                       include('include.php');
					   $today = date('Y-m-d');
                       $query = "SELECT * FROM book where date>='".$today."' AND username='".$_SESSION['username']."' ";
					   
                    $result= mysql_query($query);
					/*if($result === FALSE) { 
                     die(mysql_error()); // TODO: better error handling
                      
			*/
                      
						   if($row=mysql_fetch_assoc($result)){
                                if($row['confpayment'] == "payed"){?>
	  <li><a  href="reciept.php">print</a></li>
						  <?php  }}?>
	<li sstyle="float:right;"><a href="personalbooked.php">BOOKS</a></li>
	   <li sstyle="float:right;"><a class="btn btn-default" href="logout.php">LOG OUT</a></li> 
	   	  <?php } ?>
       <li style="float:right; color:#249D1E; font-weight:800;"><div id="clockDisplay"></div>
	   <?php if(isset($_SESSION["username"])){ echo 'Welcome '.$_SESSION["username"]; }?></li>
	    </ul>
	   </div>
</nav>
</div>
</div>