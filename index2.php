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
$sql ="select * from login where id='$zz' ";
$result = $con->query($sql);
echo "<style>#header{text-align:center;color:red;border-bottom:1px solid blue; margin-left:20px;} td{text-align:center;border:1px solid black;}</style>
<table><tr><td id='header'>ID  </td><td id='header'>  FIRSTNAME</td><td id='header'>EMAIL</td><td id='header'> ADDRESS</td><td id='header'> NUMBER</td><td id='header'> COUNTRY</td><td id='header'> GENDER</td><td id='header'> LANGUAGE</td></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row['id']."</td><td>".$row['firstname']."</td><td>".$row['email']."</td><td>".$row['address']."</td><td>".$row['number']."</td><td>".$row['country']."</td><td>".$row['gender']."</td><td>".$row['language']."</td></tr></table>";
}
?>