<?php

namespace service\ClassService;

use db\entity\User;
use db\DAO\Implementation\UserDAO;
use service\iService\iUserService;

class UserService implements iUserService
{
	private $userDAO;

	public function __construct()
	{
		return $this->userDAO = new UserDAO();
	}

	function add(User $user)
	{
		return $this->userDAO->insert($user);
	}

	function updateUser(User $user)
	{
		return $this->userDAO->update($user);
	}

	function deleteUserById(int $id)
	{
		return $this->userDAO->deleteById($id);
	}
}
