<?php
include_once 'api.php';
include_once 'pais.php';
include_once 'mostrarInterfaz.php';

class Continente extends Api implements mostrarInterfaz{

    public $nombre;
    public $paises;

    public function __construct($nombre){
        parent::__construct();
        $this->nombre = $nombre;
        $this->paises = array();
        $this->setPaises($nombre);
    }

    public function setPaises($nombreContinente){
        if(strtolower($nombreContinente) == "america"){
            $nombreContinente = "americas";
        }
        $continente = $this->getbyContinent($nombreContinente);
        foreach($continente as $pais){
            $this->paises[] = new Pais($pais->name);
        }
    }

    public function __toString(){
        return $this->nombre;
    }

    private function ordenarDatos(){
        $retorno = strtoupper($this->nombre);
        $retorno = $retorno;
    }

    
}