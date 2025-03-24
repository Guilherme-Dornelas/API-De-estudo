<?php

namespace App\Services;

use App\Repositories\CarRepository;

class CarService
{
    private $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCars()
    {
        return $this->repository->getAll();
    }

    public function getCarById($id)
    {
        return $this->repository->findById($id);
    }

    public function createCar(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateCar($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteCar($id)
    {
        return $this->repository->delete($id);
    }
} 