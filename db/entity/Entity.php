<?php
namespace db\entity;

abstract class Entity
{
	protected $id;

	public function __construct($id)
	{
		$this->id = (int) $id;
	}
}
