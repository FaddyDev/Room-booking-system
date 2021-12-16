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
  
  function confirm_delete_room(id)
{
 if(confirm('This room will be deleted parmanently.\n Are you sure you want to continue?'))
 {
  window.location.href='delete.php?del='+id;
 }
 else{window.location.href='ROOMDETAILS.php';}
}

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
function select_all(){
var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}



//select all checkboxes
$("#select_all").change(function(){  //"select all" change
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change
$('.checkbox').change(function(){
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length ){
        $("#select_all").prop('checked', true);
    }
});
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
</head>
<body onLoad="renderTime();" bgcolor="#959595">
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
     <li><a href="addroom.php">ADDROOM</a></li>
	 <li><a href="ROOMDETAILS.php">ROOM DETAILS</a></li>
      <li><a href="bookd.php">BOOKED SPACES</a></li>
	   <li><a href="USERS.php">USERS</a></li>
	  <?php if(isset($_SESSION["admin"])){ ?> 
	   <li style="float:right;"><a class="btn btn-default" href="logout.php">LOG OUT</a></li>
	  <?php } ?>
       <li style="float:right; color:#249D1E; font-weight:800;"><div id="clockDisplay"></div>
	   <?php if(isset($_SESSION["admin"])){ echo 'Welcome '.$_SESSION["admin"]; }?></li>
	    </ul>
	   </div>
</nav>
</div>
</div>
