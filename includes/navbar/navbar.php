<header class="cabecalho"  style="min-height: 10vh;">
    <nav class="navbar navbar-dark navbar-expand-lg cabecalho__nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img class="navbar-logo" src="assets/img/kasu_logo-removebg-preview.png" alt="Logo da Kasu suplementos">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex">
                            <div class="dropdown ">
                                <span class="nav-link dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Produtos
                                </span>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/produtos">Produtos </a>
                                    <?php 
                                        if ($_SESSION) {
                                            if ($_SESSION['usr_admin'] == 1) {
                                                echo '<a class="dropdown-item" href="/cadastro-produto">Cadastrar produto </a>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php 
                        if ($_SESSION) {
                            if ($_SESSION['usr_admin'] == 1) {
                                echo '<li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/clientes">Clientes</a>
                                </li>';
                            }
                        }
                    ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php 
                        if ($_SESSION) {
                            if ($_SESSION['usr_admin'] == 1) {
                                echo '<li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/carrinho">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </a>
                                      </li>';
                            }
                        }
                    ?>
                    <li class="nav-item">
                        <div class="d-flex">
                            <div class="dropdown ">
                                <span class="nav-link dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i> &nbsp; <?php if ($_SESSION) { echo $_SESSION['usr_name']; } ?> 
                                </span>
                                <?php if ($_SESSION) {
                                        echo '<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                <form id="form" method="post">
                                                    <button class="dropdown-item" type="submit" name="leave">Sair <i class="fa-solid fa-door-open"></i></button>
                                                </form>
                                            </div>';
                                        if (isset($_POST['leave'])) {
                                            session_unset();
                                            session_destroy();
                                            header('refresh'); 
                                            exit;
                                        }
                                    } else {
                                        echo '<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="/login">Login</a>
                                                <a class="dropdown-item" href="/cadastro">Cadastre-se </a>
                                            </div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>