<?php

namespace service\iService;

use db\entity\User;

interface iUserService extends iService
{
	public function getUserById(int $id);

	public function getUsers();

	public function addUser(User $user);

	public function updateUser(User $user);

	public function deleteUserById(int $id);

	public function getUserByUserName(string $username);
}
