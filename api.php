<?php

require_once __DIR__ . '/vendor/autoload.php';

use db\Controllers\TaskController;

$taskController = new TaskController();
$input = json_decode(file_get_contents("php://input"), true);

switch ($input['action'])
{
	case 'getById':
		$taskController->id = $input['task_id'];
		echo ($taskController->showTask());
		break;
	case 'getAll':
		echo ($taskController->showTasks());
		break;
}
/* $taskController->id = $input['task_id'];
echo $taskController->showTask(); */