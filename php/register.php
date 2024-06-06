<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO alunos (nome, email, curso) VALUES ('$nome', '$email', '$curso')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo aluno cadastrado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
