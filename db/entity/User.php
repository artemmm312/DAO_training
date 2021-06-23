<?php

namespace db\entity;

class User extends Entity
{
	private $username;
	private $password;
	private $tasks;

	public function __construct($id = null, $username = null, $password = null, $tasks = [])
	{
		parent::__construct($id);
		$this->text = (string) $username;
		$this->isCompleted = (string) $password;
		$this->tasks = $tasks;
	}

	public function __set($name, $value)
	{
		switch ($name) {
			case 'id':
				$this->id = (int)$value;
				break;
			case 'username':
				$this->username = (string)$value;
				break;
			case 'password':
				$this->password = (string)$value;
				break;
			case 'tasks':
				$this->tasks = $value;
				break;
		}
	}
	public function __get($name)
	{
		switch ($name) {
			case 'id':
				return $this->id;
			case 'username':
				return $this->username;
			case 'password':
				return $this->password;
			case 'tasks':
				return $this->tasks;
		}
	}
}
