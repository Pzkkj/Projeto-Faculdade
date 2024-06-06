<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sql_select = "SELECT * FROM cadastros_pendentes WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $nome = $row['nome'];
        $email = $row['email'];
        $curso = $row['curso'];
        $senha = $row['senha'];

        $sql_insert = "INSERT INTO alunos (nome, email, curso, senha) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssss", $nome, $email, $curso, $senha);

        if ($stmt_insert->execute()) {
            $sql_delete = "DELETE FROM cadastros_pendentes WHERE id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id);
            $stmt_delete->execute();

            echo "Cadastro aprovado com sucesso.";
        } else {
            echo "Erro ao aprovar o cadastro: " . $conn->error;
        }

        $stmt_insert->close();
        $stmt_delete->close();
    } else {
        echo "Cadastro não encontrado.";
    }

    $stmt_select->close();
    $conn->close();
}
?>
