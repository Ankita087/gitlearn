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

if(isset($_POST['Submit'])&& $_POST['Submit']!="" && $_get['tv']!='edit')
{
	

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
echo $sex=$_POST['gender'];
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

	
}



?>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>



<html>
<head>
<title>FORM</title>
<center>FORM</center>
<br>
</head>
<style>

input[type=text],input[type=email], input[type=tel], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.errors{
color:red;
}
</style>
<script type="text/javascript">
function onLoadFunction()
{
$("#muldelbtn").hide();
document.getElementById("nerror").style.display = 'none';
document.getElementById("merror").style.display = 'none';
document.getElementById("gerror").style.display = 'none';
document.getElementById("aerror").style.display = 'none';
document.getElementById("terror").style.display = 'none';
document.getElementById("cerror").style.display = 'none';
document.getElementById("lerror").style.display="none";
}

function validateForm() {


var error=0;
  var firstname = document.forms["myform"]["firstname"].value;
  if (firstname == "") {
    //alert("Name must be filled out");
	document.getElementById("nerror").style.display = 'block';
	error=1;
    //return false;
  }
  else{
  document.getElementById("nerror").style.display = 'none';
  }
   var address = document.forms["myform"]["address"].value;
  if (address == "") {
    document.getElementById("aerror").style.display="block";
	error=1;
    //return false;
	}
	else{
  document.getElementById("aerror").style.display = 'none';
  }
	 var emailaddress = document.forms["myform"]["emailaddress"].value;
  if (emailaddress == "") {
   
	document.getElementById("merror").style.display = 'block';
  //  e.preventDefault();
	//return false;
	error=1;
  }
  else{
  document.getElementById("merror").style.display = 'none';
  }
  
  	 var usrtel = document.forms["myform"]["usrtel"].value;
  if (usrtel == "") {
   //alert(usrtel);
	document.getElementById("terror").style.display = 'block';
  //  e.preventDefault();
	//return false;
	error=1;
  }
  else{
//alert(usrtel);
  document.getElementById("terror").style.display = 'none';
  }
  
  var gender = document.forms["myform"]["gender"].value;

    if (gender!="male" && gender!="female") {
   //alert("i am here");
    document.getElementById("gerror").style.display = 'block';
  //  e.preventDefault();
	//return false;
   error=1;
    }
  else{
  	document.getElementById("gerror").style.display = 'none';
  }
  
 var language='';
 if(document.getElementById("hindi").checked)
 {
 language=language.concat(" hindi");
 }
 if(document.getElementById("english").checked)
 {
 language=language.concat(" english");
 }
 if(document.getElementById("french").checked)
 {
 language=language.concat(" french");
 }
 //alert(language);
 if(language=="")
 {
 error=1;
 document.getElementById("lerror").style.display="block";
 }
 else
 {
 	document.getElementById("lerror").style.display = 'none';
 }
    if(error==1)
  return false;
  

  else
  {
  }
}

$(document).on('click','.abc',function(){
	console.log(this);
var idOfRow=($(this).parent().parent().attr('id'));
document.cookie = "myJavascriptVar = " + idOfRow;



var abc;
 
<?php
/*
     $myPhpVar= $_COOKIE['myJavascriptVar'];
	 //echo $myPhpVar;
	 
	 $con=mysqli_connect('localhost','root','');
if(!$con)
{
//echo 'Not connected to Server';
}
if(!mysqli_select_db($con,'form'))
{
//echo 'Database not Selected';
}

$sql = "SELECT id, firstname, email, address, number, country, Actions  FROM login where id='$myPhpVar'";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
	
echo "<script type='text/javascript'>console.log('".$row['firstname']."')</script>";
    }
	*/ 
?> 

});
$(document).on('click','#checkAl',function(){
$('.checkboxclass').not(this).prop('checked', this.checked);

var check=$('body').find('.checkboxclass:checked').length;
console.log(check);
if(check>0)
$("#muldelbtn").show();
else
{
$("#muldelbtn").hide();
}

});

$(document).on('click','.checkboxclass',function(){

var check=$('body').find('.checkboxclass:checked').length;
console.log(check);

if(check>0)
$("#muldelbtn").show();
else
{
$("#muldelbtn").hide();
}


});
$(document).on('click','#muldelbtn',function(){
clickhandler();
});

