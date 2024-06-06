CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'aluno') NOT NULL,
    nome VARCHAR(100) NULL,
    cpf VARCHAR(11) NULL,
    celular VARCHAR(15) NULL,
    curso VARCHAR(100) NULL
);

-- Insere um administrador e um aluno de exemplo
INSERT INTO usuarios (username, password, role, nome, cpf, celular, curso) VALUES 
('admin@example.com', '$2y$10$Dqjbm6bQZC07/4SxVRP2POdAhG1iX5iCeWv.TXb0Eci.y9uQH2ENW', 'admin', 'Admin', '12345678901', '11987654321', 'Administração'), -- Senha: admin123
('aluno@example.com', '$2y$10$hX1jEeOZtnzA1V.QmfD3cOS17XwHEszvTZ3HrIBAx6.A5oH7hyEY6', 'aluno', 'Aluno', '10987654321', '11912345678', 'Engenharia'); -- Senha: aluno123
