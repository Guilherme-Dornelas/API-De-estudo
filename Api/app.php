<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;

// Inicializa a conexão com o banco de dados
Database::init();

// Configuração de CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Se for uma requisição OPTIONS, retorna 200
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Carrega as rotas
require __DIR__ . '/../src/Routers/Routes.php';

// Obtém o método HTTP e o caminho da requisição
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove o prefixo /Api/app.php da URL
$path = str_replace('/Api/app.php', '', $path);

// Se o caminho estiver vazio, define como '/'
if (empty($path)) {
    $path = '/';
}

// Despacha a requisição para o router
echo $router->dispatch($method, $path); 