<?php
session_start();
// Verificar si ya se ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: ../public/index.php");
    exit();
}
$titulo = "Pagina de Inicio";
?>
    <!-- Estilos css -->
<?php require "cabecera.php"; ?>

    <!-- navbar vertical -->
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-pills"></i></div>
                <div class="sidebar-brand-text mx-3">
                    <span class="fs-5">Intranet</span>
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" id="dashboard">
                    <a class="nav-link active" href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" id="perfil">
                    <a class="nav-link" href="../pages/perfil.php">
                        <i class="fas fa-user"></i><span>Mi Perfil</span>
                    </a>
                </li>
                <li class="nav-item" id="inventario">
                    <div>
                        <a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="false"
                           aria-controls="collapse-2" href="#collapse-1" role="button">
                            <i class="fas fa-th-large"></i>&nbsp;<span>Inventario</span>
                        </a>
                        <div class="collapse" id="collapse-1">
                            <div class="bg-white border rounded py-2 collapse-inner">
                                <a class="collapse-item" href="../pages/productos.php">Productos</a>
                                <a class="collapse-item" href="../pages/categorias.php">Categorías</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item" id="reportes">
                    <a class="nav-link" href="../pages/ventas.php">
                        <i class="fas fa-tasks"></i><span>Reporte de ventas</span>
                    </a>
                </li>
                <li class="nav-item" id="calendario">
                    <a class="nav-link" href="../pages/calendario.php">
                        <i class="far fa-calendar"></i><span>Calendario</span>
                    </a>
                </li>
                <li class="nav-item" id="empleados">
                    <a class="nav-link" href="../pages/empleados.php">
                        <i class="fas fa-user"></i><span>Empleados</span>
                    </a>
                </li>
                <li class="nav-item" id="clientes">
                    <a class="nav-link" href="../pages/clientes.php">
                        <i class="fas fa-user"></i><span>&nbsp;Clientes</span>
                    </a>
                </li>
                <li class="nav-item" id="proveedores">
                    <a class="nav-link" href="../pages/proveedores.php">
                        <i class="fas fa-truck"></i><span>&nbsp;Proveedores</span>
                    </a>
                </li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>

    <!--nabvar horizontal de la pagina-->
<?php require "header.php"; ?>

    <!-- contenido main de la pagina -->
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark mb-0 fw-bold">Dashboard</h2>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#">
                <i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generar Reporte
            </a>

        </div>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Bienvenido <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?></h3>
        </div>

        <div class="row">

            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold text-x mb-1">
                                    <span>Total de clientes</span></div>
                                <div class="text-dark fw-bold h5 mb-0"><span>50</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x" style="color: rgb(78,115,223);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-success py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-success fw-bold text-x mb-1">
                                    <span style="color: rgb(28, 200, 138);">clientes nuevos</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>3</span></div>
                            </div>
                            <div class="col-auto" style="color: var(--bs-blue);">
                                <i class="fas fa-user-plus fa-2x"
                                   style="background: var(--bs-dropdown-link-active-color);color: rgb(28,200,138);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-info py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-info fw-bold text-x mb-1">
                                    <span>ventas de hoy</span>
                                </div>
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto">
                                        <div class="text-dark fw-bold h5 mb-0 me-3">
                                            <span>S/. 999.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-donate fa-2x" style="color: rgb(54,185,204);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-warning py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-warning fw-bold text-x mb-1">
                                    <span>VENTAS MENSUALES</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0">
                                    <span>S/. 999.00</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cash-register fa-2x" style="color: rgb(246,194,62);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Ventas mensuales</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;En&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Abr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Ag&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Ingresos&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;1350&quot;,&quot;2000&quot;,&quot;3000&quot;,&quot;2000&quot;,&quot;1505&quot;,&quot;4000&quot;,&quot;3500&quot;,&quot;5500&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;position&quot;:&quot;top&quot;},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;,&quot;display&quot;:false},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:true},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Resumen de inventario</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Categoría 1&quot;,&quot;Categoría 2&quot;,&quot;Categoría 3&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas>
                        </div>
                        <div class="text-center small mt-4">
                            <span class="me-2">
                                <i class="fas fa-circle text-primary"></i>&nbsp;Categoría 1
                            </span>
                            <span class="me-2">
                                <i class="fas fa-circle text-success"></i>&nbsp;Categoría 2
                            </span>
                            <span class="me-2">
                                <i class="fas fa-circle text-info"></i>&nbsp;Categoría 3
                            </span>
                        </div>
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
                        <div class="chart-area">
                            <canvas data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Producto 1&quot;,&quot;Producto 2&quot;,&quot;Producto 3&quot;,&quot;Producto 4&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Vendidos&quot;,&quot;backgroundColor&quot;:&quot;#4e73df&quot;,&quot;borderColor&quot;:&quot;#4e73df&quot;,&quot;data&quot;:[&quot;1000&quot;,&quot;2000&quot;,&quot;3000&quot;,&quot;4000&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;beginAtZero&quot;:true,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;beginAtZero&quot;:true,&quot;padding&quot;:20}}]}}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary m-0 fw-bold">Productos menos vendidos</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Producto 1&quot;,&quot;Producto 2&quot;,&quot;Producto 3&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:true,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;position&quot;:&quot;bottom&quot;},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- fin del contenido principal -->

<?php require "footer.php"; ?>