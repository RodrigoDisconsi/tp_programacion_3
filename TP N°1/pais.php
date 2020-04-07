<?php
include_once 'api.php';
include_once 'mostrarInterfaz.php';

class Pais extends Api implements IMostrar{
    public $nombre;
    public $capital;
    public $continente;
    public $subRegion;
    public $poblacion;
    public $idioma;
    public $area;
    public $bandera;
    public $moneda;
    

    public function __construct($nombre){
        parent::__construct();
        $this->inicializar($nombre);
    }

    private function inicializar($nombre){
        // $var = $this->getByName($nombre);
        $var = parent::getByName($nombre);
        $this->nombre = $var[0]->name;
        $this->capital = $var[0]->capital;
        $this->continente = $var[0]->region;
        $this->subRegion = $var[0]->subregion;
        $this->poblacion = $var[0]->population;
        $this->idioma = $var[0]->languages[0]->nativeName;
        $this->area = $var[0]->area;
        $this->bandera = $var[0]->flag;
        $this->moneda = $var[0]->currencies[0]->name;
    }

    public function mostrar(){
        echo $this->ordenarDatos();
    }

    private function mostrarBandera(){
        $bandera = $this->bandera;
        return "<img src= '$bandera' border='0' width='100' height='50'>";
    }

    public function __toString(){
        return $this->nombre;
    }

    private function ordenarDatos(){
        $retorno = strtoupper($this);
        $retorno = $retorno."              ".$this->mostrarBandera();
        $retorno = $retorno."<br>";
        $retorno = $retorno."----------------------------------";
        $retorno = $retorno."<br>";
        $retorno = $retorno."Capital: ".$this->capital;
        $retorno = $retorno."<br>";
        $retorno = $retorno."Continente: ".$this->continente;
        $retorno = $retorno."<br>";
        $retorno = $retorno."Sub region: ".$this->subRegion;
        $retorno = $retorno."<br>";
        $retorno = $retorno."Moneda:".$this->moneda;
        $retorno = $retorno."<br>";
        $retorno = $retorno."Idioma: ".$this->idioma;
        $retorno = $retorno."<br>";
        $retorno = $retorno."Poblacion: ".(string)$this->poblacion;
        $retorno = $retorno."<br>";
        $retorno = $retorno."Area: ".(string)$this->area;
        $retorno = $retorno."<br>";
        $retorno = $retorno."<br>";
        $retorno = $retorno."----------------------------------";
        $retorno = $retorno."<br>";
        return $retorno;
    }

}