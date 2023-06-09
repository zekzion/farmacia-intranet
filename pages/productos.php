<?php

// se incluye el header para todas las paginas expecto INVENTARIO > PRODUCTOS e INVENTARIO > CATEGORIAS
$titulo = "Lista de productos";
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
include "$_SERVER[DOCUMENT_ROOT]/pages/header.php";
?>

<body id="page-top">

<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-pills"></i></div>
                <div class="sidebar-brand-text mx-3"><span class="fs-5">Intranet</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" id="dashboard"><a class="nav-link" href="../public/index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item" id="perfil"><a class="nav-link" href="perfil.php"><i class="fas fa-user"></i><span>Mi Perfil</span></a></li>
                <li class="nav-item" id="inventario">
                    <div><a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-2" href="#collapse-2" role="button"><i class="fas fa-th-large"></i>&nbsp;<span>Inventario</span></a>
                        <div class="collapse" id="collapse-2">
                            <div class="bg-white border rounded py-2 collapse-inner"><a class="fw-bold collapse-item" href="productos.php">Productos</a><a class="collapse-item" href="categorias.php">Categorías</a></div>
                        </div>
                    </div>
                </li>
                <li class="nav-item" id="reportes"><a class="nav-link" href="ventas.php"><i class="fas fa-tasks"></i><span>Reporte de ventas</span></a></li>
                <li class="nav-item" id="calendario"><a class="nav-link" href="calendario.php"><i class="far fa-calendar"></i><span>Calendario</span></a></li>
                <li class="nav-item" id="docs"></li>
                <li class="nav-item" id="empleados"><a class="nav-link" href="empleados.php"><i class="fas fa-user"></i><span>Empleados</span></a></li>
                <li class="nav-item" id="clientes"><a class="nav-link" href="clientes.php"><i class="fas fa-user"></i><span>&nbsp;Clientes</span></a></li>
                <li class="nav-item" id="proveedores"><a class="nav-link" href="proveedores.php"><i class="fas fa-truck"></i><span>&nbsp;Proveedores</span></a></li>
                <li class="nav-item" id="notificaciones"><a class="nav-link" href="notificaciones.php"><i class="fas fa-bell"></i><span>Notificaciones</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle invisible nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">2+</span><i class="fas fa-bell fa-fw"></i></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                    <h6 class="dropdown-header">notificaciones</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500"><span style="color: rgb(52, 53, 62);">Lorem ipsum dolor</span></span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                        </div>
                                    </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                        </div>
                                        <div><span class="small text-gray-500"><span style="color: rgb(52, 53, 62);">Lorem ipsum dolor</span></span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                        </div>
                                    </a><a class="dropdown-item text-center small text-gray-500" href="notificaciones.php">Mostrar todo</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Usuario</span><i class="fas fa-user"></i></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="perfil.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="login.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cerrar Sesión</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="modal fade" role="dialog" tabindex="-1" id="modal-agregar-producto">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-secondary">Registrar Nuevo Producto</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row" id="nom">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="service_name"><strong>Nombre</strong></label><input class="form-control" type="text" id="service_name-1" placeholder="Nombre del Producto" name="nombre-producto" required=""></div>
                                    </div>
                                </div>
                                <div id="descrip" class="mb-3"><label class="form-label" for="client_description"><strong>Descripción</strong></label><textarea class="form-control" id="service_description-1" rows="4" name="descripcion-producto" placeholder="Descripción del Producto" required=""></textarea></div>
                                <div class="row" id="prec-cant">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="service_client_start_date"><strong>Precio</strong></label><input class="form-control" type="text"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="service_client_end_date"><strong>Cantidad</strong></label><input class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div id="img-prod-1" class="mb-3"><label class="form-label" for="service_client_payment_validated"><strong>Imagen del Producto</strong></label>
                                    <div class="form-group mb-3"><input class="form-control" type="file" name="imagen-producto"></div>
                                </div>
                                <div id="error-entrada" class="mb-3"><span class="fw-bold text-danger"></span></div>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-primary" type="button">Guardar</button></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modal-editar-producto">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-secondary">Editar Producto</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row" id="nom-1">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="service_name"><strong>Nombre</strong></label><input class="form-control" type="text" id="service_name-2" name="nombre-producto" required=""></div>
                                    </div>
                                </div>
                                <div id="descrip-1" class="mb-3"><label class="form-label" for="client_description"><strong>Descripción</strong></label><textarea class="form-control" id="service_description-2" rows="4" name="descripcion-producto" required=""></textarea></div>
                                <div class="row" id="prec-cant-1">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="service_client_start_date"><strong>Precio</strong></label><input class="form-control" type="text"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="service_client_end_date"><strong>Cantidad</strong></label><input class="form-control" type="text"></div>
                                    </div>
                                </div>
                                <div id="img-prod-2" class="mb-3"><label class="form-label" for="service_client_payment_validated"><strong>Imagen del Producto</strong></label>
                                    <div class="form-group mb-3"><input class="form-control" type="file" name="imagen-producto"></div>
                                </div>
                                <div id="error-entrada-1" class="mb-3"><span class="fw-bold text-danger"></span></div>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-primary" type="button">Guardar</button></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modal-eliminar-producto">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold">Confirmar eliminación</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Estás seguro de que deseas eliminar este producto?</p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-danger" type="button">Eliminar</button></div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h2 class="fw-bold text-dark mb-4">Listado de Productos</h2>
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
                            <li class="nav-item ms-1"><button class="btn btn-primary" type="button" style="border-bottom-style: none;" data-bs-target="#modal-agregar-producto" data-bs-toggle="modal">Nuevo</button></li>
                        </ul>
                    </div>
                </nav>
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
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img class="me-2" width="30" height="30" src="../assets/img/productos/1.png">Ibuprofeno 400mg</td>
                                    <td>Medicamentos</td>
                                    <td>S/. 99</td>
                                    <td>33</td>
                                    <td class="text-start"><a id="editar" href="#" data-bs-target="#modal-editar-producto" data-bs-toggle="modal"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar" class="ms-3" href="#" data-bs-target="#modal-eliminar-producto" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/productos/1.png">Paracetamol 500mg</td>
                                    <td>Medicamentos</td>
                                    <td>S/. 99</td>
                                    <td>47</td>
                                    <td><a id="editar-1" href="#" data-bs-target="#modal-editar-producto" data-bs-toggle="modal"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-1" class="ms-3" href="#" data-bs-target="#modal-eliminar-producto" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/productos/1.png">Ibuprofeno 400mg</td>
                                    <td>Medicamentos</td>
                                    <td>S/. 99</td>
                                    <td>66</td>
                                    <td><a id="editar-2" href="#" data-bs-target="#modal-editar-producto" data-bs-toggle="modal"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-2" class="ms-3" href="#" data-bs-target="#modal-eliminar-producto" data-bs-toggle="modal"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/productos/1.png">Ibuprofeno 400mg</td>
                                    <td>Cuidado Personal</td>
                                    <td>S/. 99</td>
                                    <td>41</td>
                                    <td><a id="editar-3" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-3" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/productos/1.png">Ibuprofeno 400mg</td>
                                    <td>Cuidado Bucal</td>
                                    <td>S/. 99</td>
                                    <td>28</td>
                                    <td><a id="editar-4" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-4" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/productos/1.png">Ibuprofeno 400mg</td>
                                    <td>Cuidado Bucal</td>
                                    <td>S/. 99</td>
                                    <td>61</td>
                                    <td><a id="editar-5" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-5" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/productos/1.png">Ibuprofeno 400mg</td>
                                    <td>Higiene</td>
                                    <td>S/. 99</td>
                                    <td>38</td>
                                    <td><a id="editar-6" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-6" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/productos/1.png">Ibuprofeno 400mg</td>
                                    <td>Primeros Auxilios</td>
                                    <td>S/. 99</td>
                                    <td>21</td>
                                    <td><a id="editar-7" href="#"><i class="fas fa-pencil-alt text-primary text-bg-light"></i></a><a id="eliminar-7" class="ms-3" href="#"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a></td>
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
        </div>
        <footer class="bg-white sticky-footer text-center">
            <div class="container my-auto">
                <ul class="list-inline">
                    <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                        </svg></li>
                    <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                        </svg></li>
                </ul>
                <p class="mb-0">Copyright © Farmacia</p>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/chartjs/chart.min.js"></script>
<script src="../assets/chartjs/bs-init.js"></script>
<script src="../public/js/addCalendario.js"></script>
<script src="../assets/fullCalendar/index.global.js"></script>
<script src="../assets/fullCalendar/index.global.min.js"></script>
<script src="../public/js/theme.js"></script>
</body>

</html>
