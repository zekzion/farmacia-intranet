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
                <li class="nav-item" id="reportes"><a class="nav-link" href="ventas.php"><i class="fas fa-tasks"></i><span>Reporte de ventas</span></a></li>
                <li class="nav-item" id="calendario"><a class="nav-link" href="calendario.php"><i class="far fa-calendar"></i><span>Calendario</span></a></li>
                <li class="nav-item" id="docs"></li>
                <li class="nav-item" id="empleados"><a class="nav-link" href="empleados.php"><i class="fas fa-user"></i><span>Empleados</span></a></li>
                <li class="nav-item" id="clientes"><a class="nav-link active" href="clientes.php"><i class="fas fa-user"></i><span>&nbsp;Clientes</span></a></li>
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
            <h2 class="text-dark mb-0 fw-bold">Listado de Clientes</h2>
        </div>
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
            <div class="container-fluid">
                <form class="d-none d-sm-inline-block me-auto">
                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Buscar"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                </form>
                <ul class="navbar-nav align-items-center flex-nowrap ms-auto">
                    <li class="nav-item dropdown d-sm-none align-items-center m-auto no-arrow"><a class="dropdown-toggle nav-link align-items-center m-auto" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                        <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="me-auto navbar-search w-100">
                                <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                    <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group"><button class="btn btn-primary" type="button">Exportar</button><button class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" type="button"></button>
                            <div class="dropdown-menu"><a onclick="descargarPDF('dataTable')" class="dropdown-item" href="#">PDF</a></div>
                        </div>
                    </li>
                    <li class="nav-item ms-1"></li>
                </ul>
            </div>
        </nav>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal-eliminar-cliente">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Confirmar eliminación</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar este cliente?</p>
                    </div>
                    <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-danger" type="button">Eliminar</button></div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Mostrar<select class="d-inline-block form-select form-select-sm">
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
                            <th>Nombre</th>
                            <th>ID</th>
                            <th>Nombre de Usuario</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Telefóno</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="fw-semibold d-flex">
                                <div class="d-flex align-items-center" id="datos"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado"><a class="d-block order-first text-decoration-none" href="cliente-detalle.php">Cliente 1</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>1</td>
                            <td>usuario1</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar" class="ms-3" href="#" data-bs-target="#modal-eliminar-cliente" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-1"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-1"><a class="d-block order-first text-decoration-none" href="#">Cliente 2</a><i class="fas fa-circle text-danger me-1"></i><span class="order-last">Offline</span></div>
                            </td>
                            <td>2</td>
                            <td>usuario12</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-1" class="ms-3" href="#" data-bs-target="#modal-eliminar-cliente" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-2"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-2"><a class="d-block order-first text-decoration-none" href="#">Cliente 3</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>3</td>
                            <td>usuario123</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-2" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-3"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-3"><a class="d-block order-first text-decoration-none" href="#">Cliente4</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>4</td>
                            <td>usuario2</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-3" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-4"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-4"><a class="d-block order-first text-decoration-none" href="#">Cliente 5</a><i class="fas fa-circle text-danger me-1"></i><span class="order-last">Offline</span></div>
                            </td>
                            <td>5</td>
                            <td>usuario21</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-4" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-5"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-5"><a class="d-block order-first text-decoration-none" href="#">Cliente 6</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>6</td>
                            <td>usuario22</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-5" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-6"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-6"><a class="d-block order-first text-decoration-none" href="#">Cliente 7</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>7</td>
                            <td>usuario30</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-6" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-7"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-7"><a class="d-block order-first text-decoration-none" href="#">Cliente 8</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>8</td>
                            <td>usuario31</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-7" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-8"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-8"><a class="d-block order-first text-decoration-none" href="#">Cliente 9</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>9</td>
                            <td>usuario32</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-8" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        <tr>
                            <td class="d-flex">
                                <div class="d-flex align-items-center" id="datos-9"><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/avatars/avatar3.jpeg"></div>
                                <div id="estado-9"><a class="d-block order-first text-decoration-none" href="#">Cliente 10</a><i class="fas fa-circle text-success me-1"></i><span class="order-last">Online</span></div>
                            </td>
                            <td>10</td>
                            <td>usuario40</td>
                            <td>25</td>
                            <td>usuario@gmail.com</td>
                            <td>999 999 999</td>
                            <td><a id="eliminar-9" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando 1 a 10 de 27</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer de la pagina -->
    <?php require "footer.php"; ?>



