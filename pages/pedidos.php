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
        <h2 class="text-dark mb-0 fw-bold">Pedidos</h2>

        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top mt-4">
            <div class="container-fluid">
                <form class="d-none d-sm-inline-block me-auto">
                    <div class="input-group">
                        <input class="bg-light form-control border-0 small" type="text" placeholder="Buscar">
                        <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav align-items-center flex-nowrap ms-auto">
                    <li class="nav-item dropdown d-sm-none align-items-center m-auto no-arrow">
                        <a class="dropdown-toggle nav-link align-items-center m-auto" aria-expanded="false"
                           data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                        <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="me-auto navbar-search w-100">
                                <div class="input-group">
                                    <input class="bg-light form-control border-0 small" type="text" placeholder="Buscar">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary py-0" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <li class="nav-item ms-1">
                        <button class="btn btn-primary" type="button" style="border-bottom-style: none;"
                                data-bs-target="#modal-agregar-empleado" data-bs-toggle="modal">Nuevo Pedido
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal-agregar-empleado">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Agregar nuevo empleado</h5>
                        <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><label class="form-label form-label" for="proveedor_nombre">Nombre</label><input
                                    type="text" id="nombre-empleado" class="form-control" name="nombre-empleado"></div>
                        <div class="mb-3"><label class="form-label form-label" for="edad-empleado">Edad</label><input
                                    type="text" id="edad-empleado" class="form-control" name="edad-empleado"></div>
                        <div class="mb-3"><label class="form-label form-label" for="email-empleado">Email</label><input
                                    type="text" id="email-empleado" class="form-control" name="email-empleado"></div>
                        <div class="mb-3"><label class="form-label form-label"
                                                 for="empleado-telefono">Teléfono</label><input type="text"
                                                                                                id="empleado-telefono"
                                                                                                class="form-control"
                                                                                                name="empleado-telefono">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success link-light" type="button">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label
                                    class="form-label">Mostrar<select class="d-inline-block form-select form-select-sm">
                                    <option value="10" selected="">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>&nbsp;</label></div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table table-hover my-0" id="dataTable">
                        <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Monto</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a class="text-decoration-none" href="detalle_pedido.php">1111</a></td>
                                <td>24/06/2023</td>
                                <td>Nombre Proveedor</td>
                                <td>Producto X</td>
                                <td>100</td>
                                <td>S/. 999.99</td>
                                <td><span class="text-bg-secondary badge">Pendiente</span></td>
                            </tr>
                            <tr>
                                <td><a class="text-decoration-none" href="detalle_pedido.php">1111</a></td>
                                <td>24/06/2023</td>
                                <td>Nombre Proveedor</td>
                                <td>Producto X</td>
                                <td>100</td>
                                <td>S/. 999.99</td>
                                <td><span class="badge bg-success">Completado</span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando 1 a 10 de
                            27</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span
                                                aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                                aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- fin del contenido principal -->

<?php require "footer.php"; ?>