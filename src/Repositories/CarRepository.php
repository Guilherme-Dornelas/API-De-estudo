<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    private $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $car = $this->findById($id);
        if ($car) {
            $car->update($data);
        }
        return $car;
    }

    public function delete($id)
    {
        $car = $this->findById($id);
        if ($car) {
            return $car->delete();
        }
        return false;
    }
} 