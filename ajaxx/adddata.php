<?php 
include("config.php");

if(isset($_POST["addbtn"])){
	extract($_POST);
	echo mysqli_query($con,"insert into employee(fullname,email,password) value('$name','$email','$password')");
}
if(isset($_POST["delbtn"])){
	extract($_POST);
	echo mysqli_query($con,"delete from employee where id=$id");
}
if(isset($_POST["srcbtn"])){
	$src=$_POST["src"];
	$res=mysqli_query($con,"select * from employee where fullname like '%$src%'");
	$count=1;
	while($row=mysqli_fetch_assoc($res)){
		?>
		<tr>
		<td><?=$count++;?></td>
			<td><?=$row['fullname'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['password'];?></td>
			<td><button onClick="delete1(<?=$row['id'];?>)">Delete</button></td>
		</tr>
		<?php
			
	}
}
if(isset($_POST["emailbtn"])){
	$src=$_POST["email"];
	$res=mysqli_query($con,"select * from employee where email='$src'");
	if($res->num_rows>0){
		echo "<span style='color:red'>Email Exist</span>";
	}
	else{
		echo "<span style='color:black'>Email Available</span>";
	}
}
?>