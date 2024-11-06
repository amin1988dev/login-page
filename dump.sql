CREATE DATABASE login_system;
USE login_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Inserimento di un utente predefinito con password criptata
INSERT INTO users (email, password) VALUES
('user@email.com', '$2y$10$NalwJzteYoStPNKkra0V3u27xuCvxS5bo3xQrlV5K4z5pu2bjU6N.');
-- Password: "password123"
