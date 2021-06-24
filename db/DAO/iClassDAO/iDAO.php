<?php

namespace db\DAO\iClassDAO;

interface iDAO
{
	public function getById($id);

	public function getAll();

	public function insert($entity);

	public function update($entity);

	public function deleteById($id);
}
