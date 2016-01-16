<?php
	if(!empty($_POST['task'])){
		$new_task=$_POST['task'];
		$connection=mysql_connect('localhost','root','')or die('Connection Error');
		$db=mysql_select_db('db',$connection) or die('Cannot Select Database');
		mysql_query('CREATE TABLE IF NOT EXISTS to_do (id int NOT NULL AUTO_INCREMENT, task varchar(255) NOT NULL,time TIMESTAMP NOT NULL DEFALUT CURRENT_TIMESTAMP,PRIMARY KEY(id) )');
		mysql_query("INSERT INTO to_do(task) VALUES ('$new_task')") or die ("Not Inserted");
		$query=mysql_query("Select * from to_do where task='$new_task'");
		while($row=mysql_fetch_assoc($query)){
			$new_task_details=$row['task'];
			$new_task_time=$row['time'];
			$new_task_id=$row['id'];
		}
		mysql_close();
		echo '<tr class="row_details"><td>'.$new_task_id.'</td><td>'.$new_task_details.'</td><td>'.$new_task_time.'</td><td><button class="delete_button" id='.$new_task_id.'>Delete</button></td></tr>';
	}
?>
