<?php
session_start();
// Verificar si ya se ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: ../public/index.php");
    exit();
}
$titulo = "Pedidos";
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
                    <a class="nav-link" href="dashboard.php">
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
                <li class="nav-item" id="pedidos">
                    <a class="nav-link  active" href="../pages/pedidos.php">
                        <i class="fas fa-tasks"></i><span>Pedidos</span>
                    </a>
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
        <h2 class="text-dark mb-0 fw-bold">Detalle Pedido Nro: X</h2>

        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Detalles de Productos</p>
                    </div>
                    <div class="card-body text-center">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Precio Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="fw-semibold d-flex">
                                    <div class="d-flex align-items-center" id="datos">
                                        <img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg">
                                    </div>
                                    <div id="estado">
                                       Producto 1
                                    </div>
                                </td>
                                <td>1</td>
                                <td>25</td>
                                <td>999.99</td>

                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <div class="d-flex align-items-center" id="datos-1">
                                        <img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg">
                                    </div>
                                    <div id="estado-1">
                                        Producto 2
                                    </div>
                                </td>
                                <td>2</td>
                                <td>25</td>
                                <td>999.99</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Detalles de Proveedor</p>
                    </div>
                    <div class="card-body text-center">
                        <table class="table table-hover my-0" id="dataTable">
                            <tbody>
                            <tr>
                                <td class="text-start">Nombre de Proveedor</td>
                                <td class="text-end">Proveedor 1</td>
                            </tr>
                            <tr>
                                <td class="text-start">Nombre de Proveedor</td>
                                <td class="text-end">Proveedor 1</td>
                            </tr>
                            <tr>
                                <td class="text-start">Nombre de Proveedor</td>
                                <td class="text-end">Proveedor 1</td>
                            </tr>
                            <tr>
                                <td class="text-start">Nombre de Proveedor</td>
                                <td class="text-end">Proveedor 1</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Resumen de pedido</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover" id="dataTable">
                                    <tbody>
                                    <tr>
                                        <td>Pedido creado</td>
                                        <td class="text-end">999.99</td>

                                    </tr>
                                    <tr>
                                        <td>Hora</td>
                                        <td class="text-end">999.99</td>
                                    </tr>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end">Total</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <table class="table border-0" id="dataTable">
                                    <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end">999.99</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- fin del contenido principal -->

<?php require "footer.php"; ?>
