

<?php 
	
	$con=mysqli_connect("localhost","root","","sms");
	$res=mysqli_query($con,"select * from employee ");
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
?>
