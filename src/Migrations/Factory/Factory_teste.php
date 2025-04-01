<?php

namespace App\Migrations;
use App\Migrations\Factory\CarsFactory;

class Factory_teste{


    public function  __construct(){
       $this->carFactory = new CarsFactory();

       $this->createCars();
    }


    public function createCars() {
        $Cars = CarsFactory::create(10); 
        return $Cars;
    }




}


?>