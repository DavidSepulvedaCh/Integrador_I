<?php
define("KEY", "develoteca");
define("COD", "AES-128-ECB");
include './factura.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Generar nueva factura</title>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="./css/normalize.css">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="./css/all.css">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="./css/sweetalert2.min.css">

    <!-- Sweet Alert V8.13.0 JS file-->
    <script src="./js/sweetalert2.min.js"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">

    <!-- General Styles -->
    <link rel="stylesheet" href="./css/style.css">

	<link rel="stylesheet" href="./css/styleeBuscar.css"


</head>


<body>
    <!-- Main container -->
    <main class="full-box main-container">
        <!-- Nav lateral -->
        <section class="full-box nav-lateral">
            <div class="full-box nav-lateral-bg show-nav-lateral"></div>
            <div class="full-box nav-lateral-content">
                <figure class="full-box nav-lateral-avatar">
                    <i class="far fa-times-circle show-nav-lateral"></i>
                    <img src="./assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
                    <figcaption class="roboto-medium text-center">
                        Carlos Alfaro <br><small class="roboto-condensed-light">Web Developer</small>
                    </figcaption>
                </figure>
                <div class="full-box nav-lateral-bar"></div>
                <nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="home.html"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="client-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a>
								</li>
								<li>
									<a href="client-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</a>
								</li>
								<li>
									<a href="client-buscar.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar cliente</a>
								</li>
								<li>
									<a href="client-delete.html"><i class="fas fa-solid fa-minus"></i> &nbsp;   Bajar Cliente</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Items <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="item-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar item</a>
								</li>
								<li>
									<a href="item-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de items</a>
								</li>
								<li>
									<a href="item-buscar.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar item</a>
								</li>
								<li>
									<a href="item-delete.html"><i class="fas fa-solid fa-minus"></i> &nbsp;   Bajar item</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Facturas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="./new-factura.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Generar Factura</a>
								</li>
								<li>	
									<a href="./facturas.php"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; Facturas</a>
								</li>
								<li>
									<a href="./facturas-search.php"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar factura</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="user-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a>
								</li>
								<li>
									<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
								</li>
								<li>
									<a href="user-buscar.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
								</li>
								<li>
									<a href="user-delete.html"><i class="fas fa-solid fa-minus"></i> &nbsp; Bajar Usuario</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="company.html"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Empresa</a>
						</li>
					</ul>
                </nav>
            </div>
        </section>
        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="user-update.html">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
			<?php

            if(!empty($_POST)){
                $cnx = mysqli_connect("localhost", "root", "", "proyecto");
            $id=$_POST['id'];
            $sql = "SELECT id, nombre, descripcion, stock, precio as p
                    FROM items
                    WHERE '$id' = id
                    
                    order by p desc";
            $rta = mysqli_query($cnx, $sql);
            }else{
                header("location: consultar.php");
            }
            ?>

			

            <!-- Page header -->
			<H1>GENERAR NUEVA FACTURA</H1>
			
			<center>
				<div>
					<form action="./nueva-factura.php" method="post">
						<input class="buscar_cl" type="text" name="id" id="id" required>
						<input class="buscar_btn" type="submit" value="Buscar" id="btn">
					</form>
				</div>

				<table class="table">
					<tr>
						<td><b>ID</b></td>
						<td><b>NOMBRE</b></td>
						<td><b>DESCRIPCION</b></td>
						<td><b>STOCK</b></td>
						<td><b>PRECIO</b></td>
					</tr>


					
					<?php
						while ($mostrar = mysqli_fetch_row($rta)) {
						?>
						<tr>
							<td><?php echo $mostrar[0] ?></td>
							<td><?php echo $mostrar[1] ?></td>
							<td><?php echo $mostrar[2] ?></td>
							<td><?php echo $mostrar[3] ?></td>
							<td><?php echo $mostrar[4] ?></td>
							<td>	
								<form action="" method="POST">
									<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($mostrar[0],COD,KEY); ?>">
									<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($mostrar[1],COD,KEY); ?>">
									<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($mostrar[4],COD,KEY); ?>">
									<input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
									<button class="btn" name="btn_accion" value="Agregar" type="submit">Agregar</button>
								</form>
							</td>
						</tr>
					<?php
					}
					?>
				</table>

				<br>
				<div>
					<h3 align="left"><b>Listas de productos</b></h3>
					<p>Articulos (<?php echo (empty($_SESSION['FACTURA']))?0:count($_SESSION['FACTURA']);?>)</p>
				</div>
				
				
				
				<?php if(!empty($_SESSION['FACTURA'])){?>

				<table class="table">
					<tbody>
						
						<tr>
							<th width="40%">DESCRIPCION</th>
							<th width="15%">CANTIDAD</th>
							<th width="20%">PRECIO</th>
							<th width="20%">TOTAL</th>
							<th width="5%">--</th>
						</tr>

						<?php $total=0; ?>
						<?php foreach($_SESSION['FACTURA'] as $indice=>$producto) {?>

						<tr>
							<td ><?php echo $producto['NOMBRE']?></td>
							<td ><?php echo $producto['CANTIDAD']?></td>
							<td ><?php echo $producto['PRECIO']?></td>
							<td ><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2); ?></td>
							<td>
								<form action="" method="post">
									<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY); ?>">
									<button class="btn" type="submit" name="btn_accion" value="Eliminar">Eliminar</button>
								</form>
								
							</td>
						</tr>
						<?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
						<?php }?>

						<tr>
							<td colspan="3" align="right"><h3><b>TOTAL</b></h3></td>
							<td align="right"><h3><b>$<?php echo number_format($total,2);?></b></h3></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="5">
								<form action="pagar.php" method="POST">
									<div>
										<div>
											<label for="my-input">Correo de contacto</label>
											<input class="buscar_cl" type="mail"  id="email" name="email"  placeholder="Ingrese tu correo, para completar la compra" require>
										</div>
										<small id="emailHelp" >
											El detalle de la compra sera relacionado con el correo que ingreses.
										</small>
									</div>
									<button class="btn" type="submit" name="btn_accion" value="proceder">>>Proceder a pagar<<</button>
								</form>
							</td>
						</tr>
					</tbody>
				
				</table>
				<?php }else{ ?>
				<div>
					<h2>No hay productos!.</h2>
				</div>
				<?php }?>
			</center>
          

        </section>
    </main>
    
    	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="./js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="./js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="./js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="./js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="./js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="./js/main.js" ></script>
</body>
</html>