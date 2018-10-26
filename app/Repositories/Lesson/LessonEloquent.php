<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 26/10/2018
 * Time: 15:36
 */

namespace App\Repositories\Lesson;

use App\Models\Lesson;
use App\Repositories\EloquentRepository;

class LessonEloquent extends EloquentRepository implements LessonRepository
{
    public function getModel()
    {
        return Lesson::class;
    }
}
