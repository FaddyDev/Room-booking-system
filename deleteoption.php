<?php
				  if (isset($_POST['yes']))
	{
		require('include.php');
			  }
			mysql_select_db("deoffice");
			$messages_id = $_POST['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("DELETE FROM room WHERE room_id='$messages_id'");
			header("location: Adminindex.php");
			MMMMMMMMMMMMMM
		
			}
			 if (isset($_POST['no']))
	{
		header("location: Adminindex.php");
			exit();
		
			}
			?>