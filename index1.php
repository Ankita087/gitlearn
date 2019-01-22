<?php $zz= $_GET["id"]; 

$con=mysqli_connect('localhost','root','');
if(!$con)
{
echo 'Not connected to Server';
}
if(!mysqli_select_db($con,'form'))
{
echo 'Database not Selected';
}
$sql = "delete from  login where id='$zz' ";
$success=mysqli_query($con,$sql);
header("Location: table.php");
?>