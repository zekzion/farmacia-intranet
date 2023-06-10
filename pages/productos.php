<?php
    session_start();
    // Verificar si ya se ha iniciado sesión
    if (!isset($_SESSION['email'])) {
        header("Location: ../public/index.php");
        exit();
    }
    $titulo = "Pagina de Productos";


    /* codigo para agregar nuevos productos *******************************/
    if (isset($_POST["nombre-producto"]) && isset($_POST["categoria-producto"]) && isset($_POST["precio-producto"]) && isset($_POST["cantidad-producto"])) {
        $nombrePro = $_POST["nombre-producto"];
        $categoriaPro = $_POST["categoria-producto"];
        $precioPro = $_POST["precio-producto"];
        $cantidadPro = $_POST["cantidad-producto"];

        // generacion de id para  productos
        $id = uniqid();


        // crear array producto
        $nuevoProducto = array(
            "id" => $id,
            "nombre" => $nombrePro,
            "categoria" => $categoriaPro,
            "precio" => $precioPro,
            "cantidad" => $cantidadPro
        );

        // verificar si exinten array en la sesion
        if (isset($_SESSION["productos"])) {
            // agregar producto al array
            $_SESSION["productos"][] = $nuevoProducto;
        } else {
            // crear array de productos y agregarlo
            $_SESSION["productos"] = array($nuevoProducto);
        }
        // Redireccionar a la página actual para evitar enviar el formulario por cada recarga
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }

    // codigo para liminar productos
    if (isset($_GET["eliminar"])) {
        $eliminarPro = $_GET["eliminar"];
        $prodEncontrado = false;

        // verificar si existen productos en la sesion
        if (isset($_SESSION["productos"])) {
            // buscar producto
            foreach ($_SESSION["productos"] as $index => $producto) {
                // comparar id de producto con el enviado por el link "eliminar"
                if ($producto["id"] === $eliminarPro) {
                   // guardar indice del producto encontrado
                    $prodEncontrado = $index;
                    break; // salir del foreach
                }
            }
        }
    }


?>

    <!-- Estilos css -->
    <?php require "cabecera.php"; ?>

    <!-- navbar vertical -->
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

    <!--nabvar horizontal de la pagina-->
    <?php  require "header.php"; ?>

            <!-- contenido principal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-agregar-producto">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-secondary">Registrar Nuevo Producto</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="productos.php" method="post">
                                <div class="row" id="nom">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="nombre-producto"><strong>Nombre</strong></label>
                                            <input class="form-control" type="text" id="nombre-producto" placeholder="Nombre del Producto" name="nombre-producto" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="nom">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="categoria-producto"><strong>Categoria</strong></label>
                                            <input class="form-control" type="text" id="categoria-producto" placeholder="Categoria del Producto" name="categoria-producto" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="prec-cant">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="precio-producto"><strong>Precio</strong></label>
                                            <input class="form-control" type="text" name="precio-producto" id="precio-producto">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="cantidad-producto"><strong>Cantidad</strong></label>
                                            <input class="form-control" type="text" name="cantidad-producto" id="cantidad-producto">
                                        </div>
                                    </div>
                                </div>
                                <div id="error-entrada" class="mb-3"><span class="fw-bold text-danger"></span></div>
                                <div class="col d-flex justify-content-end">
                                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button>
                                    <button class="btn btn-primary ms-3" type="submit">Guardar</button>
                                </div>
                            </form>
                        </div>
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
                            <form action="productos.php" method="post">
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
                            <h5 class="modal-title fw-bold" id="modalConfirmarEliminarLabel">Confirmar eliminación</h5>
                            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Estás seguro de que deseas eliminar este producto con ID: <span></span>?</p>
                        </div>
                        <div class="modal-footer">
                            <form method="get">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <div class="container-fluid">
                <h2 class="fw-bold text-dark mb-4">Listado de Productos</h2>
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <form class="d-none d-sm-inline-block me-auto">
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Buscar">
                                <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                        <ul class="navbar-nav align-items-center flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none align-items-center m-auto no-arrow">
                                <a class="dropdown-toggle nav-link align-items-center m-auto" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group">
                                            <input class="bg-light form-control border-0 small" type="text" placeholder="Buscar">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="btn-group"><button class="btn btn-primary" type="button">Exportar</button><button class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" type="button"></button>
                                    <div class="dropdown-menu"><a  onclick="descargarPDF('dataTables')" class="dropdown-item" id="aPDF" href="#">PDF</a></div>
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
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                    <label class="form-label">Mostrar
                                        <select class="d-inline-block form-select form-select-sm">
                                            <option value="10" selected="">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTables">
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
                            <?php
                            if (isset($_SESSION['productos'])) {
                               foreach ($_SESSION['productos'] as $producto) { ?>
                                     <tr>
                                         <td><?php echo $producto['id'];?></td>
                                         <td><?php echo $producto['nombre'];?></td>
                                         <td><?php echo $producto['categoria'];?></td>
                                         <td><?php echo "S/." . $producto['precio'];?></td>
                                         <td><?php echo $producto['cantidad'];?></td>
                                         <td>
                                             <a href="#" data-id="<?php echo $producto['id'];?>" data-bs-toggle="modal" data-bs-target="#modal-eliminar-producto"><i class="fas fa-trash-alt text-danger text-bg-light"></i></a>
                                         </td>
                                     </tr>
                            <?php
                               }
                            }
                            ?>
                                </tbody>
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



