<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle Acadêmico</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Sistema de Controle Acadêmico</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="cadastro.html">Cadastro</a></li>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') { ?>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>
        <main>
            <h2>Bem-vindo ao Sistema de Controle Acadêmico</h2>
        </main>
        <footer>
            <p>&copy; 2024 Sistema de Controle Acadêmico. Todos os direitos reservados.</p>
        </footer>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
