<?php

namespace service\iService;

use db\entity\Task;

interface iTaskService extends iService
{
	public function getAll();
	public function getById(int $id);
	public function add(Task $task);
	public function setIsCompleted(int $id, bool $isComleted);
	public function deleteById(int $id);
}
