<?php
	$uri=$_SERVER['REQUEST_URI'];
	$uri=explode('?',$uri);
	$keyword=$uri[1];
	$keyword=explode('=',$keyword);
	$delete=$keyword[0];
	$delete=str_replace('+', ' ', $delete);
	$connection=mysql_connect('localhost','root','')or die('Connection Error');
	$db=mysql_select_db('db',$connection) or die('Cannot Select Database');
	mysql_query('CREATE TABLE IF NOT EXISTS to_do (id int NOT NULL AUTO_INCREMENT, task varchar(255) NOT NULL,time TIMESTAMP NOT NULL DEFALUT CURRENT_TIMESTAMP,PRIMARY KEY(id) )');
	$done=mysql_query("DELETE from to_do where task ='$delete'");
	if($done==1){
		header("location:index.php");
	}
	else{
		echo "Error in Deleting";
	}
	mysql_close($connection);
?>
