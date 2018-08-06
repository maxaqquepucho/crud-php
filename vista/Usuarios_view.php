<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>MVC</title>
    </head>
    <body>
        <div class="container-fluid mt-2">
            <div class="row d-flex justify-content-center">
                <nav class="navbar navbar-light bg-light ">
                  <a class="navbar-brand">Ingrese texto</a>

                  <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </nav>
            </div>
            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-md-8">
                    <table class="table table-hover table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Codigo</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">DNI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($datosUser as $datos ) {
                         ?>
                            <tr>
                              <th scope="row"><?php echo $datos['codigo']; ?></th>
                              <td><?php echo $datos['nombre']; ?></td>
                              <td><?php echo $datos['apellido']; ?></td>
                              <td><?php echo $datos['dni']; ?></td>
                              <td><a href="../controlador/Usuario_controller.php?accion=buscarEditar&usuario=<?php echo $datos['codigo']; ?>" class="btn btn-success">Editar</a> </td>
                              <td><a href="../controlador/Usuario_controller.php?accion=eliminar&usuario=<?php echo $datos['codigo']; ?>" class="btn btn-danger">Eliminar</a> </td>
                            </tr>

                        <?php
                        }
                         ?>

                      </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <form action="../controlador/Usuario_controller.php?accion=registrar" method="POST">
                      <div class="form-group">
                        <label >Usuario</label>
                        <input type="text" class="form-control" name="usuario"  placeholder="Ingresa tu Usuario" required>
                      </div>
                      <div class="form-group">
                        <label >Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu Nombre" required>
                      </div>
                      <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Ingresa tu apellido" required>
                      </div>
                      <div class="form-group">
                        <label >DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="Ingresa tu DNI" required>
                      </div>
                      <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Ingresa tu password" required>
                      </div>
                      <div class="">
                          <button type="submit" class="btn btn-primary">Agregar</button>
                          <button type="reset" class="btn btn-warning">Cancelar</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
