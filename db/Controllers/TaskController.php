<?php

namespace db\Controllers;

use service\ClassService\TaskService;

class TaskController
{
	public $taskService;
	public $id;

	public function __construct($id = null)
	{
		$this->taskService = new TaskService();
		$this->id = $id;
		
	}

	function getTask()
	{
		return $this->taskService->getById($this->id);
	}

	function getTasks()
	{
		return $this->taskService->getAll();
	}
}
