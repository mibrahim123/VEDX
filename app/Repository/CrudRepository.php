<?php

namespace App\Repository;

use App\Repository\Interfaces\CrudRepositoryInterface;

class CrudRepository implements CrudRepositoryInterface
{
    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id)
    {
        return $this->model
        ->where('id', $id)
        ->update($data);
    }

    public function delete($id)
    {
        return $this->model
        ->where('id', $id)
        ->delete();
    }
}
