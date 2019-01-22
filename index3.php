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

<?php 
$name;
$email;
$address;
$number;
 $zz= $_GET["id"]; 

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
while($row=$result->fetch_assoc())
{
$name=$row['firstname'];
$email=$row['email'];
$address=$row['address'];
$number=$row['number'];
$language=$row['language'];
$gender=$row['gender'];
$id=$row['id'];


}




	

?>


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
   
	document.getElementById("terror").style.display = 'block';
  //  e.preventDefault();
	//return false;
	error=1;
  }
  else{
  document.getElementById("terror").style.display = 'none';
  }
  
  var gender = document.forms["myform"]["gender"].value;
	//alert(gender);
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
 
 
});
</script>







<body onLoad="onLoadFunction()" >
<div id=”wrapper” style="background-color:grey">

<form name="myform" action="update.php" onsubmit="return validateForm()" method="post">
<center>
<input type="hidden" value=<?php echo $id ?> name="id">
<label id=”label”>Name</label>
<input type="text" name="firstname" value=<?php echo $name  ?>>
<span id="nerror" class="errors">please enter name</span>
<br><br>
 
 <label id=”label”>Email</label>
 <input type="email" name="emailaddress" value=<?php echo $email  ?>><br><br>
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
<input type="radio" name="gender" value="male" id="male" <?php if($gender=="male"){ echo "checked";} ?>> Male
<br>

<input type="radio" name="gender" value="female" id="female" <?php if($gender=="female"){ echo "checked";} ?>> Female<br><br>

<label id=”label”>ADDRESS</label><br>
<textarea name="address" rows="4" cols="182"><?php echo $address ?></textarea><br><br>
<span id="aerror" class="errors">please enter addrress</span>

<label id=”label”>TELEPHONE</label><input type="tel" name="usrtel" value=<?php echo $number  ?>><br><br>
<span id="terror" class="errors">please enter telephone</span>


<label id=”label”>LANGUAGE</label><br>
<input type="checkbox" name="HINDI" value="HINDI" id="hindi" <?php if(strpos($language,"Hindi")){ echo "checked";} ?>> HINDI
<input type="checkbox" name="ENGLISH" value="ENGLISH" id="english" <?php if(strpos($language,"english")){ echo "checked";} ?> > ENGLISH
<input type="checkbox" name="FRENCH" value="FRENCH" id="french" > FRENCH <?php if(strpos($language,"french")){ echo "checked";} ?><br>
<span id="lerror" class="errors">please Select known languages</span>
 <input type="submit" value="Submit">
 
</center>
</form>


</body>

</html>