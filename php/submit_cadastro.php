<?php
include 'config.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$curso = $_POST['curso'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO cadastros_pendentes (nome, email, cpf, celular, curso, senha) VALUES ('$nome', '$email', '$cpf', '$celular', '$curso', '$senha')";

if (mysqli_query($conn, $sql)) {
    // Adiciona o usuário como aluno na tabela de usuários
    $sql_user = "INSERT INTO usuarios (username, password, role) VALUES ('$email', '$senha', 'aluno')";
    mysqli_query($conn, $sql_user);

    echo "Cadastro enviado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
