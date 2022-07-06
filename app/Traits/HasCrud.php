<?php

namespace App\Traits;

trait HasCrud
{
    public function storeData($data)
    {
        return $this->getModel()->create($data);
    }

    public function getModel()
    {
        return new $this->model;
    }

    public function updateData($id, $data)
    {
        return $this->getModel()
        ->where('id', $id)
        ->update($data);
    }

    public function deleteData($id)
    {
        return $this->getModel()
        ->where('id', $id)
        ->delete();
    }

}
