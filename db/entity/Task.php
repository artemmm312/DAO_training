<?php

namespace db\entity;

use JsonSerializable;

class Task extends Entity implements JsonSerializable
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
				$this->isComleted = (bool) $value;
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

	public function jsonSerialize()
	{
		return [
			'id' => $this->id,
			'text' => $this->text,
			'isCompleted' => $this->isCompleted,
			'createdAt' => $this->createdAt,
			'userId' => $this->userId,
		];
	}
}
