<?php include ('db.php') ?>
<?php include ('includes/cabeza') ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

          <?php if (isset($_SESSION['message'])) { ?>
              <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
              <?= $_SESSION['message']?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
          <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="insert.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="No_de_lista"
                        class="form-control" placeholder="No_de_lista" autofocus>
                    </div>
                    <div class="form-group">
                        <input name="Nombres" rows="2"
                        class="form-control" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <input name="Apellidos" rows="4"
                        class="form-control" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <input name="Operacion" rows="6"
                        class="form-control" placeholder="Operación">
                    </div>
                    <div class="form-group">
                        <input name="Cantidad" rows="8"
                        class="form-control" placeholder="Cantidad">
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="insert" value="Insertar Datos">

                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>No_Lista</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Operacion</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $query = "SELECT * FROM empleados";
                  $result_tabla = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result_tabla)) {?>
                        <tr>
                            <td><?php echo $row['No_de_lista']?></td>
                            <td><?php echo $row['Nombres']?></td>
                            <td><?php echo $row['Apellidos']?></td>
                            <td><?php echo $row['Operacion']?></td>
                            <td><?php echo $row['Cantidad']?></td>
                            <td><?php echo $row['Fecha']?></td>
                            <td>
                                <a href="update.php?No_de_lista=<?php echo $row['No_de_lista'] ?>" class= "btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?No_de_lista=<?php echo $row['No_de_lista'] ?>" class="btn btn-danger ">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                  <?php } ?>

              </tbody>
            </table>
        </div>
    </div>

</div>
<?php include ('includes/Parte_Baja') ?>
