<?php
    // Para definir una clase 
    class Auto{
        // Proceso de abstraciion es la definicion de las propiedades y metodos 
        // encapsulamiento modificadores de acceso
        public $marca; // public acceso desde cualquier parte de codigo
        private $modelo; // private acceso unicamente solo desde la class donde se declaro
        protected $color; // protected acceso dentro de la clase y derivadas 
        private $motor;

        // metodo construtor 
        public function  __construct($_color, $_motor){
            $this - > color = $_color;
            $this -> motor = $_motor;
        }

        // los metodos estaticos nos permite definir una clase 
        public static function __construct1($_color, $_motor, $_modelo){
            // lo  que se hace con el self es llamar al metodo constructor 
            $val = new self($_color, $_motor, $_modelo);
            $val -> modelo = $_modelo;
            return $val;
        
        } 

        // uso de metodos de propiedad metodos get y set 
        public function setModelo($value){ $this -> modelo = $value;}
        public function getModelo(){return $this -> modelo; }

        public function getColor(){ return $this -> color;}
        public function getMotor(){ return $this -> motor;}        
    }

    // El encapsulamiento se hace atravez de los modificadores de acceso los 
    //cuales son private, public, protected

    //uso de la clase auto
    $auto = new Auto(" Negro ", "Motor "); // instancia de la clase 
    $auto -> marca = "NISSAN ";
    echo $auto -> marca ."<br/>"; 

    // hacemos uso del modelo 
    $auto -> setModelo("CORROLLA") ."<br/>";
    echo $auto -> getModelo();
    echo $auto -> getColor();
    echo $auto -> getMotor();

    $a = Auto::__construct1("Blanco ", "", "CORROLL ");
    echo $a -> getColor();
    echo $a -> getMotor();
    echo $a -> getModelo();

      
?>