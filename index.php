<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div id='request'>
		<form name="Tasks" method="post">
			<label>Введите ID задачи:</label><br />
			<input type="int" name="task_id" placeholder="" maxlength="4" /><br />
			<input type="submit" name="done" value="Показать" />
		</form>
	</div>
	<?php
	require_once __DIR__ . '/vendor/autoload.php';

	use db\DAO\Implementation\TaskDAO;
	use db\entity\Task;
	use db\entity\User;
	use db\DAO\Implementation\UserDAO;
	use service\ClassService\TaskService;
	use db\Controllers\TaskController;


	$taskController = new TaskController($_POST["task_id"]);
	var_dump($taskController->getTask());
	$task = $taskController->getTask();
	//var_dump($taskController->getTasks());

	?>
	<table border='1' cellspacing='0' width='50%'>

		<?php foreach ($task as $key => $value) : ?>
			<tr>
				<?php foreach ($value as $data) : ?>
					<td>
						<?= $data ?>
					</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>
	</table>
</body>

</html>