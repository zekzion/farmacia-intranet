<?php
session_start();
// Verificar si ya se ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: ../public/index.php");
    exit();
}
$titulo = "Pagina Perfil";
?>
<!-- Estilos css -->
<?php require "cabecera.php"; ?>

<!-- navbar vertical -->
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a
                class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-pills"></i></div>
            <div class="sidebar-brand-text mx-3"><span class="fs-5">Intranet</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" id="dashboard"><a class="nav-link" href="dashboard.php"><i
                            class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item" id="perfil"><a class="nav-link active" href="perfil.php"><i
                            class="fas fa-user"></i><span>Mi Perfil</span></a></li>
            <li class="nav-item" id="inventario">
                <div><a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="collapse-2" href="#collapse-2" role="button"><i class="fas fa-th-large"></i>&nbsp;<span>Inventario</span></a>
                    <div class="collapse" id="collapse-2">
                        <div class="bg-white border rounded py-2 collapse-inner"><a class="collapse-item"
                                                                                    href="productos.php">Productos</a><a
                                    class="collapse-item" href="categorias.php">Categorías</a></div>
                    </div>
                </div>
            </li>
            <li class="nav-item" id="reportes"><a class="nav-link" href="ventas.php"><i class="fas fa-tasks"></i><span>Reporte de ventas</span></a>
            </li>
            <li class="nav-item" id="calendario"><a class="nav-link" href="calendario.php"><i
                            class="far fa-calendar"></i><span>Calendario</span></a></li>
            <li class="nav-item" id="docs"></li>
            <li class="nav-item" id="empleados"><a class="nav-link" href="empleados.php"><i
                            class="fas fa-user"></i><span>Empleados</span></a></li>
            <li class="nav-item" id="clientes"><a class="nav-link" href="clientes.php"><i class="fas fa-user"></i><span>&nbsp;Clientes</span></a>
            </li>
            <li class="nav-item" id="proveedores"><a class="nav-link" href="proveedores.php"><i
                            class="fas fa-truck"></i><span>&nbsp;Proveedores</span></a></li>
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
    <h2 class="fw-bold text-dark mb-4">Mi Perfil</h2>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card shadow mb-3">
                <div class="card-header text-center d-flex justify-content-between align-items-center py-3">
                    <p class="text-primary m-0 fw-bold w-100">Administrador</p>
                </div>
                <div class="card-body text-center"><img class="rounded-circle mb-3 mt-4"
                                                        src="../assets/img/avatars/avatar3.jpeg" width="160"
                                                        height="160">
                    <div class="mb-3">
                        <button class="btn btn-primary btn-sm" type="button">Cambiar foto</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Configuración de Usuario</p>
                        </div>
                        <div class="card-body">
                            <form onsubmit="return validarConfiguracionUsuario()">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="username"> <strong>Nombre de usuario</strong></label>
                                            <input class="form-control" type="text" id="username"
                                                   placeholder="<?php echo $_SESSION["username"]; ?>" name="username">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3"><label class="form-label"
                                                                 for="email"><strong>Email</strong></label>
                                            <input class="form-control" type="email" id="email"
                                                   placeholder="<?php echo $_SESSION["email"]; ?>" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3"><label class="form-label"
                                                                 for="nombres"><strong>Nombres</strong></label>
                                            <input class="form-control" type="text" id="nombres"
                                                   placeholder="<?php echo $_SESSION["nombre"]; ?>" name="nombres">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3"><label class="form-label"
                                                                 for="apellidos"><strong>Apellidos</strong></label>
                                            <input class="form-control" type="text" id="apellidos"
                                                   placeholder="<?php echo $_SESSION["apellido"]; ?>" name="apellidos">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit" id="boton-guardar-1">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Configuración de contacto</p>
                        </div>
                        <div class="card-body">
                            <form onsubmit="return validarContacto()">
                                <div class="mb-3"><label class="form-label"
                                                         for="direccion"><strong>Dirección</strong></label>
                                    <input class="form-control" type="text" id="direccion"
                                           placeholder="<?php echo $_SESSION["direccion"]; ?>" name="direccion">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="ciudad"><strong>Ciudad</strong></label>
                                            <input class="form-control" type="text" id="ciudad"
                                                   placeholder="<?php echo $_SESSION["ciudad"]; ?>" name="ciudad">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label"
                                                                 for="pais"><strong>País</strong></label>
                                            <input class="form-control" type="text" id="pais"
                                                   placeholder="<?php echo $_SESSION["pais"]; ?>" name="pais">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer de la pagina -->
<?php require "footer.php"; ?>
