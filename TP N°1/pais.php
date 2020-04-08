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
        $this->nombre = $nombre;
        $this->inicializar();
    }

    private function inicializar(){
        // $var = $this->getByName($nombre);
        $var = parent::getByName($this->nombre);
        $this->capital = $var->capital;
        $this->continente = $var->region;
        $this->subRegion = $var->subregion;
        $this->poblacion = $var->population;
        $this->idioma = $var->languages[0]->nativeName;
        $this->area = $var->area;
        $this->bandera = $var->flag;
        $this->moneda = $var->currencies[0]->name;
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

    public function ordenarDatos(){
        $retorno = strtoupper($this);
        $retorno = $retorno.$this->mostrarBandera();
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