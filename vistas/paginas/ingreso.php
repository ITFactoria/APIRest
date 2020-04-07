<h2>Login</h2>
<div class="d-flex justify-content-center">
  <form class="p-5 bg-light" method="POST">

    <div class="form-group">
      <label for="email">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-lock"></i>
          </span>
        </div>
        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
      </div>
      
    </div>

    <div class="form-group">
      <label for="pwd">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-lock"></i>
          </span>
        </div>
        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
      </div>
      <?php

      #Instanciamiento metodo no estatico
      $ingreso = new ControladorFormularios();
      $ingreso -> ctrValidarUsuario(); 
      
      #Instanciamiento metodo estatico
      #$registro = ControladorFormularios::ctrRegistrar();
      if ($ingreso == "ok") {
        echo '<div>El usuario fue registrado exitosamente<div>';
      } 
      #else {
        #echo '<div>El usuario NO fue registrado exitosamente<div>';
      #}
      ?>

    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
  </form>
</div>