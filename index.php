<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div id='Task'>
		<form name="Task" method="post">
			<label>Показать задачу по ID
				(Введите ID задачи):</label><br />
			<input type="int" name="task_id" placeholder="Введите ID задачи" maxlength="3" /><br />
			<input type="submit" name="done_Task" value="Показать задачу" />
		</form>
	</div>
	<div id='Tasks'>
		<form name="Tasks" method="post">
			<label>Показать все задачи</label><br />
				<input type="submit" name="done_Tasks" value="Показать задачи" />
		</form>
	</div>
	<div id=' addTask'>
		<form name="addTask" method="post">
			<label>Добавить задачу</label><br />
			<input type="int" name="task_id" placeholder="Введите ID задачи" maxlength="3" /><br />
			<input type="string" name="task_text" placeholder="Введите текст задачи" maxlength="120" /><br />
			<input type="bool" name="task_isCompleted" placeholder="Задача выполнена (true/false)" maxlength="5" /><br />
			<input type="int" name="task_createdAt" placeholder="Введите дату год-месяц-число" maxlength="21" /><br />
			<input type="int" name="task_userId" placeholder="Введите ID пользователя для этой задачи" maxlength="3" /><br />
				<input type="submit" name="done_Tasks" value="Показать задачи" />
		</form>
	</div>
	<?php
	require_once __DIR__ . '/vendor/autoload.php';

	use db\Controllers\TaskController;

/* 	$taskController = new TaskController();
	$taskController->id = $_POST["task_id"];
	var_dump($taskController->showTask()); */
	?>
</body>

</html>