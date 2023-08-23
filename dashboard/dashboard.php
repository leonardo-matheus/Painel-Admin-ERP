<?php
session_start();

// Verifica se o usuário não está logado e redireciona para a página de login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!--CSS -->
	<link rel="stylesheet" href="/css/main.min.css">
    <!--Gráficos-->
</head>
<body>

    <!--SIDEBAR-->
    <section id="sidebar">

        <a href="#" class="brand">
			<i class='bx bxl-sketch' ></i>
			<span class="text">Techfix</span>
		</a>

        <!-- Menu Superior -->
        <ul class="side-menu top">
            <li class="active">
                <a href="./dashboard.php#">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Início</span>
                </a>
            </li>
            <li>
                <a href="./minhaloja.php#">
                    <i class="bx bxs-shopping-bag"></i>
                    <span class="text">Minha loja</span>
                </a>
            </li>
            <li>
                <a href="./relatorios.html#">
                    <i class="bx bxs-doughnut-chart"></i>
                    <span class="text">Relatórios</span>
                </a>
            </li>
            <li>
                <a href="./clientes.html#">
                    <i class="bx bxs-user"></i>
                    <span class="text">Clientes</span>
                </a>
        </ul>
    
        <!--Menu Inferior-->
        <ul class="side-menu">
            <li>
                <a href="./config.html#">
                    <i class="bx bx-cog"></i>
                    <span class="text">Configurações</span>
                </a>
            </li>
            <li>
            <a href="/logout.php" class="logout">
                <i class="bx bx-log-out-circle"></i>
                <span class="text">Sair</span>
            </a>
            </li>

        </ul>
        
    </section>
    <!--FIM DA SIDEBAR-->

    <!--CONTEUDO-->
    <section id="content">
        <!--NAVBAR-->
        <nav>
			<i id="hamburguer" class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Ferramentas</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Pesquisar...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
            
                                    <!-- Nav Item - User Information -->
                                    <li class="profile">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                            <img class="img-profile rounded-circle"
                                                src="img/undraw_profile.svg">
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                            aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Profile
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Settings
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Activity Log
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                        </div>
                                    </li>

			<a href="#" class="profile">
				<img src="./img/profile.png">
			</a>
		</nav>
        <!--FIM DA NAVBAR-->

        <!--MAIN-->
        <main>
            <!--TITULO DA PÁGINA-->
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a class="active" href="#">Visão Geral</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class="bx bxs-cloud-download"></i>
                    <span class="text">Baixar PDF</span>
                </a>
            </div>

            <!--CARDS-->
            <ul class="box-info">
                <li>
                    <i class="bx bxs-calendar-check"></i>
                    <span class="text">
                        <h3>595</h3>
                        <p>Nova Venda</p>
                    </span>
                </li>
                <li>
                    <i class="bx bxs-user"></i>
                    <span class="text">
                        <h3>1456</h3>
                        <p>Visitantes</p>
                    </span>
                </li>
                <li>
                    <i class="bx bxs-dollar-circle"></i>
                    <span class="text">
                        <h3>R$ 2.500,00</h3>
                        <p>Faturamento</p>
                </li>
            </ul>
            <!--FIM DOS CARDS-->

            <br><br>


            <div class="estoque">
                <h3>Estoque</h3>
                <div class="estoque-itens">
                    <div class="estoque-item"></div>
                    <div class="estoque-item"></div>
                    <div class="estoque-item"></div>
                    <div id="btnVerMais" class="estoque-item">
                        <i class='bx bx-plus'></i>
                        <span>Ver mais</span>
                    </div>
                </div>
            </div>

            <!--FIM DOS GRÁFICOS-->

        </main>
    </section>
    
<!--SCRIPTS-->


    <!--Chart.Js-->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="./js/fluxodecaixa.js"></script>
    </body>
    </html>

    <!--JQuery-->   
    <script src="./js/main.js"></script>
    <script type="module" src="/dashboard/js/fluxodecaixa.js"></script>
</body>
</html>
