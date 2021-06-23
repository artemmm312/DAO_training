<?php

namespace db\DAO\Implementation;

use db\DAO\iClassDAO\iUserDAO;
use db\entity\User;
use db\Connection\Connection;

class UserDAO implements iUserDAO
{
	private $connection;
	private $taskDAO;

	public function __construct()
	{
		$this->connection = Connection::getInstance();
		$this->taskDAO = new TaskDAO();
	}

	function getById($id)
	{
		$result = $this->connection
			->pdo
			->query("SELECT * FROM user WHERE id = $id")
			->fetchAll();
		return count($result) > 0 ? new User(
			$result[0]['id'],
			$result[0]['user_name'],
			$result[0]['password'],
			$this->taskDAO->getByUserId($result[0]['id']),
		) : null;
	}

	function getAll()
	{
		$result = $this->connection
			->pdo
			->query("SELECT * FROM user")
			->fetchAll();
		$users = [];
		foreach ($result as $row) {
			$users[] = new User($row['id'], $row['user_name'], $row['password'], $this->taskDAO->getByUserId($row['id']));
		}

		return $users;
	}

	function insert($user)
	{
		$this->connection->pdo->query("
			INSERT INTO task (user_name, password) VALUES
			('$user->username', '$user->password')
		");
	}

	function update($user)
	{
		$this->connection->pdo->query("
			UPDATE user SET
				user_name = '$user->username',
				password = '($user->password ?'
			WHERE id = $user->id
		");
	}

	function deleteById($id)
	{
		$this->connection
			->pdo
			->query("DELETE FROM user WHERE id = $id");
	}

	function getByUsername($username)
	{
		$this->connection
			->pdo
			->query("SELECT * FROM user WHERE `user_name`= $username");
	}
}