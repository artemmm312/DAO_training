<?php

namespace db\DAO\iClassDAO;

interface iDAO
{
	public function getById($id);
	public function getAll();
	public function insert($task);
	public function update($task);
	public function deleteById($id);
}
