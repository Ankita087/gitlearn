
<?php
$con=mysqli_connect('localhost','root','');
if(!$con)
{
echo 'Not connected to Server';
}
if(!mysqli_select_db($con,'form'))
{
echo 'Database not Selected';
}


if(isset($_POST['submit'])&& $_POST['submit']!="")
{
$name=$_POST['name'];
$address=$_POST['address'];
$mobile=$_POST['mobile'];

$sql="INSERT INTO user (name,address, mobile) VALUES('$name','$address','$mobile')";

if(mysqli_query($con,$sql))
{

echo 'Inserted';
}
else
{
echo 'Not Inserted';
}

}

if(isset($_GET['tv'])&& $_GET['tv']=="edit")
{


?>

<form name="test" id="test" method="post" action="home.php">
name:<input type="input" name="name" id="name" value="<?php echo $_GET['name'];  ?>"/><br>
address:<input type="input" name="address" id="address" value="<?php echo $_GET['address'];  ?>" /><br>
mobile:<input type="input" name="mobile" id="mobile" value="<?php echo $_GET['mobile'];  ?>"/><br>
<input type="submit" value="update" name="update">

</form>
<?php

}
else
{

?>




<form name="test" id="test" method="post" action="home.php">
name:<input type="input" name="name" id="name" /><br>
address:<input type="input" name="address" id="address" /><br>
mobile:<input type="input" name="mobile" id="mobile" /><br>
<input type="submit" value="submit" name="submit">

</form>

<?php

}

$sql = "SELECT * FROM user";
$result = $con->query($sql);

echo "<style type='text/css'>table, th, td {
  border: 1px solid black;
  
}</style><table id='login' >";


echo "<tr><th>id</th><th>name</th><th>address</th><th>mobile</th><th></th></tr>";
while($row = $result->fetch_assoc()) {
	
	echo "<tr id=".$row['id']."><td>".$row["id"]."</td><td>" . $row["name"]. "</td><td> " . $row["address"].  "</td>
<td>  " . $row["mobile"]. "</td><td><a class='abc' href='http://localhost/task/home.php?id=".$row["id"]."&td=delete'>DELETE</a>
<a class='abc' href='http://localhost/task/home.php?id=".$row["id"]."&tv=edit'>EDIT</a></tr>";
    }
	
echo "</table>";
?>




















