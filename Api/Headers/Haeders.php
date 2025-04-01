<?php

namespace App\Headers;



 class Headers{
     // Configuração de CORS
     public function setHeaders() {
         $headers = [
             'Access-Control-Allow-Origin' => '*',
             'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
             'Access-Control-Allow-Headers' => 'Content-Type',
             'Content-Type' => 'application/json'
         ];
         
         foreach ($headers as $key => $value) {
             header("$key: $value");
         }
     }

     
}

?>