<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/app.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/app.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div id="container">
	<div class="panel panel-default col-md-4 col-md-offset-4">
		<div class="panel-body">
			<table class="table table-todo">
				<thead>
					<tr>
						<th>Task</th>
						<th>Date</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="3"><input type="name" class="input-add-todo" id="todo-input"></td>
					</tr>
					<tr>
						<?php foreach($result as $data) {
							echo '<tr><td><span class="task-todo" id="task-'. $data->id .'">'. $data->task . '</span><span class="edit-todo" id="'. $data->id .'" onclick="edit(this.id)">edit</span><span class="delete-todo" id="delete-'. $data->id .'" data-delete="'. $data->id .'" onclick="hapus(this)">delete</span></td><td>'. $data->date.'</td><td>'. $data->time .'</td></tr>';
						}
						?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>