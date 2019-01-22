<?php
$overall=0;
$con=mysqli_connect('localhost','root','');
if(!$con)
{
//echo 'Not connected to Server';
$overall=1;
}
if(!mysqli_select_db($con,'form'))
{
//echo 'Database not Selected';
$overall=1;
}
for($i=0;$i<sizeof($_POST['delete']);$i++)
{
$todelete=$_POST['delete'][$i];
$sql = "delete from  login where id='$todelete' ";
$success=mysqli_query($con,$sql);
if(!$success)
$overall=1;
}
if($overall==1)
{
echo "some error occured";
}

?>




