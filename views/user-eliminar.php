<?php

$user= "root";
$pass= "";
$host= "localhost";
$dbname = "proyecto";

$conectar = mysqli_connect($host,$user,$pass,$dbname);

$documento = mysqli_real_escape_string($conectar, $_POST["documento"]);

$sql = "SELECT * FROM usuarios WHERE '$documento' = documento";

$queryusuario = mysqli_query($conectar, $sql);

$numero = mysqli_num_rows($queryusuario);



if ($numero == 1) {

    $sql = "DELETE FROM usuarios WHERE '$documento' = documento";
    $ejecutar = mysqli_query($conectar, $sql);
    if ($ejecutar) {

        echo "<script> alert('Usuario eliminado exitosamente.');window.location='client-delete.html' </script>";
    } else {

        echo "<script> alert('Error. No se pudo eliminar el usuario');window.location='client-delete.html'</script>";
    }

} else {

    echo "<script> alert('No existe ningun usuario con esa identificacion');window.location='client-delete.html'</script>";

}

?>