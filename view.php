<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>View</title>
</head>
<body>
	<?php
		require('config.php');
		session_start();
		if(isset($_POST['username'])&&isset($_POST['password']))
		{
			$sql = "SELECT username,type FROM login WHERE username='".$_POST['username']."'"." AND password='".$_POST['password']."'";
			$query = mysql_query($sql,$objConnect);
			$row = mysql_fetch_assoc($query);
			if(empty($row))
			{
				echo "Wrong Username or Password";
			}
			else
			{	
				echo "<form action='login.php' method='POST'>";			
				echo "<input type='submit' value='logout' />";
				echo "</form>";
				$_SESSION['username'] = $row['username'];
				$_SESSION['type'] = $row['type'];
				if($row['type']==1)
				{
					show_admin($objConnect);
				}
				else if($row['type']==2) 
				{
					show_user($objConnect);
				}

			}

		}
		else if(isset($_SESSION['username']))
		{	
			echo "<form action='login.php' method='POST'>";			
			echo "<input type='submit' value='logout' />";
			echo "</form>";

				if($_SESSION['type']==1)
				{
					show_admin($objConnect);
					if(isset($_POST['seq']))
		{
			$status = $_POST['status']==='Requested' ? 'On Process' : 'Completed';
			$sql = "UPDATE add_path SET status='$status' WHERE seq='".$_POST['seq']."'";
			mysql_query($sql,$objConnect)or die('sql error');

		}
		if(isset($_POST['username']))
		{
			$sql = "SELECT date_add,time_add,seq,prefix,as_path,status FROM add_path";
			$sql.= " WHERE username='".$_POST['username']."'";
			$query = mysql_query($sql,$objConnect)or die("sql error");
			echo "<table border='1'>";
			echo "<td>Date</td><td>Time</td><td>seq</td><td>Prefix</td><td>AS Path</td><td>Status</td><td>Update Status</td>";
			while ($row = mysql_fetch_assoc($query)) 
			{
				echo "<tr>";
				foreach ($row as $cell) 
					echo "<td>$cell</td>";
				echo "<td><form action='#' method='POST'><input type='submit' value='Update Status'>";
				echo "<input type='hidden' name='seq' value='".$row['seq']."'>";
				echo "<input type='hidden' name='status' value='".$row['status']."'>";;
				echo "<input type='hidden' name='username' value='".$_POST['username']."'></form></td>";
				echo "</tr>";
				//echo var_dump($row);
			}
		}
				}
				else if($_SESSION['type']==2) 
				{
					show_user($objConnect);
				}
		}
		

		function show_admin($objConnect)
		{
			$sql = "SELECT DISTINCT username FROM add_path";
			$query = mysql_query($sql,$objConnect);
			echo "<table border='1'>";
			while($row = mysql_fetch_assoc($query))
			{
				echo "<tr>";
				foreach($row as $cell)
					echo "<td>$cell</td>";
				echo "<form action='#' method='POST'>";
				echo "<td><input type='submit' value='view' /></td>";
				echo "<input type='hidden' name='username' value='$cell' />";
				echo "</form>";
				echo "</tr>";
			}


		}
		function show_user($objConnect)
		{
			echo "<form action='add.php' method='POST'>";
			echo "<input type='submit' value='Add'>";
			echo "</form>";
			$sql = "SELECT prefix,as_path,status FROM add_path WHERE username='".$_SESSION['username']."'";
			$query = mysql_query($sql);
			echo "<table border='1'>";
			echo "<td>prefix</td><td>As path</td><td>status</td>";
			while($row = mysql_fetch_assoc($query))
			{
				echo "<tr>";
				foreach($row as $cell)
					echo "<td>$cell</td>";
				echo "</tr>";
			}
		}
	?>

</body>
</html>