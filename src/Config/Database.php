<?php

namespace App\Config;

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

class Database
{
    public static function init()
    {
        // Carrega as variáveis de ambiente
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => $_ENV['DB_CONNECTION'],
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_DATABASE'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
} 