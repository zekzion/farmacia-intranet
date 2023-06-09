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
            <li class="nav-item" id="reportes"><a class="nav-link" href="ventas.php"><i class="fas fa-tasks"></i><span>Reporte de ventas</span></a></li>
            <li class="nav-item" id="calendario"><a class="nav-link" href="calendario.php"><i class="far fa-calendar"></i><span>Calendario</span></a></li>
            <li class="nav-item" id="docs"></li>
            <li class="nav-item" id="empleados"><a class="nav-link" href="empleados.php"><i class="fas fa-user"></i><span>Empleados</span></a></li>
            <li class="nav-item" id="clientes"><a class="nav-link" href="clientes.php"><i class="fas fa-user"></i><span>&nbsp;Clientes</span></a></li>
            <li class="nav-item" id="proveedores"><a class="nav-link active" href="proveedores.php"><i class="fas fa-truck"></i><span>&nbsp;Proveedores</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>

    <!--nabvar horizontal de la pagina-->
    <?php  require "header.php"; ?>

    <!-- contenido principal -->
    <div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark mb-0 fw-bold">Proveedores</h2>
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
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">PDF</a></div>
                    </div>
                </li>
                <li class="nav-item ms-1"><button class="btn btn-primary" type="button" style="border-bottom-style: none;" data-bs-target="#modal-agregar-proveedor" data-bs-toggle="modal">Nuevo</button></li>
            </ul>
        </div>
    </nav>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-agregar-proveedor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Agregar nuevo proveedor</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label form-label" for="proveedor_nombre">Nombre</label><input type="text" class="form-control" name="proveedor_nombre"></div>
                    <div class="mb-3"><label class="form-label form-label" for="proveedor_email">Email</label><input type="text" class="form-control" name="proveedor_email"></div>
                    <div class="mb-3"><label class="form-label form-label" for="proveedor_contacto">Contacto</label><input type="text" class="form-control" name="proveedor_contacto"></div>
                    <div class="mb-3"><label class="form-label form-label" for="proveedor_telefono">Teléfono</label><input type="text" class="form-control" name="proveedor_telefono"></div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-success link-light" type="button">Guardar</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-eliminar-proveedor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Confirmar eliminación</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este proveedor?</p>
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
                <table class="table my-0" id="dataTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Proveedor 1</td>
                        <td>email@gmail.com</td>
                        <td>Contacto 1</td>
                        <td>999 999 999</td>
                        <td class="text-start"><a id="editar" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar" class="ms-3" href="#" data-bs-target="#modal-eliminar-proveedor" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Proveedor 2</td>
                        <td>email@gmail.com</td>
                        <td>Contacto 2</td>
                        <td>999 999 999</td>
                        <td><a id="editar-1" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-1" class="ms-3" href="#" data-bs-target="#modal-eliminar-proveedor" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Proveedor 3</td>
                        <td>email@gmail.com</td>
                        <td>Contacto 3</td>
                        <td>999 999 999</td>
                        <td><a id="editar-2" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-2" class="ms-3" href="#" data-bs-target="#modal-eliminar-proveedor" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Proveedor 4</td>
                        <td>email@gmail.com</td>
                        <td>Contacto 4</td>
                        <td>999 999 999</td>
                        <td><a id="editar-3" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-3" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Proveedor 5</td>
                        <td>email@gmail.com</td>
                        <td>Contacto 5</td>
                        <td>999 999 999</td>
                        <td><a id="editar-4" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-4" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Proveedor 6</td>
                        <td>email@gmail.com</td>
                        <td>Contacto 6</td>
                        <td>999 999 999</td>
                        <td><a id="editar-5" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-5" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                    </tr>
                    <tr></tr>
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


