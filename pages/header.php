<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <!-- barra de navegacion horizontal al principio de la pagina-->
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
            <div class="container-fluid">
                <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle invisible nav-link" aria-expanded="false"
                               data-bs-toggle="dropdown" href="#"><span
                                        class="badge bg-danger badge-counter">2+</span><i
                                        class="fas fa-bell fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                <h6 class="dropdown-header">notificaciones</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-primary icon-circle">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="small text-gray-500">
                                            <span style="color: rgb(52, 53, 62);">Lorem ipsum dolor</span>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                    </div>
                                </a><a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-success icon-circle">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="small text-gray-500">
                                            <span style="color: rgb(52, 53, 62);">Lorem ipsum dolor</span>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="notificaciones.php">Mostrar
                                    todo</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown"
                               href="#"><span
                                        class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION["username"]; ?></span><i
                                        class="fas fa-user"></i></a>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                <a class="dropdown-item" href="perfil.php"><i
                                            class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrar_sesion.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cerrar
                                    Sesión</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
