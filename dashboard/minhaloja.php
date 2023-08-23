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
            <li>
                <a href="./dashboard.php#">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Início</span>
                </a>
            </li>
            <li class="active">
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
                <a href="#" class="logout">
                    <i class="bx bx-log-out-circle"></i>
                    <span class="text">Sair</span>
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
                <div class="card-header font-weight-bold">
                    <h4 class="font-weight-bold">Estoque</h4>
                    <!-- Button to open the popup for adding a new inventory item -->
                    <small class="float-sm-right">
                        <button id="btnNuevo" type="button" class="btn btn-success btn-sm" onclick="abrirPopup()">
                            <i class="fas fa-plus"></i>&nbsp; Novo Item
                        </button>
                    </small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-condensed" style="width:100%">
                                    <!-- Table header -->
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Produto</th>
                                            <th>Categoria</th>
                                            <th>Quantidade</th>
                                            <th>Compradas</th>
                                            <th>Vendidas</th>
                                            <th>Controle</th>
                                        </tr>
                                    </thead>
                                    <!-- Table body (will be populated dynamically) -->
                                    <tbody id="estoque-table-body">
                                        <!-- Inventory data rows will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popup for adding a new inventory item -->
            <div class="popup" id="popup" style="display:no">
                <div class="popup-content">
                    <span class="popup-close" onclick="fecharPopup()">&times;</span>
                    <h2>Novo Item de Estoque</h2>
                    <form id="popup-form">
                        <label for="produto">Produto:</label>
                        <input type="text" id="produto" required>
                        <label for="categoria">Categoria:</label>
                        <input type="text" id="categoria" required>
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" id="quantidade" required>
                        <button type="button" class="btn btn-success" onclick="adicionarItemPopup()">Adicionar</button>
                    </form>
                </div>
            </div>

            <!--FIM DOS GRÁFICOS-->
        </main>
    </section>
    
<!--SCRIPTS-->

    <script src="./js/estoque.js"></script>
    <!--Chart.Js-->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    </body>
    </html>

    <!--JQuery-->   
    <script src="./js/main.js"></script>
    <script type="module" src="/dashboard/js/fluxodecaixa.js"></script>
</body>
</html>
