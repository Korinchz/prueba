<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION["usu_id"])){
		$mysqli = new mysqli("localhost", "root", "", "helpdesk");
		$queryUsuario = "call llamado_borrados()";
    $resultadoUsuario = $mysqli -> query($queryUsuario);
	//$usuarioEncontrado = mysqli_fetch_array($resultadoUsuario);
?>
<!DOCTYPE html>
<html>
    <?php require_once "../MainHead/head.php"; ?>
    <title>Historial de Usuarios</title>
</head>
<body class="with-side-menu">

    <?php require_once "../MainHeader/header.php";?>

	<div class="mobile-menu-left-overlay"></div>

    <?php require_once "../MainNav/nav.php";?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Log Usuarios</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Log de Usuarios</li>
							</ol>
						</div>
					</div>
				</div>
			</header> 

			<div class="box-typical box-typical-padding">
			
				<table class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;" class="text-center">Nombre</th>
							<th style="width: 10%;">Apellido</th>
							<th class="d-none d-sm-table-cell" style="width: 15%;">Correo</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Contraseña</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Rol</th>
							
							
							
						</tr>
					</thead>
					<tbody>
					<?php
                            While($fila = mysqli_fetch_array($resultadoUsuario))
                            {
                                echo "<tr>";
                                echo "<td>" . $fila["usu_nom"] . "</td>";
                                echo "<td>" . $fila["usu_ape"] . "</td>";
								echo "<td>" . $fila["usu_correo"] . "</td>";
                                echo "<td>" . $fila["usu_pass"] . "</td>";
								echo "<td>" . $fila["rol_id"] . "</td>";
                                
                                
                                
                                echo "</tr>";
                            }
                        ?>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->

	<?php require_once 'modalmantenimiento.php'; ?>
	<?php require_once '../MainJS/js.php'; ?>
	<script type="text/javascript" src="mntusuario.js"></script>

</body>
</html>
<?php
	}else{
		header("Location:".conectar::ruta()."index.php");
	}
?>