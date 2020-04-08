<?php
use NNV\RestCountries;

class Api{
    
    // private static $restCountries = new Restcountries; No me dejaba hacer esto, no entiendo porque.
    // private static $instance = null;
    private $restCountries;


    protected function __construct(){
        $this->restCountries = new RestCountries;
    }

    // public static function getInstance(){
    //     if(is_null(self::$isntance)){
    //         self::$instance = new self();
    //     }

    //     return self::$instance;
    // }

    protected function getAll(){
        return $this->restCountries->all();
    }

    // protected function getByName($nombre, $isEnglishName){
    //     return $this->restCountries->byName($nombre);
    // }

    protected function getByName($nombre){
        $aux = $this->getAll();
        foreach($aux as $valor){
            if(strtolower($valor->translations->es) == strtolower($nombre) || strtolower($valor->name) == strtolower($nombre)){
                return $valor;
            }
        }
    }

    protected function getByCapital($nombreCapital){
        return $this->restCountries->byCapitalCity($nombreCapital);
    }

    protected function getByContinent($nombreContinente){
        return $this->restCountries->byRegion($nombreContinente);
    }

    public static function getCountriesByLanguage($language){
            $api = new RestCountries;
            $var = $api->byLanguage($language);
            for($i=0; $i < count($var) ; $i++){
                echo $var[$i]->name;
                echo "<br>";
            }
    }

    public static function getCountriesBySubRegion($subRegion){
            $api = new RestCountries;
            $var = $api->byRegionalBloc($subRegion);
            for($i=0; $i < count($var) ; $i++){
                echo $var[$i]->name;
                echo "<br>";
            }
    }
}