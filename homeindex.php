<html>
<head><title></title>

<link rel="stylesheet" type="text/css" href="css/dehub.css">
<?php include('header.php');
?>
<style>

body{
	overflow:scroll;
	background-color:#00FFFF;
}
ul {
	text-align:center;
    list-style-type: none;
    margin: 0;
    padding: 0;
    background-color:#00FFFF;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li {
    text-align: center;
    b0order-bottom: 1px solid #555;
}

li:last-child {
    bo0rder-bottom: none;
}


li a.active {
    color: red;
}

li a:hover:not(.active) {
    color: blue;
}
#navigation{
	margin-left:30%;
	margin-right:30%;
}

</style>
</head>
<body>
<div id="navigation">
<ul><li>
     <li><a href="index.php">HOME</a></li>
	   <li><a href="ROOMDETAILS.php"> VIEW ROOM DETAILS</a></li>
	    <li><a href="bookedroom.php"> SCHEDULES</a></li>
		<li><a href="personalbooked.php"> MAKE PAYMENTS</a></li>
	    <li><a href="bookedroom.php"> </a></li>
	  </li></ul>
<div>
</body>
</html>