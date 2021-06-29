<?php

namespace db\DAO\iClassDAO;
use db\entity\Entity;

interface iDAO
{
	public function getById($id);

	public function getAll();

	public function insert(Entity $entity);

	public function update(Entity $entity);

	public function deleteById($id);
}
