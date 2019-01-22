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
echo "country is ".$country;
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

$sql="INSERT INTO login (firstname,email, number,address,language,gender,country) VALUES('$name','$email','$telephone','$address','$language','$sex','$country')";

if(!mysqli_query($con,$sql))
{
echo 'Not Inserted';
}
else
{
echo 'Inserted';
}
header("refresh:2;url=index.php");
?>