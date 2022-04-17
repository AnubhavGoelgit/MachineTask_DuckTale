
<html>
<head>
	<title>display data</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!--  <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
	
	<table border="4" cellspacing="7">

		<tr>
			<th>Name</th>
			<th>Hobbies</th>
			<th>Image</th>
			<th colspan="2" align="center">Action</th>
		</tr>

		<style type="text/css">
			
			#edbtn
			{
				background-color: green;
				color: white;
				font-weight: bold;
				cursor: pointer;
			}
			#dbtn
			{
				background-color:red;
				color: white;
				font-weight: bold;
				cursor: pointer;
			}
		</style>

	</body>
	</html>

	<?php

	include("connection.php");
	error_reporting(0);
	$query="select *from user_records";
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);

	if($total!=0)
	{
		
		while($result=mysqli_fetch_assoc($data))
		{
			echo"
			<tr>
			
			<td>".$result['name']."</td>
			<td>".$result['hobbies']."</td>
			<td><img src='".$result['image']."' height='50' width='50'>"."</td>
			<td><a href= 'update.php?id=$result[id]'><input type='submit' value='Edit/update' id='edbtn'></td>
			<td><a href= 'delete.php?id=$result[id]' onclick='return checkdelete()'><input type='submit' value='Delete'id='dbtn' ></td>
			</tr>
			";
		}
	}
	else
	{
		echo "no record found";
	}

	?>

</table>
<script>
	function checkdelete()
	{
		return confirm('Are You Sure you want to delete this record');
	}
</script>
</body>
</html>




<!-- 
value="<?php echo $row['id']; ?>" -->