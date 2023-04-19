<?php
   //vamos a incluir nuestro archivo de funciones 

   include "Person.php";

   $person = new Person();

   // vamos a validar si lo que se va a hacer es editar o guardar 
   if(isset($_GET['cod'])){
    $cod = $_GET['cod'];
    $data = $person -> getData();
    $record = $data[$cod];
    $action = "editar";

   }else{
         $record = array(
            'cod' => '',
            'name' => '',
            'lastname' => '',
            'age' => '',
        );
        $action = "guardar";
   }
?>

<form action="crud.php" method="POST">
    <input type="hidden" name="action" id="action" value="<? = $action ?>">
    <?php if($action == "editar"){ ?>
        <input type="text" name="cod" id="name" value="<?php echo $cod; ?> ">
    <?php
    }?>

    Nombre: 
    <input type="text" name="name" id="name" value="<?php echo $record['name']; ?>">
    Apellido:
    <input type="text" name="lastname" id="lastname" value="<?php echo $record['lastname']; ?>">
    Edad: 
    <input type="number" name="age" id="age" value="<?php echo $record['age']; ?> ">

    <button type="submit">guardar</button>
</form>