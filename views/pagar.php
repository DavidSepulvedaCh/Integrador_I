<?php
include './factura.php';
include './config.php';
include './conexion.php'
?>

<?php 

if($_POST){
    $total=0;
    $correo=$_POST['email'];

    foreach($_SESSION['FACTURA'] as $indice=>$producto){
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

    }
    $sentencia=$pdo->prepare("INSERT INTO ventas 
                        (fecha, correo, total) 
    VALUES (current_timestamp(),:correo,:total);");

    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":total",$total);
    $sentencia->execute();
    $idVenta=$pdo->lastInsertId();

    foreach($_SESSION['FACTURA'] as $indice=>$producto){
        $sentencia1=$pdo->prepare("INSERT INTO detalle_venta (id, id_venta, id_producto, precio_unitario, cantidad) 
        VALUES (NULL,:IDVENTA,:IDPRODUCTO,:PRECIOUNITARIO,:CANTIDAD);");
        $sentencia1->bindParam(":IDVENTA",$idVenta);
        $sentencia1->bindParam(":IDPRODUCTO",$producto['ID']);
        $sentencia1->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
        $sentencia1->bindParam(":CANTIDAD",$producto['CANTIDAD']);
        $sentencia1->execute();
    }
    
    

    echo "<script> alert('Compra realizada exitosamente');window.location='./new-factura.php' </script>";
}

?>