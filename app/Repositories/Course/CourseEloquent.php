<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 26/10/2018
 * Time: 15:35
 */

namespace App\Repositories\Course;

use App\Models\Course;
use App\Repositories\EloquentRepository;

class CourseEloquent extends EloquentRepository implements CourseRepository
{
    public function getModel()
    {
        return Course::class;
    }
}
