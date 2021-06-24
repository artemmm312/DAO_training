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

	function getTasks()
	{
		return $this->taskDAO->getAll();
	}

	function getTaskById(int $id)
	{
		return $this->taskDAO->getById($id);
	}

	function addTask(Task $task)
	{
		return $this->taskDAO->insert($task);
	}

	function updateTask(Task $task)
	{
		return $this->taskDAO->update($task);
	}

	function setTaskIsCompleted(int $id, bool $isCompleted)
	{
		return $this->taskDAO->setIsCompletedById($id, $isCompleted);
	}

	function deleteTaskById(int $id)
	{
		return $this->taskDAO->deleteById($id);
	}

	function getTaskByUserID(int $userId)
	{
		return $this->taskDAO->getByUserId($userId);
	}
}
