<!DOCTYPE html>
<html>
	<head>
		<title>
			To-Do App
		</title>
	</head>
	<body>
		<table  border='1' style="border:2px solid grey;width:80%;margin-left:auto;margin-right:auto">
			<tr>
				<th>ID</th>
				<th>Task</th>
				<th>Time Stamp</th>
			</tr>
			<?php 
				$connection=mysql_connect('localhost','root','')or die('Connection Error');
				$db=mysql_select_db('db',$connection) or die('Cannot Select Database');
				mysql_query('CREATE TABLE IF NOT EXISTS to_do (id int NOT NULL AUTO_INCREMENT, task varchar(255) NOT NULL,time TIMESTAMP NOT NULL DEFALUT CURRENT_TIMESTAMP,PRIMARY KEY(id) )');
				$query=mysql_query("select * from to_do ",$connection);
			   while($row=mysql_fetch_assoc($query)) { ?>
					<tr>
						<td style="width:15%;text-align:center"><?php echo $row['id'];?></td>
						<td style="width:25%;text-align:center"><?php echo $row['task'];?></td>
						<td style="width:30%;"><?php echo $row['time'];?><form action="delete.php" method="get"><input name="<?php echo $row['task']?>" type="submit" value="Delete"></form></td>
					</tr>
			<?php } ?>
		</table>
		<hr>
		<form action="insert.php">
  			New Task Description: <input type="text" id="details" name="details" placeholder='Enter your new To-Do'><br>
  			<input type="submit" value="Submit">
		</form>
	</body>
</html>
