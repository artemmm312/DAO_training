<?php

namespace db\Controllers;

use service\ClassService\UserService;
use db\entity\User;

class UserController
{
	public $userService;
	public $id;
	public $username;
	public $user;

	public function __construct()
	{
		$this->userService = new UserService();
		$this->user = new User();
	}

	function showUser()
	{
		return $this->userService->getUserById($this->id);
	}

	function showUsers()
	{
		return $this->userService->getUsers();
	}

	function appendUser()
	{
		return $this->userService->addUser($this->user);
	}

	function renewUser()
	{
		return $this->userService->updateUser($this->user);
	}

	function deleteUser()
	{
		return $this->userService->deleteUserById($this->id);
	}

	function showUserByName()
	{
		return $this->userService->getUserByUserName($this->username);
	}
}