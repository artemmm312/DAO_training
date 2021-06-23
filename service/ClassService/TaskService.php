<?php

namespace service\ClassService;

use db\entity\Task;
use db\DAO\Implementation\TaskDAO;
use service\iService\iTaskService;

class TaskService implements iTaskService
{
	private $taskDAO;

	public function __construct()
	{
		$this->taskDAO = new TaskDAO();
	}

	function getAll()
	{
		return $this->taskDAO->getAll();

	}

	function getById(int $id)
	{
		return $this->taskDAO->getById($id);
	}

	function add(Task $task)
	{
		return $this->taskDAO->insert($task);
	}

	function setIsCompleted(int $id, bool $isCompleted)
	{
		return $this->taskDAO->setIsCompletedById($id, $isCompleted);
	}

	function deleteById(int $id)
	{
		return $this->taskDAO->deleteById($id);
	}
}