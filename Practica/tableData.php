<?php
   //Incluimos nuestro archivo de funciones 
   include "Person.php";

   $person = new Person();

   // Obtenemos los datos 
   $data = $person -> getData();   

?>

<table>
    <thead>
        <tr>
            <th>Nombre: </th>
            <th>Apellido: </th>
            <th>Edad: </th>
            <th>Accione: </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $cod => $record) { ?>
            <tr>
                <td><?php echo $record['name']; ?></td>
                <td><?php echo $record['lastname']; ?></td>
                <td><?php echo $record['age']; ?></td>
                <td>
                    <a href="form.php?cod=<?php echo $cod; ?>">Editar</a>

                    <form action="crud.php" method="POST">
                        <input type="text" name="action" value="eliminar">
                        <input type="text" name="cod" value="<?php echo $cod; ?>">
                        <button type="submit" onclick="return confirm('Seguro que desea eliminar este registro');">eliminar</button>
                    </form>
                </td>
            </tr>            
        <?php } ?>
    </tbody>
</table>
<a href="form.php">Nuevo Resgistro</a>

   