<?php
require_once '../model/Usuario.php';
extract($_REQUEST);
$conexion = new Conexion();

$ObjUsuario = new Usuario(null, $nombreUsuario, $idRol, $correoUsuario, $contraseñaUsuario);

$resultado = $ObjUsuario->agregarUsuario();

if ($resultado) {
    header("location: ../index.php");
} else {
    echo 'no se pudo hacer el registro del usuario';
}
    



        // $ObjUsuario = new Usuario(null, $_REQUEST['nombreUsuario'],null,$_REQUEST['correoUsuario'],$_REQUEST['contraseñaUsuario']);

        // if ($ObjUsuario -> consultarNombresCorreos($_REQUEST['nombreUsuario'],$_REQUEST['correoUsuario'])){
        //     echo "el usaurio ya existe";
        // }
        // else{
        //     $resultado = $ObjUsuario -> agregarUsuario();
    
        // if($resultado){
        //     header("location: ../views/catalogo.php");
        // }
        // else{
            
        // }
        //     header("location: ../index.php");
