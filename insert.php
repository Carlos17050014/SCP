<?php
include ("db.php");
if (isset($_POST['insert'])) {
    $No_lista = $_POST['No_de_lista'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Operacion = $_POST['Operacion'];
    $Cantidad = $_POST['Cantidad'];

    $query = "INSERT INTO empleados(No_de_lista, Nombres, Apellidos, Operacion, Cantidad) values ('$No_lista', '$Nombres', '$Apellidos','$Operacion', '$Cantidad')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      die("Fallo al insertar");
    }
    $_SESSION['message'] = 'Guardado Exitosamente';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}

 ?>
