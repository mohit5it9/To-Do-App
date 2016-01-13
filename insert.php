<?php
	if(!empty($_POST['details'])){
		$new_task=$_POST['details'];
		$connection=mysql_connect('localhost','root','')or die('Connection Error');
		$db=mysql_select_db('db',$connection) or die('Cannot Select Database');
		mysql_query('CREATE TABLE IF NOT EXISTS to_do (id int NOT NULL AUTO_INCREMENT, task varchar(255) NOT NULL,time TIMESTAMP NOT NULL DEFALUT CURRENT_TIMESTAMP,PRIMARY KEY(id) )');
		$done=mysql_query("INSERT INTO to_do(task) VALUES ('$new_task')") or die ("Not Inserted");
		if($done==1){
			header('location:index.php');
		}
		else{
			echo 'Error';
		}
	}
?>
