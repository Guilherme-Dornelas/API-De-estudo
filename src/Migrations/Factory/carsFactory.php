<?php

namespace App\Migrations\Factory;
class CarsFactory
{
    public static function create($count = 1)
    {
        $cars = [];

        for ($i = 0; $i < $count; $i++) {
            $cars[] = [
                'name'  => self::randomName()
            ];
        }

        return $count === 1 ? $cars[0] : $cars;
    }

    private static function randomName()
    {
        $namesCars = ['Ferrari', 'Lamborghini', 'Porsche', 'Bugatti', 'Maserati', 'Rolls-Royce'];
        return $namesCars[array_rand($namesCars)] . ' ' . ucfirst(substr(md5(rand()), 0, 5));
    }
}
