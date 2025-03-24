<?php

namespace App\Controllers;

use App\Services\CarService;

class CarController
{
    private $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $cars = $this->service->getAllCars();
        return json_encode($cars);
    }

    public function show($id)
    {
        $car = $this->service->getCarById($id);
        if (!$car) {
            http_response_code(404);
            return json_encode(['error' => 'Car not found']);
        }
        return json_encode($car);
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $car = $this->service->createCar($data);
        http_response_code(201);
        return json_encode($car);
    }

    public function update($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $car = $this->service->updateCar($id, $data);
        if (!$car) {
            http_response_code(404);
            return json_encode(['error' => 'Car not found']);
        }
        return json_encode($car);
    }

    public function destroy($id)
    {
        $result = $this->service->deleteCar($id);
        if (!$result) {
            http_response_code(404);
            return json_encode(['error' => 'Car not found']);
        }
        return json_encode(['message' => 'Car deleted successfully']);
    }
} 