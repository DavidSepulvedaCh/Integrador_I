<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Buscar item</title>

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

    <!-- Etilo buscar usuario -->
    <link rel="stylesheet" href="./css/styleeBuscar.css">


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
            $documento=$_POST['buscar_cl'];
            $sql = "SELECT nombre, apellido, documento, correo as p
                    FROM usuarios
                    WHERE '$documento' = documento
                    
                    order by p desc";
            $rta = mysqli_query($cnx, $sql);
            }else{
                echo "<script> alert('No existe ningun usuario con esa cedula');window.location='user-buscar.php'</script>";
            }
            ?>
            <center>
                <br>
                <h2>BUSQUEDA DE USUARIO</h2>
                <p class="parrafo">Bienvenido al modulo de busqueda de usuario para la empresa Auto-LUXUA; para buscar un usuario por favor ingrese el numero de cedula. A continuacion se mostrara la informacion relacionada a ese usuario.   </p>
                    <div>
                        <form action="./user-search.php" method="post">
                            <input type="text" class="buscar_cl" name="buscar_cl" id="buscar_cl" required>
                            <input type="submit" class="buscar_btn" value="Buscar" id="btn">
                        </form>
                    </div>
                    <br>
                    <div>
                        <table class="table">
                            <tr>
                                <th><b>NOMBRE</b></th>
                                <th><b>APELLIDO</b></th>
                                <th><b>DOCUMENTO</b></th>
                                <th><b>CORREO</b></th>
                            </tr>
                            <?php
                            while ($mostrar = mysqli_fetch_row($rta)) {
                            ?>
                            <tr>
                                <td><?php echo $mostrar[0] ?></td>
                                <td><?php echo $mostrar[1] ?></td>
                                <td><?php echo $mostrar[2] ?></td>
                                <td><?php echo $mostrar[3] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </table>
                    </div>
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