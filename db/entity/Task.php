<?php

namespace db\entity;

class Task extends Entity
{
	private $text;
	private $isCompleted;
	private $createdAt;
	private $userId;

	public function __construct($id = null, $text = null, $isCompleted = null, $createdAt = null, $userId = null)
	{
		parent::__construct($id);
		$this->text = (string) $text;
		$this->isCompleted = (bool) $isCompleted;
		$this->createdAt = date($createdAt);
		$this->userId = (int) $userId;
	}

	public function __set($name, $value)
	{
		switch ($name) {
			case 'id':
				$this->id = (int)$value;
				break;
			case 'text':
				$this->text = (string)$value;
				break;
			case 'isCompleted':
				$this->isComleted = (bool)$value;
				break;
			case 'createdAt':
				$this->createdAt = date($value);
				break;
			case 'userId':
				$this->userId = (int)$value;
				break;
		}
	}
	public function __get($name)
	{
		switch ($name) {
			case 'id':
				return $this->id;
			case 'text':
				return $this->text;
			case 'isCompleted':
				return $this->isCompleted;
			case 'createdAt':
				return $this->createdAt;
			case 'userId':
				return $this->userId;
		}
	}
}
