<?php
require_once __DIR__ .'/vendor/autoload.php';
include_once 'pais.php';
include_once 'continente.php';


$america = new Continente("america");

foreach($america->paises as $valor){
    $valor->mostrar();
}


//$prueba = new Pais("argentina");

// $prueba->mostrar();
// $prueba->mostrar();

// $america = $prueba->getByContinent("asia");

// $arrayString = array();
// // echo json_encode($america);

// foreach($america as $valor){
//         $arrayString[] = new Pais($valor->name);
// }

// foreach($arrayString as $value)
// {
//     echo $value->mostrar();
// }

// echo json_encode($prueba->getByContinent("asia"));

// Api::getCountriesByLanguage("en");