<?php include("connection.php");
error_reporting(0);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Machine Task</title>
</head>
<body>
		<form action="#" method="POST"  enctype="multipart/form-data">

     <div class="input_field">
      <label>Name</label>
      <input type="text" class="input" name="name" autocomplete="off">
    </div><br>

    <div class="hobbies">
      <label>Hobbies</label><br><br>
      <label for="hobbies"> Singing</label>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Singing"><br>
       <label for="hobbies"> Travelling</label>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Travelling"><br>
      <label for="hobbies"> Reading</label>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Reading"><br>
     
    </div>
    <br>

    <div class="input_field">
      <label>Upload Image</label>
      <input type="file" class="input" name="uploadfile">
    </div>

    <div class="input_field">
     <input type="submit" value="submit" name="submit">
   </div>
 </form>
</body>
</html>


<?php


if(isset($_POST['submit']))
{

  $name=$_POST['name'];
  $hobbies=$_POST['hobbies'];
  $hobbies1=implode(",",$hobbies);
  $filename=$_FILES["uploadfile"]["name"];
  $tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder="users/".$filename;
  move_uploaded_file($tempname,$folder);
  $query="INSERT INTO user_records(name,hobbies,image) values('$name','$hobbies1','$folder')";
  $data=mysqli_query($conn,$query);
  if($data)
  {
   echo "data inserted into database";
   header('Location:display.php');
  }
  else
  {
    echo "failed";
  }
}
?> 