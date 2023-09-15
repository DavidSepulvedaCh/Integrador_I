<?php

$user= "root";
$pass= "";
$host= "localhost";
$dbname = "proyecto";

$conectar = mysqli_connect($host,$user,$pass,$dbname);

$id = mysqli_real_escape_string($conectar, $_POST["id"]);

$sql = "SELECT * FROM items WHERE '$id' = id";

$queryusuario = mysqli_query($conectar, $sql);

$numero = mysqli_num_rows($queryusuario);



if ($numero == 1) {

    $sql = "DELETE FROM items WHERE '$id' = id";
    $ejecutar = mysqli_query($conectar, $sql);
    if ($ejecutar) {

        echo "<script> alert('Item eliminado exitosamente.');window.location='item-delete.html' </script>";
    } else {

        echo "<script> alert('Error. No se pudo eliminar el item');window.location='item-delete.html'</script>";
    }

} else {

    echo "<script> alert('No existe ningun item con ese ID');window.location='item-delete.html'</script>";

}

?>