<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: /dashboard/dashboard.php");
    exit;
}

$error_message = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conexão com o banco de dados (usando as configurações do arquivo config.php)
    include('bd/config.php');

    // Query para verificar o usuário e senha usando Prepared Statements
    $query = "SELECT id FROM usuarios WHERE login = ? AND senha = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: /dashboard/dashboard.php");
        exit();
    } else {
        $error_message = "Usuário ou senha incorretos.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar | Techfix</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>

        <div class="login">
            <h3 class="title">Login</h3>
            <form method="post">
                <div class="text-input">
                    <i class="bx bxs-user"></i>
                    <input id="login-form" type="text" name="username" placeholder="Usuário">
                </div>
                <div class="text-input">
                    <i class='bx bxs-lock-alt'></i>
                    <input id="pass-form" type="password" name="password" placeholder="Senha">
                </div>
                <button class="login-btn" name="login">LOGIN</button>
            </form>
            <a href="#" class="forgot">Esqueceu a senha?</a>
            <div class="create">
                <a href="#">Crie uma conta</a>
                <i class="ri-arrow-right-fill"></i>
            </div>

            <?php
            if (isset($error_message)) {
                echo '<p class="error-message">' . $error_message . '</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>