function clickhandler()
{
var array=[];
$(".checkboxclass").each(function(){
var current=$(this);
if(current.is(":checked")){
array.push(current.parent().parent().attr('id'));
}
});
console.log(array);
}

</script>







<body onLoad="onLoadFunction()" >
<div id=”wrapper” style="background-color:grey">
 <?php if(isset($_GET['tv'])&&$_GET['tv']=="edit") { 

$sql = "SELECT id, firstname, email, address, number, country, Actions  FROM login where id='".$_GET['id']."'";
$result = $con->query($sql);





?>
<form name="myform" action="insert.php" onsubmit="return validateForm()" method="post">
<center>

<label id=”label”>Name</label>
<input type="text" name="firstname" value="">
<span id="nerror" class="errors">please enter name</span>
<br><br>
 
 <label id=”label”>Email</label>
 <input type="email" name="emailaddress"><br><br>
 <span id="merror" class="errors">please enter email</span>

<label id=”label”  >COUNTRY</label><select name="country">
  <option value="INDIA">INDIA</option>
  <option value="PAKISTAN">PAKISTAN</option>
  <option value="NEPAL">NEPAL</option>
  <option value="CHINA">CHINA</option>
</select>
<br> 
<span id="cerror">please select country</span>
<br>

<span id="gerror" class="errors">please select gender</span>

<label id=”label”>GENDER</label><br>
<input type="radio" name="gender" value="male"> Male
<br>

<input type="radio" name="gender" value="female"> Female<br><br>

<label id=”label”>ADDRESS</label><br>
<textarea name="address" rows="4" cols="182"></textarea><br><br>
<span id="aerror" class="errors">please enter addrress</span>

<label id=”label”>TELEPHONE</label><input type="tel" name="usrtel"><br><br>
<span id="terror" class="errors">please enter telephone</span>


<label id=”label”>LANGUAGE</label><br>
<input type="checkbox" name="HINDI" value="HINDI" id="hindi"> HINDI
<input type="checkbox" name="ENGLISH" value="ENGLISH" id="english"> ENGLISH
<input type="checkbox" name="FRENCH" value="FRENCH" id="french" > FRENCH<br>
<span id="lerror" class="errors">please Select known languages</span>
 <input type="submit" value="Submit" onClick="validateForm()">
 
</center>
</form>



<?php } else {  ?>
<form name="myform" action="insert.php" onsubmit="return validateForm()" method="post">
<center>

<label id=”label”>Name</label>
<input type="text" name="firstname" value="test1234">
<span id="nerror" class="errors">please enter name</span>
<br><br>
 
 <label id=”label”>Email</label>
 <input type="email" name="emailaddress"><br><br>
 <span id="merror" class="errors">please enter email</span>

<label id=”label”  >COUNTRY</label><select name="country">
  <option value="INDIA">INDIA</option>
  <option value="PAKISTAN">PAKISTAN</option>
  <option value="NEPAL">NEPAL</option>
  <option value="CHINA">CHINA</option>
</select>
<br> 
<span id="cerror">please select country</span>
<br>

<span id="gerror" class="errors">please select gender</span>

<label id=”label”>GENDER</label><br>
<input type="radio" name="gender" value="male"> Male
<br>

<input type="radio" name="gender" value="female"> Female<br><br>

<label id=”label”>ADDRESS</label><br>
<textarea name="address" rows="4" cols="182"></textarea><br><br>
<span id="aerror" class="errors">please enter addrress</span>

<label id=”label”>TELEPHONE</label><input type="tel" name="usrtel"><br><br>
<span id="terror" class="errors">please enter telephone</span>


<label id=”label”>LANGUAGE</label><br>
<input type="checkbox" name="HINDI" value="HINDI" id="hindi"> HINDI
<input type="checkbox" name="ENGLISH" value="ENGLISH" id="english"> ENGLISH
<input type="checkbox" name="FRENCH" value="FRENCH" id="french" > FRENCH<br>
<span id="lerror" class="errors">please Select known languages</span>
 <input type="submit" value="Submit" >
 
</center>
</form>
<?php }?>
</div>
</body>

</html>