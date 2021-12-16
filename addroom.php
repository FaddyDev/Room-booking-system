<?php
//session_start();
require('include.php');
//if(@$_SESSION["username"])
?>
<?php include('headeradmin.php');
?>
<div id="container" class="container">
<script type="text/javascript">
function validateForm()
{
var a=document.forms["addroom"]["name"].value;
if (a==null || a=="")
  {
  alert("Pls. Enter the room name");
  return false;
  }
var b=document.forms["addroom"]["number"].value;
if (b==null || b=="")
  {
  alert("Pls. Enter the room number");
  return false;
  }
var d=document.forms["addroom"]["descr"].value;
if (d==null || d=="")
  {
  alert("Pls Enter the room description");
  return false;
  }
 var e=document.forms["addroom"]["image"].value;
if (e==null || e=="")
  {
  alert("Pls. browse an image");
  return false;
  }
/*if (c.which!=8 && c.which!=0 && (c.which<48 || c.which>57))
  {
  alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
  return false;
  }
if (b.which!=8 && b.which!=0 && (b.which<48 || b.which>57))
  {
  alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
  return false;
  }*/
}
</script>

<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<div class="col-md-8" style="border:1px solid #ccc; border-radius:4px;">
<form action="adding.php" class="form-group" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
<p><span class="label label-info">Kindly fill the form below with the room's details.<style font size="12px"></style></span></p>
 Room Name<br />
  <input name="name" type="text" class="form-control add-todo" placeholder="Enter The Room Name" required/><br />
 Room Number<br />
    <input name="number" type="text" id="rate" class="form-control add-todo" placeholder="Enter The Room Number" onkeypress="return isNumberKey(event)"required /><br />
Room Description<br />
    <input name="descr" type="text" class="form-control add-todo" placeholder="Enter The Room's Description" required/><br />
    
Room Image: <br /><input type="file" class="form-control add-todo" placeholder="Enter Your First Name" name="image" class="ed"><br />
 
    <input type="submit" name="Submit" class="btn btn-primary" style="float:right;" value="Add"/>
 
</form>
</div>
</div>
<?php include('footer.php');
?>