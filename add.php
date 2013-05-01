<!doctype html>
<html>
<head>
	<title>tot</title>
</head>
<body>
	<form action="login.php" method="POST">
		<input type="submit" value="logout" />
	</form>
	<form action="#" method="POST">
	<table width="672" border="0">
  		<tr>
		    <td width="87"><span class="style3">AS Path :</span></td>
		    <td width="308"><input name="as_path" type="text"/></td>
		    <td width="263"><span class="style4"><span class="style8">Ex.</span> ^(3405_)+(32850_)+$</span></td>
  		</tr>
  		<tr>
    		<td><span>Prefix1 :</span></td>
		    <td><input type="text" name="prefix[]"></input></td>
		    <td><p class="style4"><span class="style8">Ex.</span> 200.25.125.0/24</p>
	      	<p class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;202.25.178.0/24</p>
	 	</tr>
	 	<tr>
    		<td><span>Prefix2 :</span></td>
		    <td><input type="text" name="prefix[]"></input></td>
		</tr>
		<tr>
    		<td><span>Prefix3 :</span></td>
		    <td><input type="text" name="prefix[]"></input></td>
		</tr>
		<tr>
    		<td><span>Prefix4 :</span></td>
		    <td><input type="text" name="prefix[]"></input></td>
		</tr>
	 	<tr>
	 		<td></td>
	 		<td><input type="submit" value="Add"/></td>
	 	</tr>
	</form>
	<?php
	require ('config.php');
	session_start();
	max_seq($objConnect);
	if(isset($_POST['as_path'])&&isset($_POST['prefix']))
	{
		if(!empty($_POST['as_path'])&&!empty($_POST['prefix']))
		{
			add_data($_POST['as_path'],$_POST['prefix'],$objConnect);
			echo "<script> window.location='view.php'; </script>";
		}
		else
		{
			echo "No data plase add";
		}

	}
	function add_data($as_path,$prefix,$objConnect)
	{	
		$date_add = date('d/m/y');
		$time_add = date('H:i:s',strtotime("+5 hours"));
		
		for($i=0;$i<sizeof($prefix);$i++)
		{	
			$max_seq = max_seq($objConnect);
			$sql = "INSERT INTO add_path (date_add,time_add,seq,prefix,as_path,status,username)";
			$sql.= "VALUES ('$date_add','$time_add','$max_seq','$prefix[$i]','$as_path','Requested','".$_SESSION['username']."')";
			mysql_query($sql,$objConnect)or die("sql error");

		}

	}

	function max_seq($objConnect)
	{
		$sql = "SELECT MAX(seq) as max_seq FROM add_path";
		$query = mysql_query($sql,$objConnect);
		$row = mysql_fetch_assoc($query);
		$max_seq = $row["max_seq"];
		$max_seq +=100;
		return $max_seq;

	}
	?>
</body>
</html>