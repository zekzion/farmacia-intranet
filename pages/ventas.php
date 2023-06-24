<?php
    session_start();
    // Verificar si ya se ha iniciado sesión
    if (!isset($_SESSION['email'])) {
        header("Location: ../public/index.php");
        exit();
    }
    $titulo = "Reportes de ventas";
?>

    <!-- Estilos css -->
    <?php require "cabecera.php"; ?>

    <!-- navbar vertical -->
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-pills"></i></div>
                <div class="sidebar-brand-text mx-3"><span class="fs-5">Intranet</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" id="dashboard"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item" id="perfil"><a class="nav-link" href="perfil.php"><i class="fas fa-user"></i><span>Mi Perfil</span></a></li>
                <li class="nav-item" id="inventario">
                    <div><a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-2" href="#collapse-2" role="button"><i class="fas fa-th-large"></i>&nbsp;<span>Inventario</span></a>
                        <div class="collapse" id="collapse-2">
                            <div class="bg-white border rounded py-2 collapse-inner"><a class="collapse-item" href="productos.php">Productos</a><a class="collapse-item" href="categorias.php">Categorías</a></div>
                        </div>
                    </div>
                </li>
                <li class="nav-item" id="pedidos">
                    <a class="nav-link" href="../pages/pedidos.php">
                        <i class="fas fa-tasks"></i><span>Pedidos</span>
                    </a>
                </li>
                <li class="nav-item" id="reportes"><a class="nav-link active" href="ventas.php"><i class="fas fa-tasks"></i><span>Reporte de ventas</span></a></li>
                <li class="nav-item" id="calendario"><a class="nav-link" href="calendario.php"><i class="far fa-calendar"></i><span>Calendario</span></a></li>
                <li class="nav-item" id="docs"></li>
                <li class="nav-item" id="empleados"><a class="nav-link" href="empleados.php"><i class="fas fa-user"></i><span>Empleados</span></a></li>
                <li class="nav-item" id="clientes"><a class="nav-link" href="clientes.php"><i class="fas fa-user"></i><span>&nbsp;Clientes</span></a></li>
                <li class="nav-item" id="proveedores"><a class="nav-link" href="proveedores.php"><i class="fas fa-truck"></i><span>&nbsp;Proveedores</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>

    <!--nabvar horizontal de la pagina-->
    <?php  require "header.php"; ?>

    <!-- contenido principal -->
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark mb-0 fw-bold">Registro de ventas</h2><a class="btn btn-primary btn-sm d-none d-sm-inline-block" id="exportar-btn" onclick="descargarPDFGrafico('graficoVentas')" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generar Reporte</a>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-7">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Ventas mensuales (Nuevos Soles)</h6>
                    </div>
                    <div class="card-body" id="graficoVentas">
                        <!--  grafico de curvas para las ventas mensuales -->
                        <canvas id="chartVentas"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-5">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Categorías de producto mas vendidas</h6>
                    </div>
                    <div class="card-body">
                        <!--  grafico de curvas para las categorias mas vendidas -->
                        <canvas id="chartCategorias"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="productos">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary m-0 fw-bold">Productos más vendidos</h6>
                    </div>
                    <div class="card-body">
                        <!--  grafico de curvas para los productos mas vendidos -->
                        <canvas id="chartProductosMasVendidos"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary m-0 fw-bold">Productos menos vendidos</h6>
                    </div>
                    <div class="card-body">
                        <!--  grafico de curvas para los productos menos vendidos -->
                        <canvas id="chartProductosMenosVendidos"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer de la pagina -->
    <?php require "footer.php"; ?>





