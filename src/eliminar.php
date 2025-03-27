<?php
session_start();
if (!in_array($_SESSION['rol'], [1, 2, 3])) {
    header('Location: permisos.php');
    exit;
}
require("../conexion.php");
if (empty($_SESSION['idUser'])) {
    header('Location: ../');
}
if (!empty($_GET['id']) && !empty($_GET['accion'])) {
    $id = $_GET['id'];
    $table = $_GET['accion'];
    $id_user = $_SESSION['idUser'];
    $query_delete = mysqli_query($conexion, "UPDATE $table SET estado = 0 WHERE id = $id");
    mysqli_close($conexion);
    header("Location: " . $table . '.php');
}
