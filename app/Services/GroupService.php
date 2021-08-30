<?php

namespace App\Services;

use App\Models\Group;
use App\Repositories\GroupRepository;

class GroupService implements GroupRepository
{
    public function create($data)
    {
        $create = Group::create($data);
        if($create) {
            return ['status' => true, 'message' => 'Group created successfully'];
        }
        return ['status' => false, 'message' => 'Group not created'];
    }
}