<?php
//session_start(); //colocar para $_SESSION
$mensaje="";
if(isset($_POST['btn_accion'])){

    switch($_POST['btn_accion']){
        case 'Agregar':

            if(is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))){
                $id=openssl_decrypt( $_POST['id'],COD,KEY);
            
            }else{ $mensaje.="ID incorrecto!".$id."<br/>";}
        
            
            

            if(is_string(openssl_decrypt( $_POST['nombre'],COD,KEY))){
                $nombre= openssl_decrypt( $_POST['nombre'],COD,KEY);
                $mensaje.="Nombre correcto!".$nombre."<br/>";
                }else{$mensaje.="nombre incorrecto!"."<br/>"; break; }

                if(is_numeric(openssl_decrypt( $_POST['cantidad'],COD,KEY))){
                    $cantidad=openssl_decrypt( $_POST['cantidad'],COD,KEY);
                    $mensaje.="cantidad correcta!".$cantidad."<br/>";
                }else{ $mensaje.="cantidad incorrecta!"."<br/>"; break;}

                if(is_numeric(openssl_decrypt( $_POST['precio'],COD,KEY))){
                    $precio=openssl_decrypt( $_POST['precio'],COD,KEY);
                    $mensaje.="El presio es ".$precio."<br/>";
                }else{ $mensaje.="cantidad incorrecta!"."<br/>"; break;}
            
            if(!isset($_SESSION['FACTURA'])){
                $producto=array(
                    'ID'=> $id,
                    'NOMBRE'=>$nombre,
                    'CANTIDAD'=>$cantidad,
                    'PRECIO'=>$precio
                );
                $_SESSION['FACTURA'][0]=$producto;
            }else{
                $numeroProductos=count($_SESSION['FACTURA']);
                $producto=array(
                    'ID'=> $id,
                    'NOMBRE'=>$nombre,
                    'CANTIDAD'=>$cantidad,
                    'PRECIO'=>$precio
                );
                $_SESSION['FACTURA'][$numeroProductos]=$producto;
            }
            $mensaje= print_r($_SESSION, true);


        break;

        case "Eliminar":
            if(is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))){
                $id=openssl_decrypt( $_POST['id'],COD,KEY);
               foreach($_SESSION['FACTURA'] as $indice=>$producto){
                    if($producto['ID']==$id){
                        unset($_SESSION['FACTURA'][$indice]);
                    }
                }

            }else{}
        break;

    }

}
?>