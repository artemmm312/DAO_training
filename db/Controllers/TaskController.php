<?php

namespace db\Controllers;

use service\ClassService\TaskService;
use db\entity\Task;

class TaskController
{
	public $taskService;
	public $id;
	public $isCompleted;
	public $userId;
	public $task;

	public function __construct()
	{
		$this->taskService = new TaskService();
		$this->task = new Task();
	}

	function showTask()
	{
		return $this->taskService->getTaskById($this->id);
	}

	function showTasks()
	{
		return $this->taskService->getTasks();
	}

	function appendTask()
	{
		return $this->taskService->addTask($this->task);
	}

	function renewTask()
	{
		return $this->taskService->updateTask($this->task);
	}

	function setTaskCompletion()
	{
		return $this->taskService->setTaskIsCompleted($this->id, $this->isCompleted);
	}

	function deleteTask()
	{
		return $this->taskService->deleteTaskById($this->id);
	}

	function showTaskByUser()
	{
		return $this->taskService->getTaskByUserID($this->userId);
	}
}
