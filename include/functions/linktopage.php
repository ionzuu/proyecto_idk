<?php
    session_start();
    if(isset($_POST['clave'])){
        $_SESSION["geti"] = 1;
        header("Location: ../../menu/clavedemateria.php?page=1");
    }
    if(isset($_POST['dias_clase'])){
        $_SESSION["geti"] = 2;
        header("Location: ../..diasclase.php.php");
    }
    if(isset($_POST['grupos'])){
        $_SESSION["geti"] = 3;
        header("Location: ../../grupos.php");
    }
    if(isset($_POST['horas_clase'])){
        $_SESSION["geti"] = 4;
        header("Location: ../../horasclase.php");
    }
    if(isset($_POST['materias'])){
        $_SESSION["geti"] = 5;
        header("Location: ../../materias.php");
    }
    if(isset($_POST['plan'])){
        $_SESSION["geti"] = 6;
        header("Location: ../../plan.php");
    }
    if(isset($_POST['salones'])){
        $_SESSION["geti"] = 7;
        header("Location: ../../salones.php");
    }
    if(isset($_POST['semestre'])){
        $_SESSION["geti"] = 8;
        header("Location: ../../semestre.php");
    }
    if(isset($_POST['distribuciones'])){
        $_SESSION["geti"] = 9;
        header("Location: ../../distribuciones.php");
    }
?>