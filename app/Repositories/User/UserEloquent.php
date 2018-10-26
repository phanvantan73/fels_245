<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 26/10/2018
 * Time: 15:38
 */

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\EloquentRepository;

class UserEloquent extends EloquentRepository implements UserRepository
{
    public function getModel()
    {
        return User::class;
    }
}
