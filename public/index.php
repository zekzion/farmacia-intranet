<?php
session_start();
$error = "";

// verificar si el usuario ya inicio sesion
if (isset($_SESSION["email"])) {
    header("Location: ../pages/dashboard.php");
    exit();
}

// verificar si los datos han sido enviados
if (isset($_POST["txtemail"]) && isset($_POST["txtpassword"])) {
    // guardar datos del formulario
    $email = $_POST["txtemail"];
    $pass = $_POST["txtpassword"];

    // archivo json para importar los datos en usuarios.json
    $usuariosJSON = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/pages/usuarios.json');
    $usuarios = json_decode($usuariosJSON, true);

    // buscar usuario por email y validar la contraseña
    foreach ($usuarios['usuarios'] as $usuario) {
        if ($usuario["email"] === $email && $usuario["password"] === $pass) {
            $_SESSION["username"] = $usuario["usuario"];;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $pass;
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["apellido"] = $usuario["apellido"];
            $_SESSION["direccion"] = $usuario["direccion"];
            $_SESSION["ciudad"] = $usuario["ciudad"];
            $_SESSION["pais"] = $usuario["pais"];
            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            // mensaje de error de inicio de sesion
            $error = "<div class='alert alert-danger'>Credenciales incorrectas!!</div>";
        }
    }

    
}


$titulo = "Iniciar Sesión";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>


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
                                <form class="user" method="post" action="index.php">
                                    <div class="mb-3"><input class="form-control form-control-user" type="email" id="txtemail" aria-describedby="emailHelp" placeholder="Ingresar email" name="txtemail"></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="txtpassword" placeholder="Contraseña" name="txtpassword"></div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small"></div>
                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Iniciar Sesión</button>
                                    <hr>
                                </form>
                                <div class="form-group">
                                        <?php echo $error; ?>
                                </div>
                                <div class="text-center"><a class="small" href="forgot-password.php">¿Olvidaste tu contraseña?</a></div>
                                <div class="text-center"><a class="small" href="../pages/registro.php">Crear una cuenta</a></div>
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
<script src="js/addCalendario.js"></script>
<script src="../assets/fullCalendar/index.global.js"></script>
<script src="../assets/fullCalendar/index.global.min.js"></script>
<script src="js/theme.js"></script>
</body>

</html>