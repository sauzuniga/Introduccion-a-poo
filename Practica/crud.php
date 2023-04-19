<?php 
    // vamos a incluir los archivos de la funciones 
    include "Person.php";

    // vamos a obtener las informoacion que de va a relizar 
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $ge = $_POST['age'];
    $cod = $_POST['cod'];
    
    // vamos a obtener los valores del formulario
    $person = new Person($name , $lastname, $age);
    $person = -> setCod = $cod;
    

    // evaluamos las actiones que se van a reliar 
    if($action == "guardar"){
        // lo que va a hacer es guardar  los datos en el array
        $person -> saveData();
        // luego de  eso vamos a redireccionar a 
        header ('Location: index.php');
    }

    // evaluamos la action de  editar nuestro registros
    if($action == "editar"){
        // y actualizamos los datos 
        $person -> updateDate();
        // una ves actualizamos nuestro registro vamos a redireccionar 
        header ('Location: index.php');
    }

    //  evaluamos la accion de eliminanr 
    if ($action == "eliminar"){
        // mandamos a traer nuestra funcion que hemos creado para borra y le pasamos el $cod de nuestro registro que deseamos borrar 
        $person -> deleteData($cod);
        // una ves eliminemos nuestro registro que nor redireciones a index.php
        header ('Location: index.php');
    }
?>
