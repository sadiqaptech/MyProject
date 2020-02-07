<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body>

<button id="get">Get Data</button>
<button id="add">Add Data</button>
<hr>
<form id="frm">
	Fullname : <input type="text" id="name">
	<br><br>
	Email : <input type="text" id="email" onChange="checkemail(this.value)">
	<span id="emailerror"></span>
	<br><br>
	Password : <input type="text"  id="password">
	<br><br>
	<input type="button" value="Add Data" id="addbtn">
	<br><br>
</form>
<br><br>
By Name : <input type="text" id="src" >
<button id="btnsrc" onClick="srcdata()">Search</button>
<hr>

<table border="1" width="50%">
	<tr>
		<th>Sr</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Action</th>
	</tr>
	<tbody id="data"></tbody>
	</table>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
	function loaddata(){
		$.ajax({
			url:"data.php",
			type:"GET",
			success:function(data){
				$("#data").html(data);
			}
			
		})
	}
	function adddata(){
		var name=$("#name").val();
		var email=$("#email").val();
		var password=$("#password").val();
		$.ajax({
			url:"adddata.php",
			type:"POST",
			data:{name:name,email:email,password:password,addbtn:"btn"},
			success:function(data){
				if(data==1){
					loaddata();
					$("#frm")[0].reset();
					alert("data added");
				}
				else{
					alert("error");
				}
				
			}
			
		})
	}
	function delete1(id){
		$.ajax({
			url:"adddata.php",
			type:"POST",
			data:{id:id,delbtn:"btn"},
			success:function(data){
				if(data==1){
					loaddata();
					alert("data deleted");
				}
				else{
					alert("error");
				}
				
			}
			
		})
	}	
	function srcdata(){
		var src=$("#src").val();
		$.ajax({
			url:"adddata.php",
			type:"POST",
			data:{src:src,srcbtn:"btn"},
			success:function(data){
				$("#data").html(data);
			}
			
		})
	}
	function checkemail(email){
		$.ajax({
			url:"adddata.php",
			type:"POST",
			data:{email:email,emailbtn:"btn"},
			success:function(data){
				$("#emailerror").html(data);
			}
			
		})
	}
$(document).ready(function(){
	$("#frm").hide();
	$("#get").click(function(){	
		loaddata();
	})
	$("#addbtn").click(function(){	
		adddata();
	})
	$("#add").click(function(){
		$("#frm").toggle();
	})
	$("#src").keyup(function(){
		var src=$(this).val();
		if(src==""){
			loaddata();
		}
	})
})	

</script>


</html>