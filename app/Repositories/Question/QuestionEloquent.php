<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 26/10/2018
 * Time: 15:37
 */

namespace App\Repositories\Question;

use App\Models\Question;
use App\Repositories\EloquentRepository;

class QuestionEloquent extends EloquentRepository implements QuestionRepository
{
    public function getModel()
    {
        return Question::class;
    }
}
