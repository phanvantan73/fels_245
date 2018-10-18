<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 25/10/2018
 * Time: 13:40
 */

namespace App\Repositories\Course;

use App\Models\Course;
use App\Repositories\EloquentRepository;

class CourseEloquentRepository extends EloquentRepository implements CourseRepositoryInterface
{
    public function getModel()
    {
        return Course::class;
    }
}
