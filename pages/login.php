<?php

// se incluye el header para todas las paginas expecto INVENTARIO > PRODUCTOS e INVENTARIO > CATEGORIAS
$titulo = "Iniciar Sesión";
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
include "$_SERVER[DOCUMENT_ROOT]/pages/header.php";
?>




<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image w-100 h-100 d-flex justify-content-center align-items-center"><i class="fas fa-user-lock text-dark" style="font-size: 300px;"></i></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Iniciar Sesión</h4>
                                </div>
                                <form class="user" method="post">
                                    <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingresar email" name="email"></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Contraseña" name="password"></div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small"></div>
                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Iniciar Sesión</button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.php">¿Olvidaste tu contraseña?</a></div>
                                <div class="text-center"><a class="small" href="registro.php">Crear una cuenta</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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