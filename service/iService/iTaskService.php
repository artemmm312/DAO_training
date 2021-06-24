<?php

namespace service\iService;

use db\entity\Task;

interface iTaskService extends iService
{
	public function getTasks();

	public function getTaskById(int $id);

	public function addTask(Task $task);

	public function updateTask(Task $task);

	public function setTaskIsCompleted(int $id, bool $isComleted);

	public function deleteTaskById(int $id);

	public function getTaskByUserID(int $userId);
}
