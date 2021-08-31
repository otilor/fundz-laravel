<?php

namespace App\Repositories;

interface GroupRepository 
{
    public function create($data);

    public function getPublicGroups();
}