<!DOCTYPE html>
<html>
	<body>
		<table border='1'>
			<tr>
				<th> ID </th>
				<th> Task </th>
				<th> Date </th>
			</tr>
			<?php 
				$connection=mysql_connect("localhost","root","");
				$db=mysql_select_db("db",$connection);
				$table_contents=mysql_query("SELECT * from to_do order by time DESC");
				while($row=mysql_fetch_assoc($table_contents)){?>
					<tr class="row_details" >
						<td> <?php echo $row['id'];?> </td>
						<td> <?php echo $row['task'];?> </td>
						<td> <?php echo $row['time'];?> </td>
						<td> <button class='delete_button' id="<?php echo $row['id'];?>"> Delete </button> </td>
					</tr>
				<?php } ?>
		</table><br>
		Enter New Task: <input type="text" class="form_value"><input type="submit" class="form_submit" value="Add">
	</body>
</html>
<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript">
	$('.delete_button').click(function(){
		current_element=$(this);
		task_to_be_deleted_id=$(this).attr('id');
		$.post('delete.php',{task_id:task_to_be_deleted_id},function(){
			current_element.parent().parent().fadeOut("slow",function(){
				$(this).remove();
			});
		})
	})
	$('.form_submit').click(function(){
		new_task_value=$('.form_value').val();
		if(new_task_value!=''){
			$.post('insert.php',{task:new_task_value},function(data){
				$('.row_details').first().before(data).hide().fadeIn();
			});
		}
		//return false; // if form submitted twice then do this
		//x='<tr class="row_details"><td>'+x+'</td><td>'+new Date() +'</td></tr>';
		//$('.row_details').last().after(x);
	})
</script>
