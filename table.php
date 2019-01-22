<html>
<head>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


<script type="text/javascript">
$(document).ready(function(){
	
	$("#muldelbtn").hide();
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
				var idd=current.parent().parent().attr('id');
				//window.location="index1.php?id="+idd;
				
			}
			
		});
	var jsonobject={
				"delete":array
             }
			$.ajax({
				url:"multipledel.php",
				data:jsonobject,
				method:"POST",
				dataType:"JSON",
				success: function(data){
					alert(data);
					window.location="table.php";
				}
			});
			

	}
});
</script>
</head>
<body>
<div style="background-color:lightblue;">

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



$sql = "SELECT id, firstname, email, address, number, country, Actions  FROM login";
$result = $con->query($sql);

echo "<style type='text/css'>table, th, td {
  border: 1px solid black;
  
}</style><table id='login' align='center' >";


echo "<tr><th><label>Select all</label><input type='checkbox' id='checkAl'></th><th>id</th><th>firstname</th><th>number</th><th>country</th><th>Actions</th></tr>";
while($row = $result->fetch_assoc()) {
	
	echo "<tr id=".$row['id']."><td style='text-align:center'><input type='checkbox' class='checkboxclass'></td><td>".$row["id"]."</td><td>" . $row["firstname"]. "</td>
<td>  " .$row["number"]. "</td><td>  " . $row["country"]. "</td>
<td><a class='abc' href='http://localhost/task/index1.php?id=".$row["id"]."&td=delete'>DELETE</a>
<a class='abc' href='http://localhost/task/index2.php?id=".$row["id"]."&td=view'>view</a>
<a class='abc' href='http://localhost/task/index3.php?id=".$row["id"]."&tv=edit'>EDIT</a></tr>";
    }
echo '<span id="muldelbtn" style="cursor:pointer;color:red;border:1px solid black;font-weight:bolder;">DELETE ALL</span></table>';
?>
</div>
</body>
</html>