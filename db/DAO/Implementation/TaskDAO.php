<?php

namespace db\DAO\Implementation;

use db\DAO\iClassDAO\iTaskDAO;
use db\entity\Task;
use db\Connection\Connection;

class TaskDAO implements iTaskDAO
{
	private $connection;

	public function __construct()
	{
		$this->connection = Connection::getInstance();
	}

	function getById($id)
	{
		$result = $this->connection
			->pdo
			->query("SELECT * FROM task WHERE id = $id")
			->fetchAll();
		return count($result) > 0 ? new Task(
			$result[0]['id'], 
			$result[0]['text'], 
			$result[0]['isCompleted'], 
			$result[0]['createdAt'],
			$result[0]['user_id']
		) : null;
	}

	function getAll()
	{
		$result = $this->connection
			->pdo
			->query("SELECT * FROM task")
			->fetchAll();
		$tasks = [];
		foreach ($result as $row) {
			$tasks[] = new Task($row['id'], $row['text'], $row['isCompleted'], $row['createdAt'], $row['user_id']);
		}
		return $tasks;
	}

	function insert($task)
	{
		$this->connection->pdo->query("
			INSERT INTO task (`text`, isCompleted, createdAt, user_id) VALUES
			('$task->text', '$task->isCompleted', '$task->createdAt', '$task->userId')
		");
		return json_encode("Задача добавлена!");
	}

	function update($task)
	{
		$this->connection->pdo->query("
			UPDATE task SET
				`text` = '$task->text',
				isCompleted = '$task->isCompleted',
				createdAt = '$task->createdAt',
				user_id = '$task->userId'
			WHERE id = '$task->id'
		");
		return json_encode("Задача c ID '$task->id'обнавлена");
	}

	function deleteById($id)
	{
		$this->connection
			->pdo
			->query("DELETE FROM task WHERE id = '$id'");
			return json_encode("Задача с ID '$id' удалена");
	}

	function setIsCompletedById($id, $isCompleted)
	{
		$this->connection
			->pdo
			->query("UPDATE task SET isCompleted = '$isCompleted' WHERE id= '$id'");
	}

	function getByUserId($userId)
	{
		$result = $this->connection
			->pdo
			->query("SELECT * FROM task WHERE `user_id` = '$userId'")
			->fetchAll();
		$tasks = [];
		foreach ($result as $row) {
			$tasks[] = new Task($row['id'], $row['text'], $row['isCompleted'], $row['createdAt'], $row['user_id']);
		}
		return $tasks;
	}
}
