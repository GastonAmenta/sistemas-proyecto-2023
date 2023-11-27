<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #fcb6c2;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="../controllers/home.php">Anastasia</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <?php if ($section != "login" && !isset($_SESSION['user'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../controllers/login.php">Iniciar Sesion</a>
                </li>
            <?php } ?>

            <?php if (!isset($_SESSION['user'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../controllers/register.php">Registro</a>
                </li>
            <?php } else { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Bienvenido <?php echo $_SESSION['user']['nombre_usuario'] ?></a>
                </li>
                <?php if ($_SESSION['user']['rol_id'] == 2) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="../controllers/administracion.php">Administracion</a>
                    </li>
                <?php  } ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../controllers/logout.php">Cerrar Sesion</a>
                </li>

            <?php } ?>
        </ul>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background: white;">Search</button>
        </form>
    </div>
</nav>