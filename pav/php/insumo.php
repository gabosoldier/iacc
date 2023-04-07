<?php

class Insumo {
    private $empresa;
    private $nombre;
    private $precio;
    private $cantidad;
    
    public function setEmpresa($empresa){
        $this->empresa = $empresa;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
 
    public function getEmpresa(){
        return $this->empresa;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

}
