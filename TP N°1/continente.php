<?php
include_once 'api.php';
include_once 'pais.php';
include_once 'mostrarInterfaz.php';

class Continente extends Api implements IMostrar{

    public $nombre;
    public $paises;

    public function __construct($nombre){
        parent::__construct();
        $this->nombre = $nombre;
        $this->paises = array();
        $this->setPaises($nombre);
    }

    public function setPaises(){
        if(strtolower($this->nombre) == "america"){
            $nombreContinente = "americas";
        }
        $continente = $this->getbyContinent($nombreContinente);
        foreach($continente as $pais){
            $this->paises[] = new Pais($pais->name);
        }
    }

    public function mostrar(){
        echo $this->ordenarDatos();
    }

    public function __toString(){
        return $this->nombre;
    }

    public function ordenarDatos(){
        $retorno = strtoupper($this->nombre).":";
        $retorno = $retorno."<br>";
        $retorno = $retorno."----------------------------------------------------------------------------------";
        $retorno = $retorno."<br>";
        foreach($this->paises as $pais){
            $retorno = $retorno."".$pais->ordenarDatos();
        }
        $retorno = $retorno."<br>";
        $retorno = $retorno."----------------------------------------------------------------------------------";
        return $retorno;
    }

    
}