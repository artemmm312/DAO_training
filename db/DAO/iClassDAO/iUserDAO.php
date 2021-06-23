<?php

namespace db\DAO\iClassDAO;

interface iUserDAO extends iDAO
{
public function getByUsername($username);
}