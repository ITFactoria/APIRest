<h2>Registro</h2>
<div class="d-flex justify-content-center">
  <form class="p-5 bg-light" method="POST">

    <div class="form-group">
      <label for="name">Name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="registroName">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <div class="form-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-lock"></i>
          </span>
        </div>
      </div>
      <input type="email" class="form-control" placeholder="Enter email" id="email" name="registroEmail">
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-lock"></i>
          </span>
        </div>
        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="registroPassword">
      </div>
      <?php

      #Instanciamiento metodo no estatico
      #$registro = new ControladorFormularios();
      #$registro -> ctrRegistrar(); 

      #Instanciamiento metodo estatico
      $registro = ControladorFormularios::ctrRegistrar();
      if ($registro == "ok") {
        echo '<div>El usuario fue registrado exitosamente<div>';
      } 
      #else {
        #echo '<div>El usuario NO fue registrado exitosamente<div>';
      #}
      ?>

    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>