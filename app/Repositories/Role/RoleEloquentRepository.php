<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 25/10/2018
 * Time: 15:14
 */

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\EloquentRepository;

class RoleEloquentRepository extends EloquentRepository implements RoleRepositoryInterface
{
    public function getModel()
    {
        return Role::class;
    }
}
