<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 26/10/2018
 * Time: 15:31
 */

namespace App\Repositories;

abstract class EloquentRepository implements BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function find($id, $columns = ['*'])
    {
        $result = $this->model->find($id, $columns);

        return $result;
    }

    public function paginate($limit)
    {
        $limit = is_null($limit) ? config('setting.paginate') : $limit;
        $result = $this->model->paginate($limit);

        return $result;
    }

    public function pluck($column, $key = null)
    {
        return $this->model->pluck($column, $key);
    }

    public function create(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes)
    {
        return $this->model->update($attributes);
    }

    public function delete()
    {
        return $this->model->delete();
    }

    public function count($columns = '*')
    {
        return $this->model->count($columns);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        return $this->model->where($column, $operator, $value, $boolean);
    }
}