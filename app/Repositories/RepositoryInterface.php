<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 25/10/2018
 * Time: 13:07
 */

namespace App\Repositories;


interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function find($id, $columns = ['*']);

    public function paginate($limit);

    public function pluck($column, $key = null);

    public function create(array $attributes = []);

    public function update(array $attributes);

    public function delete();

    public function count($column = '*');

    public function with($relations);

    public function where($column, $operator = null, $value = null, $boolean = 'and');
}
