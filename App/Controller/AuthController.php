<?php
  abstract class Vehicel {
    private $brand ;
    private $model;

    public function __construct($brand,$model){
        $this->brand = $brand;
        $this->model = $model;
    }

    public  function getbrand(){
        return $this->brand;
    }
    public function getmodel(){
        return $this->model;
    }

    abstract public function start();
    
 }

 class car extends Vehicel{
    private  $numdoors ;

    public function __construct($brand,$model,$numdoors){
        $this->brand = $brnad;
        $this->model = $model;
        $this->numdoors = $numdoors;
    }

    public function start(){
        
       echo " $this->brand has sqtarted";
     }


 }
 class motorsycle extends Vehicel{

    private $hasfairing ;
    public function __construct($brand,$model,$hasfairing){
        parent::__construct($brand,$model);
        $this->hhasfairing = $hasfairing;
    }

    public function start(){

      echo $this->getBrand()." has sqtarted ";

    }
 }
 
//  $car = car::start();
//  $motorsycle = motorsycle::start();

 $car = new car($brand , $model ,$numdoors ) ;
 $car->start();

 $motorsycle = new motorsycle() ;

 var_dump($car);
 var_dump($motorsycle);
 



?>