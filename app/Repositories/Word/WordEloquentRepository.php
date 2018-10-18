<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 25/10/2018
 * Time: 13:42
 */

namespace App\Repositories\Word;

use App\Models\Word;
use App\Repositories\EloquentRepository;

class WordEloquentRepository extends EloquentRepository implements WordRepositoryInterface
{
    public function getModel()
    {
        return Word::class;
    }
}
