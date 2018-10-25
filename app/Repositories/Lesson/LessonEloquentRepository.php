<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 25/10/2018
 * Time: 13:39
 */

namespace App\Repositories\Lesson;

use App\Models\Lesson;
use App\Repositories\EloquentRepository;

class LessonEloquentRepository extends EloquentRepository implements LessonRepositotyInterface
{
    public function getModel()
    {
        return Lesson::class;
    }
}
