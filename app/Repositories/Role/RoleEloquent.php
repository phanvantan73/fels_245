<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 26/10/2018
 * Time: 16:04
 */

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\EloquentRepository;

class RoleEloquent extends EloquentRepository implements RoleRepository
{
    public function getModel()
    {
        return Role::class;
    }
}
