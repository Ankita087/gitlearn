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

echo $name=$_POST['firstname'];
if(strlen($name)<3)
{
	echo "inna chota name";
}	
$sex=$_POST['gender'];
$email=$_POST['emailaddress'];
$telephone=$_POST['usrtel'];
$address=$_POST['address'];
$country=$_POST['country'];
$id=$_POST['id'];


$language='';
$check=0;
if (isset($_POST['HINDI'])) {
    //echo "hindi checked!";
	$language=$language.' Hindi';
	$check=1;
}
if (isset($_POST['ENGLISH'])) {
    //echo "eng checked!";
	$language=$language.' english';
	$check=1;
}
if (isset($_POST['FRENCH'])) {
   // echo "french checked!";
	$language=$language.' french';
	$check=1;
}
echo $language;
if($check==0)
{
	echo "nothing checked";
}
else
{
	echo $language." is checked";
}


//$language=$_POST['HINDI']+$_POST['ENGLISH']+$_POST['FRENCH'];

$sql="update login  set firstname='$name',email='$email',number='$telephone',address='$address',language='$language',gender='$sex',country='$country' where id='$id'";

if($con->query($sql) === TRUE)
{
echo 'Inserted';
}
else
{
echo 'not Inserted';
}
header("refresh:2;url=index.php");

?>