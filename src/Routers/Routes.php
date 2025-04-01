<?php

namespace App\Routers;

use App\Controllers\CarController;
use App\Services\CarService;
use App\Repositories\CarRepository;
use App\Models\CarModel;

class Routes
{
    private $router;

    public function __construct(RouterConfig $router)
    {
        $this->router = $router;
        $this->registerRoutes();
    }

    /**
     * Registra todas as rotas da aplicação.
     */
    private function registerRoutes(): void
    {
        $carController = $this->initializeCarController();

     
        $this->router->get('/', fn() => $this->rootResponse());

        $this->router->get('cars', fn() => $carController->index());
        $this->router->get('cars/{id}', fn($id) => $carController->show($id));
        $this->router->post('cars', fn() => $carController->store());
        $this->router->put('cars/{id}', fn($id) => $carController->update($id));
        $this->router->delete('cars/{id}', fn($id) => $carController->destroy($id));
    }

    /**
     * Inicializa o CarController com suas dependências.
     */
    private function initializeCarController(): CarController
    {
        $carRepository = new CarRepository(new CarModel());
        $carService = new CarService($carRepository);
        return new CarController($carService);
    }

    /**
     * Retorna a resposta para a rota raiz.
     */
    private function rootResponse(): string
    {
        return json_encode(['message' => 'API de Carros']);
    }
}

$router = new RouterConfig();
new Routes($router);