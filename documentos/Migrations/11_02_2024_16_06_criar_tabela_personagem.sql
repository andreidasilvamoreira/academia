CREATE TABLE IF NOT EXISTS personagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    nivel INT,
    total_vida INT,
    total_vida_bonus INT,
    vida_atual INT,
    experiencia INT,
    raca_id INT,
    classe_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    user_created INT,
    user_updated INT
);
