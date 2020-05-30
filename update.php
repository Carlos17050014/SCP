<?php
    include ("db.php");

    if (isset($_GET['No_de_lista'])) {
        $No_lista = $_GET['No_de_lista'];
        $query = "SELECT * FROM empleados WHERE No_de_lista = $No_lista";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_array($result);
          $Nombres = $row['Nombres'];
          $Apellidos = $row['Apellidos'];
          $Operacion = $row['Operacion'];
          $Cantidad = $row['Cantidad'];
        }
    }
    if (isset($_POST['update'])) {
       $No_lista = $_GET['No_de_lista'];
       $Nombres = $_POST['Nombres'];
       $Apellidos = $_POST['Apellidos'];
       $Operacion = $_POST['Operacion'];
       $Cantidad = $_POST['Cantidad'];

       $query = "UPDATE empleados SET No_de_lista = '$No_lista', Nombres = '$Nombres', Apellidos = '$Apellidos', Operacion = '$Operacion', Cantidad = '$Cantidad' WHERE No_de_lista = $No_lista";
       mysqli_query($conn, $query);
       $_SESSION['message'] = 'Actualizacion Exitosa';
       $_SESSION['message_type'] = 'warning';

       header("Location: index.php");
    }
?>
<?php include ("includes/cabeza") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-bady">
              <form action="update.php?No_de_lista=<?php echo $_GET['No_de_lista']?>" method="POST">
                  <div class="form-group">
                      <input type="text" name="No_de_lista" value="<?php echo $No_lista;?>"
                      class="form-control" placeholder="Actualiza Matricula">
                  </div>
                  <div class="form-group">
                      <textarea name="Nombres" rows="1"
                      class="form-contro" placeholder="Actualiza Nombres" ><?php echo $Nombres; ?></textarea>
                  </div>
                  <div class="form-group">
                      <textarea name="Apellidos" rows="1"
                      class="form-contro" placeholder="Actualiza Apellidos" ><?php echo $Apellidos; ?></textarea>
                  </div>
                  <div class="form-group">
                      <textarea name="Operacion" rows="1"
                      class="form-contro" placeholder="Actualiza Operación" ><?php echo $Operacion; ?></textarea>
                  </div>
                  <div class="form-group">
                      <textarea name="Cantidad" rows="1"
                      class="form-contro" placeholder="Actualiza Cantidad" ><?php echo $Cantidad; ?></textarea>
                  </div>
                  <button class="btn btn-success" name="update">
                    Actualizar Datos
                  </button>
             </form>
            </div>
        </div>
    </div>
</div>

<?php include ( "includes/Parte_Baja")  ?>