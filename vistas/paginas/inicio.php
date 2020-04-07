<?php

if (!isset($_SESSION["usuarioValido"])) {
    echo '<script>window.location = "index.php?pagina=ingreso";</script>';
    return;
} else {
    if ($_SESSION["usuarioValido"] != "ok") {
        echo '<script>window.location = "index.php?pagina=ingreso";</script>';
        return;
    }
}


$clientes = ControladorFormularios::ctrListar();
#print_r($clientes);

?>

<h2>Inicio</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $key => $value) : ?>
            <tr>
                <td><?php echo $value["name"]; ?></td>
                <td><?php echo $value["email"]; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Editar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>