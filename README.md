# API de Estudo

API REST desenvolvida em PHP puro com arquitetura em camadas e Eloquent ORM.

## Estrutura do Projeto

```
api-estudo/
├── Api/
│   ├── app.php              # Ponto de entrada da aplicação
│   └── .htaccess           # Configurações do Apache
├── src/
│   ├── Config/
│   │   └── Database.php    # Configuração do banco de dados
│   ├── Controllers/
│   │   └── CarController.php # Controlador de requisições
│   ├── Models/
│   │   └── Car.php         # Modelo de dados
│   ├── Repositories/
│   │   └── CarRepository.php # Camada de acesso a dados
│   ├── Routers/
│   │   ├── Router.php      # Classe de roteamento
│   │   └── Routes.php      # Definição das rotas
│   └── Services/
│       └── CarService.php  # Lógica de negócio
├── vendor/                  # Dependências do Composer
├── .env                     # Variáveis de ambiente
└── composer.json           # Configuração do Composer
```

## Requisitos

- PHP 8.0 ou superior
- Composer
- MySQL
- Servidor web (Apache/Nginx)

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/Guilherme-Dornelas/API-De-estudo.git
```

2. Instale as dependências:
```bash
composer install
```

3. Configure o arquivo .env:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=carros
DB_USERNAME=root
DB_PASSWORD=
```

4. Crie o banco de dados e a tabela:
```sql
CREATE DATABASE carros;
USE carros;

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Endpoints

### GET /cars
Lista todos os carros

### GET /cars/{id}
Busca um carro específico

### POST /cars
Cria um novo carro

### PUT /cars/{id}
Atualiza um carro existente

### DELETE /cars/{id}
Remove um carro

## Exemplo de Uso

### Listar Carros
```bash
curl http://localhost/Api/app.php/cars
```

### Criar Carro
```bash
curl -X POST http://localhost/Api/app.php/cars \
  -H "Content-Type: application/json" \
  -d '{"brand":"Toyota","model":"Corolla","year":2020,"color":"Silver","price":25000}'
```

### Buscar Carro
```bash
curl http://localhost/Api/app.php/cars/1
```

### Atualizar Carro
```bash
curl -X PUT http://localhost/Api/app.php/cars/1 \
  -H "Content-Type: application/json" \
  -d '{"price":26000}'
```

### Deletar Carro
```bash
curl -X DELETE http://localhost/Api/app.php/cars/1
```

## Arquitetura

O projeto segue uma arquitetura em camadas:

1. **Controllers**: Recebem as requisições HTTP
2. **Services**: Contêm a lógica de negócio
3. **Repositories**: Acessam os dados
4. **Models**: Representam as entidades
5. **Routers**: Gerenciam as rotas da API

Cada camada tem uma responsabilidade específica, seguindo os princípios SOLID. 