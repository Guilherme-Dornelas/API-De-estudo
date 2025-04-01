<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateCars
{
 
    public function __construct()
    {

    }


    public function UP()
    {
        Capsule::schema()->create('motos', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->year('ano'); 
            $table->integer('km')->unsigned();
            $table->decimal('preco', 10, 2); 
            $table->string('foto')->nullable(); 
            $table->string('marca'); 
            $table->timestamps(); 
        });

        echo "Tabela 'Motos' criada com sucesso!\n";
    }


    public static function down()
    {
        Capsule::schema()->dropIfExists('motos');
        echo "Tabela 'Motos' removida!\n";
    }
}


?>