<?php
session_start();
// Verificar si ya se ha iniciado sesión
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}
$titulo = "Pagina de Registro";
?>

<!-- Estilos css -->
<?php require "cabecera.php"; ?>

<body class="bg-gradient-primary ">
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-flex">
                    <div class="flex-grow-1 bg-register-image d-flex justify-content-center align-items-center"><i
                                class="fas fa-user-lock text-dark m-5" style="font-size: 300px;"></i></div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5" style="--bs-primary: #5b0c15;--bs-primary-rgb: 91,12,21;">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Crear una cuenta</h4>
                        </div>
                        <form class="user" onsubmit="return validarConfiguracionRegistro()">
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="text" id="nombre-nueva-cuenta"
                                           placeholder="Nombres" name="nombre-nueva-cuenta">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="text" id="apellido-nueva-cuenta"
                                           placeholder="Apellidos" name="apellido-nueva-cuenta">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="text" id="email-nueva-cuenta"
                                       aria-describedby="emailHelp" placeholder="Email" name="email-nueva-cuenta">
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="password"
                                           id="password-nueva-cuenta" placeholder="Contraseña"
                                           name="password-nueva-cuenta">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="password"
                                           id="password-repetir-nueva-cuenta" placeholder="Repetir Contraseña"
                                           name="password-repetir-nueva-cuenta">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-">
                                    <p class="text-sm-center" id="mensaje"></p>
                                </div>
                            </div>
                            <button class="btn btn-primary d-block btn-user w-100" type="submit"
                                    style="--bs-primary: #4e73df;--bs-primary-rgb: 78,115,223;">Registrarse
                            </button>
                            <hr>
                        </form>
                        <div class="text-center">
                            <a href="recuperar_pass.php" class="small">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="../public/index.php">¿Ya tienes una cuenta? Inicia Sesión</a>
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
<script src="../public/js/validar-registro.js"></script>
</body>

</html>
