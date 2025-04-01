<?php

namespace App\Routers;

class RouterConfig
{
    private array $routes = [];

    public function get(string $path, callable $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, callable $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function put(string $path, callable $callback): void
    {
        $this->routes['PUT'][$path] = $callback;
    }

    public function delete(string $path, callable $callback): void
    {
        $this->routes['DELETE'][$path] = $callback;
    }

    private function matchRoute(string $route, string $path): ?array
    {
        // Converte a rota definida em um padrão regex
        $pattern = preg_replace('/\{([^}]+)\}/', '(?P<$1>[^/]+)', $route);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = '/^' . $pattern . '$/';

        if (preg_match($pattern, $path, $matches)) {
            // Remove os matches numéricos e mantém apenas os nomeados
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
            return $params;
        }

        return null;
    }

    public function dispatch(string $method, string $path)
    {
        // Remove barras extras no início e fim
        $path = trim($path, '/');
        
        // Se a rota estiver vazia, define como '/'
        if (empty($path)) {
            $path = '/';
        }

        // Primeiro tenta encontrar uma rota exata
        if (isset($this->routes[$method][$path])) {
            return call_user_func($this->routes[$method][$path]);
        }

        // Se não encontrar rota exata, procura por rotas com parâmetros
        foreach ($this->routes[$method] ?? [] as $route => $callback) {
            $params = $this->matchRoute($route, $path);
            if ($params !== null) {
                return call_user_func_array($callback, $params);
            }
        }

        // Se não encontrar a rota, retorna 404
        http_response_code(404);
        return json_encode([
            'error' => 'Route not found',
            'path' => $path,
            'method' => $method
        ]);
    }
} 