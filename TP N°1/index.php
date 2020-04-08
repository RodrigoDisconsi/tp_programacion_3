<?php
require_once __DIR__ .'/vendor/autoload.php';
include_once 'pais.php';
include_once 'continente.php';


// $america = new Continente("america");

// foreach($america->paises as $valor){
//     $valor->mostrar();
// }


// $prueba = new Pais("france");

// echo json_encode($prueba);

// $prueba->mostrar();
// $prueba->mostrar();

$america = new Continente("america");

$america->mostrar();