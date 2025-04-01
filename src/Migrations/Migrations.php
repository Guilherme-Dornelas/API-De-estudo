<?php

 namespace App\Migrations;

 use App\Migrations\CreateCars;


 class Migrations
 {
        private $createCars;

        public function __construct()
        {
            $this->createCars = new CreateCars();
        }

        public function run()
        {
            global $argv;
            $action = $argv[1] ?? null;

            $migration = $this->createCars; // Assign the migration object

            if ($action === 'up') {
                $migration->UP();
            } elseif ($action === 'down') {
                $migration->down();
            } else {
                echo "Use 'php migrate.php up' para rodar as migrations ou 'php migrate.php down' para reverter.\n";
            }
        }


 }


?>