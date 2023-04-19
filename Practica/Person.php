<?php

    class Person{
        // Propiedaddes
        private $name;
        private $lastname;
        private $age;
        private $cod;

        const FILE = 'datos.txt';

        function __construct($nameP, $lastnameP, $ageP){
            $this -> name = $nameP;
            $this -> lastname = $lastnameP;
            $this -> age = $ageP; 
        }

        public function setCod($codP) {$this -> cod = $codP;}
        
        // Creamos la funcion para listar nuestros datos 
        function getData(){
            // Le indicamos que si el archivo no existe que lo cree
            // la funcion !file_exists se utiliza para comprobar si un archivo o directorio existe en el sistema de archivos
      
            if(!file_exists(self::FILE)){
               // la funcion file_put_contents se utiliza para escribir datos en un archivo
               // esta toma dos argumentos primero la ruta del archivo y luego los datos que se quieres escribir 
               file_put_contents(self::FILE, ''); 
            }
      
            // Obtenemos los datos del archivo
            //La funcion file_get_contents  se utiliza para leer el contenido de un archivo y que lo devuelva como cadena 
            $data = file_get_contents(self::FILE);
            // json_decode se utiliza para decodificar una cadena de texto que contie formato JSON
            $data = json_decode($data, true);
      
            // si los datos no son array , que lo inicialize 
      
            if(!is_array($data)){
               $data = array();
            }
            return $data;

        }
        
        //funcion para guardar los datos 
        function saveData(){
            // se obtienen los datos que se tienen del archivo
            $data = $this -> getData();
      
            //creamos un nuevo registro 

            $record = [
                'name' => $this -> name,
                'lastname' => $this -> lastname,
                'age' => $this -> age,
            ];
      
          

            //agregamos el nuevo registro nuestro archivo
            $data[] = $record;
            // convertirmos nuestro registro a formato JSON
            $data = json_encode($data);
            file_put_contents(self::FILE, $data);
        }

        //funcion para editar nuestro registros 
        function updateDate(){
 
            //obtenemos los datos que se van a actualizar 
      
            $data = $this ->  getData();
      
            // actualizamos los datos 

            $data[$this -> setCod]['name'] = $this -> name;
            $data[$this -> setCod]['lastname'] = $this -> lastname;
            $data [ $this -> setCod]['age'] = $this -> age;
      
            // convertirmos nuestro datos a formanto a JSON
            $data = json_encode($data);
            file_put_contents(self::FILE, $data);
        }

        // funcion pata eleminir
        function deleteData(){
            // pasamos los datos 
            $data = $this ->  getData();
      
            // eliminamor el resgistro
      
            unset($data[$this -> setCod]);
      
            // reindireczamos los datos 
      
            $data = array_values($data);
      
            // convertirmos a formato JSON  y guardar 
      
            $data =json_encode($data);
            file_put_contents(self::FILE, $data);
    
        }
    }   
?>




