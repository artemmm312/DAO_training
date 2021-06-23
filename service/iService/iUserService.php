<?php

namespace service\iService;

use db\entity\User;

interface iUserService extends iService
{
	public function add(User $user);
	public function updateUser(User $user);
	public function deleteUserById(int $id);
}
