<?php
	$delete=$_POST['task_id'];
	$connection=mysql_connect('localhost','root','')or die('Connection Error');
	$db=mysql_select_db('db',$connection) or die('Cannot Select Database');
	mysql_query('CREATE TABLE IF NOT EXISTS to_do (id int NOT NULL AUTO_INCREMENT, task varchar(255) NOT NULL,time TIMESTAMP NOT NULL DEFALUT CURRENT_TIMESTAMP,PRIMARY KEY(id) )');
	mysql_query("DELETE from to_do where id ='$delete'");
	mysql_close($connection);
?>
