<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 26/10/2018
 * Time: 15:41
 */

namespace App\Repositories\Word;


use App\Models\Word;
use App\Repositories\EloquentRepository;

class WordEloquent extends EloquentRepository implements WordRepository
{
    public function getModel()
    {
        return Word::class;
    }
}
