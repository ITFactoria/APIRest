<?php

class ControladorFormularios
{
    static public function ctrRegistrar()
    {
        if (isset($_POST["registroName"])) {
            $tabla = "clientes";
            $datos = array(
                "name" => $_POST["registroName"],
                "password" => $_POST["registroPassword"],
                "email" => $_POST["registroEmail"]
            );
            $respuesta = ModeloFormularios::mdlRegistrar($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrListar(){

        $tabla = "clientes";
        $respuesta = ModeloFormularios::mdlListar($tabla);
        return $respuesta;
    }

    public function ctrConsultarUsuario(){
        if (isset($_POST["email"])) {
            $tabla = "usuarios";
            $campo = "email";
            $valor =  $_POST["email"];
            $respuesta = ModeloFormularios::mdConsultarUsuario($tabla,$campo,$valor);
            print_r($respuesta);
            return $respuesta;
        }
    }

    static public function ctrActualizar()
    {
        if (isset($_POST["registroName"])) {
            $tabla = "clientes";
            $datos = array(
                "id" => $_POST["id"],
                "name" => $_POST["name"],
                "password" => $_POST["password"],
                "email" => $_POST["email"],
            );
            $respuesta = ModeloFormularios::mdlActualizar($tabla, $datos);
            return $respuesta;
        }
    }

    public function ctrEliminarUsuario(){
        if (isset($_POST["email"])) {
            $tabla = "usuarios";
            $campo = "email";
            $valor =  $_POST["email"];
            $respuesta = ModeloFormularios::mdElminarUsuario($tabla,$campo,$valor);
            print_r($respuesta);
            return $respuesta;
        }
    }



    public static function ctrValidarUsuario(){
        if (isset($_POST["email"])) {
            $tabla = "usuarios";
            $campo = "email";
            $valor =  $_POST["email"];
            $respuesta = ModeloFormularios::mdConsultarUsuario($tabla,$campo,$valor);
            print_r($respuesta);

            if($respuesta["email"]==$_POST["email"] && $respuesta["password"]==$_POST["password"]){

                $_SESSION["usuarioValido"] = "ok";
                echo "ingreso exitoso";
                echo '<script>window.location = "index.php?pagina=inicio"</script>';
            }
            else{ 
                echo "ingreso fallido";
            }
            return $respuesta;
        }
        
    }
}
?>