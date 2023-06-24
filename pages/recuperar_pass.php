<?php
session_start();
// Verificar si ya se ha iniciado sesión
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}
$titulo = "Recuperar Contraseña";
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
        <div class="col-md-9 col-lg-12 col-xl-10 w-50">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Recuperar Contraseña</h4>
                                </div>
                                <form class="user" onsubmit="return validarEmailRec()" method="post" action="#">
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" oninput="validarEntrada()"  type="text" id="txtemail-validar" aria-describedby="emailHelp" placeholder="Ingresar email" name="txtemail">
                                    </div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small"></div>
                                    </div>
                                    <button id="boton-inicio-sesion" class="btn btn-primary d-block btn-user w-100" type="submit" disabled>Recuperar Contraseña</button>
                                    <hr>
                                </form>
                                <div class="form-group">
                                </div>
                                <div class="text-center"><a class="small" href="../public/index.php">Iniciar Sesión</a></div>
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
<script src="js/theme.js"></script>
<script src="js/validarLogin.js"></script>
<script src="../public/js/validarRecuperarPass.js"></script>
</body>

</html>