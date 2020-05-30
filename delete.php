<?php
    include("db.php");

    if (isset($_GET['No_de_lista'])) {
        $No_lista = $_GET['No_de_lista'];
        $query = "DELETE FROM empleados WHERE No_de_lista = $No_lista";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Fallo al Borrar");
        }

        $_SESSION['message'] = 'Borrado Satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
      }

 ?>
