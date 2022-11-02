<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $resultado=$user->delete("clavemateria", "id_clavemateria = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
            header("Location: ../../menu/clavedemateria.php?page=1");
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/clavedemateria.php?page=1");
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/clavedemateria.php?page=1');
}else
if(isset($_POST['edit'])){
    $clave = $_POST['clave'];
    $desc = $_POST['desc'];
    $idedit = $_SESSION['idclave'];
    $resultado=$user->update("clavemateria","nombre_clave = '$clave', descripcion = '$desc'","id_clavemateria = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        header('Location: ../../menu/clavedemateria.php?page=1');
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentar');</script>";
        header('Location: ../../menu/editclave.php');
    }
}
?>