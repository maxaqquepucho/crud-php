


<form action="controlador/Usuario_controller.php?accion=iniciarSesion" method="POST">
  <div class="form-group">
    <label >Usuario</label>
    <input name="usuario" type="text" class="form-control" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label >Password</label>
    <input name="pass" type="password" class="form-control"  placeholder="Password">
  </div>
  <div class=" d-flex justify-content-around">
      <button type="submit" class="btn btn-primary">Ingresar</button>
      <button type="reset" class="btn btn-primary">Cancelar</button>
  </div>

</form>
