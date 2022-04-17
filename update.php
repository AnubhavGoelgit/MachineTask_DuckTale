<?php
include("connection.php");
error_reporting(0);

$id=$_GET['id'];

$q1="select * from user_records where id=$id";
$sql=mysqli_query($conn,$q1);
$row=mysqli_fetch_assoc($sql);
$hobby=$row['hobbies'];
$hobby1=explode(",",$hobby);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Task-edit</title>
</head>
<body>
    <form action="#" method="GET"  enctype="multipart/form-data">
      <input type="hidden" id="hiddenvalue" name="hiddenvalue" value="<?php echo $row['id']; ?>">
     <div class="input_field">
      <label>Name</label>
      <input type="text" class="input" name="name" value="<?php echo $row['name']; ?>" autocomplete="off">
    </div><br>

    <div class="hobbies">
      <label>Hobbies</label><br><br>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Singing"
      <?php
      if(in_array(Singing,$hobby1))
      {
        echo "checked";
      }
      ?> 
      >
      <label for="hobbies"> Singing</label><br>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Travelling"
       <?php
      if(in_array(Travelling,$hobby1))
      {
        echo "checked";
      }
      ?> 
      >
      <label for="hobbies"> Travelling</label><br>
      <input type="checkbox" id="hobbies" name="hobbies[]" value="Reading"
       <?php
      if(in_array(Reading,$hobby1))
      {
        echo "checked";
      }
      ?> >
      <label for="hobbies"> Reading</label><br><br>
    </div>

    <div class="input_field">
      <label>Upload Image</label>
      <input type="file" class="input" name="uploadfile">
      <img src="<?php echo $row['image'];?>" width="50px" >
    </div>

    <div class="input_field">
     <input type="submit" value="submit" name="submit">
   </div>
 </form>

</body>
</html>
<?php


if(isset($_GET['submit']))
{  
  $id=$_GET['hiddenvalue'];
	$name=$_GET['name'];
	$hobbies=$_GET['hobbies'];	
  $hobbies1=implode(",",$hobbies);
  $query="UPDATE `user_records` SET `name`='$name',hobbies='$hobbies1' WHERE id=$id";
  $data=mysqli_query($conn,$query);
if($data)
{
  echo '<script>alert("Record Updated")</script>';
?>

 <META HTTP-EQUIV="Refresh" CONTENT="0 ;URL=http://localhost/MachineTask_DuckTale/display.php">
<?php
}
else
{
	echo "failed to update record";
}

}

?>























