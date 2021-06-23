<?php

namespace db\DAO\iClassDAO;

interface iTaskDAO extends iDAO
{
	public function setIsCompletedById($id, $isCompleted);
	public function getByUserId($userId);
}
