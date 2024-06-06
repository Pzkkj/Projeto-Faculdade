<?php
session_start();
include 'config.php';

$username = $_SESSION['username'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$curso = $_POST['curso'];

$sql = "UPDATE usuarios SET nome='$nome', email='$email', cpf='$cpf', celular='$celular', curso='$curso' WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    echo "Informações atualizadas com sucesso";
} else {
    echo "Erro ao atualizar as informações: " . $conn->error;
}

$conn->close();
?>
