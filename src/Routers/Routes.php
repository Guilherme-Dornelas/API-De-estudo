<?php

namespace App\Routers;

use App\Controllers\CarController;
use App\Services\CarService;
use App\Repositories\CarRepository;
use App\Models\Car;

$router = new Router();

// Inicializa as dependências
$carRepository = new CarRepository(new Car());
$carService = new CarService($carRepository);
$carController = new CarController($carService);

// Rota raiz
$router->get('/', function() {
    return json_encode(['message' => 'API de Carros']);
});

// Rotas de carros
$router->get('cars', function() use ($carController) {
    return $carController->index();
});

$router->get('cars/{id}', function($id) use ($carController) {
    return $carController->show($id);
});

$router->post('cars', function() use ($carController) {
    return $carController->store();
});

$router->put('cars/{id}', function($id) use ($carController) {
    return $carController->update($id);
});

$router->delete('cars/{id}', function($id) use ($carController) {
    return $carController->destroy($id);
}); 