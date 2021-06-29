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

	case 'insert':
		$taskController->task->text = $input['addTask_text'];
		$taskController->task->isCompleted = $input['addTask_isCompleted'];
		$taskController->task->createdAt = $input['addTask_createdAt'];
		$taskController->task->userId = $input['addTask_userId'];
		echo $taskController->appendTask();
		break;

	case 'update':
		$taskController->task->id = $input['updateTask_id'];
		$taskController->task->text = $input['updateTask_text'];
		$taskController->task->isCompleted = $input['updateTask_isCompleted'];
		$taskController->task->createdAt = $input['updateTask_createdAt'];
		$taskController->task->userId = $input['updateTask_userId'];
		echo $taskController->renewTask();
		break;

	case 'delete':
		$taskController->id = $input['deleteTask_id'];
		echo $taskController->deleteTask();
		break;

	case 'setTaskIsCompletedById':
		$taskController->id = $input['setTaskCompletion_id'];
		$taskController->isCompleted = $input['setTaskCompletion_isCompleted'];
		echo $taskController->setTaskCompletion();
		break;
}

/* $taskController->id = $input['task_id'];
echo $taskController->showTask(); */