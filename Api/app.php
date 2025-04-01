<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Routers/Routes.php';

use App\Config\Database;
use App\Headers\Headers;

class App {
    private $headers;

    public function __construct(Headers $headers) {
        $this->headers = $headers;
        $this->initialize();
    }

    /**
     * Inicializa a conexão com o banco de dados e configura os headers.
     * Também trata requisições OPTIONS para evitar processamento desnecessário.
     */
    private function initialize(): void {
       
        Database::init();

        $this->headers->setHeaders();

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
    }

    /**
     * Processa a requisição e despacha o router.
     */
    public function run(): void {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

       
        $path = str_replace('/Api/app.php', '', $path);

    
        if (empty($path)) {
            $path = '/';
        }

        echo $GLOBALS['router']->dispatch($method, $path);
    }
}


$app = new App(new Headers());
$app->run();
