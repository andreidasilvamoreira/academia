	INSERT INTO Enderecos (CEP, rua, bairro, cidade, complemento) 
    VALUES
	(12345678, 'Rua A', 'Bairro X', 'Cidade Y', 'Complemento 1'),
	(87654321, 'Rua B', 'Bairro Z', 'Cidade X', 'Complemento 2'),
	(23456789, 'Rua C', 'Bairro Y', 'Cidade Z', 'Complemento 3'),
	(34567890, 'Rua D', 'Bairro W', 'Cidade X', 'Complemento 4'),
	(45678901, 'Rua E', 'Bairro V', 'Cidade Z', 'Complemento 5'),
	(56789012, 'Rua F', 'Bairro U', 'Cidade Y', 'Complemento 6'),
	(67890123, 'Rua G', 'Bairro T', 'Cidade Z', 'Complemento 7'),
	(78901234, 'Rua H', 'Bairro S', 'Cidade X', 'Complemento 8'),
	(89012345, 'Rua I', 'Bairro R', 'Cidade Y', 'Complemento 9'),
	(90123456, 'Rua J', 'Bairro Q', 'Cidade Z', 'Complemento 10');

    
    INSERT INTO Pessoas (endereco_id, nome, cpf, altura, peso, data_matricula, data_nascimento, senha, email) 
    VALUES
	(1, 'João Silva', 12345678901, 1.80, 75.5, '2024-01-15', '1990-05-20', 'senha123', 'joao@email.com'),
	(2, 'Maria Santos', 98765432109, 1.65, 60.2, '2024-02-20', '1985-10-12', 'senha456', 'maria@email.com'),
	(3, 'Carlos Oliveira', 45678901234, 1.75, 80.0, '2024-03-10', '1995-03-25', 'senha789', 'carlos@email.com'),
	(4, 'Ana Costa', 65432109876, 1.70, 70.8, '2024-04-05', '1988-07-30', 'senhaabc', 'ana@email.com'),
	(5, 'Lucas Pereira', 34567890123, 1.85, 85.3, '2024-05-12', '1992-11-18', 'senhaxyz', 'lucas@email.com'),
	(6, 'Juliana Oliveira', 78901234567, 1.60, 55.0, '2024-06-23', '1997-09-05', 'senhadef', 'juliana@email.com'),
	(7, 'Paulo Souza', 56789012345, 1.78, 77.2, '2024-07-30', '1993-04-02', 'senhaghi', 'paulo@email.com'),
	(8, 'Camila Lima', 90123456789, 1.68, 63.5, '2024-08-14', '1996-08-15', 'senhajkl', 'camila@email.com'),
	(9, 'Ricardo Almeida', 23456789012, 1.73, 72.7, '2024-09-29', '1991-12-08', 'senhamno', 'ricardo@email.com'),
	(10, 'Patrícia Costa', 89012345678, 1.62, 58.9, '2024-10-05', '1994-06-25', 'senhawxy', 'patricia@email.com');
    
    

    
    INSERT INTO Academias (nome, telefone, horario_funcionamento_abertura, horario_funcionamento_fechamento, endereco_id) 
VALUES
('Academia A', 1122334455, '08:00:00', '22:00:00', 1),
('Academia B', 9988776655, '09:00:00', '21:00:00', 2),
('Academia C', 5544332211, '07:00:00', '20:00:00', 3),
('Academia D', 6677889900, '10:00:00', '19:00:00', 4),
('Academia E', 2233445566, '06:00:00', '23:00:00', 5),
('Academia F', 5566778899, '08:30:00', '21:30:00', 6),
('Academia G', 3344556677, '07:30:00', '20:30:00', 7),
('Academia H', 7788990011, '08:00:00', '22:00:00', 8),
('Academia I', 1100110011, '09:00:00', '21:00:00', 9),
('Academia J', 9988776655, '10:00:00', '19:00:00', 10);


INSERT INTO Pessoas_Academias (academia_id, pessoa_id) 
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (2, 2),
    (3, 6),
    (3, 1),
    (4, 6),
    (5, 5),
    (6, 6),
    (6, 7),
    (6, 6),
    (7, 7),
    (7, 4),
    (8, 8),
    (8, 5),
    (9, 9),
    (9, 2),
    (10, 10);



	INSERT INTO Tipo_Pessoas (nome, slug) 
    VALUES
	('Aluno', 'aluno'),
	('Treinador', 'treinador'),
	('Administrador', 'admin');

INSERT INTO Pessoas_Tipo_Pessoas (pessoa_id, tipo_pessoa_id) 
VALUES
    (1, 1),
    (1, 2),
    (2, 2), 
    (2, 1),
    (3, 1), 
    (3, 2), 
    (4, 1), 
    (5, 3), 
    (6, 2), 
	(6, 1),
    (7, 1), 
    (8, 1), 
    (9, 2), 
    (10, 1);

	INSERT INTO Tempo_Fichas (data_inicio, data_fim, quantidade_dias, pessoa_id) 
    VALUES
	('2024-01-01', '2024-01-15', 15, 1),
	('2024-02-01', '2024-02-15', 15, 2),
	('2024-03-01', '2024-03-15', 15, 3),
	('2024-04-01', '2024-04-15', 15, 4),
	('2024-05-01', '2024-05-15', 15, 5),
	('2024-06-01', '2024-06-15', 15, 6),
	('2024-07-01', '2024-07-15', 15, 7),
	('2024-08-01', '2024-08-15', 15, 8),
	('2024-09-01', '2024-09-15', 15, 9),
	('2024-10-01', '2024-10-15', 15, 10);

	INSERT INTO Fichas_Treino (objetivos, experiencia, recomendacoes_medicas, condicoes_medicas, treinador_responsavel_id, objetivo, academia_id, tempo_ficha_id) 
    VALUES
	('Perda de peso', 'Experiência em treinos aeróbicos e musculação', 'Nenhuma', 'Nenhuma', 1, 'Perder 5kg', 1, 1),
    ('Perda de peso', 'Experiência em treinos aeróbicos e musculação', 'Nenhuma', 'Nenhuma', 2, 'Perder 5kg', 2, 1),
    ('Perda de peso', 'Experiência em treinos aeróbicos e musculação', 'Nenhuma', 'Nenhuma', 2, 'Perder 5kg', 5, 3),
    ('Perda de peso', 'Experiência em treinos aeróbicos e musculação', 'Nenhuma', 'Nenhuma', 2, 'Perder 5kg', 6, 1),
	('Ganho de massa muscular', 'Experiência em musculação', 'Nenhuma', 'Nenhuma', 2, 'Ganhar 3kg de massa magra', 2, 2),
	('Condicionamento físico', 'Experiência em treinos de resistência e cardio', 'Nenhuma', 'Nenhuma', 4, 'Melhorar a resistência', 3, 3),
	('Força e explosão', 'Experiência em treinos de força', 'Nenhuma', 'Nenhuma', 4, 'Melhorar a explosão muscular', 4, 4),
	('Flexibilidade', 'Experiência em alongamentos e yoga', 'Nenhuma', 'Nenhuma', 2, 'Aumentar a flexibilidade', 5, 5),
	('Treino funcional', 'Experiência em treinos de funcional', 'Nenhuma', 'Nenhuma', 7, 'Melhorar o desempenho funcional', 6, 6),
	('Definição muscular', 'Experiência em musculação e dieta', 'Nenhuma', 'Nenhuma', 7, 'Definir os músculos', 7, 7),
	('Recuperação de lesões', 'Experiência em reabilitação', 'Nenhuma', 'Lesão no joelho', 7, 'Recuperar força e mobilidade', 8, 8),
	('Treino para idosos', 'Experiência em treinos adaptados', 'Nenhuma', 'Nenhuma', 2, 'Melhorar a qualidade de vida', 9, 9),
	('Treino esportivo', 'Experiência em preparação física', 'Nenhuma', 'Nenhuma', 2, 'Melhorar o desempenho esportivo', 10, 10);


	INSERT INTO Status (nome, slug) 
    VALUES
	('Presente', 'presente'),
    ('Ausente', 'ausente'),
    ('Atrasado', 'atrasado'),
    ('Cancelado', 'cancelado');


	INSERT INTO Checkins (data_check_in, duracao_treino, motivos_status, pessoa_id, status_id) 
    VALUES
	('2024-01-01 08:00:00', 60, 'Bem-estar', 1, 3),
	('2024-01-02 09:30:00', 45, 'Trabalho', 2, 1),
	('2024-01-03 07:45:00', 90, 'Trânsito', 3, 3),
	('2024-01-04 10:15:00', 75, 'Compromisso', 4, 1),
	('2024-01-05 08:30:00', 60, 'Saúde', 5, 1),
	('2024-01-06 09:00:00', 45, 'Família', 6, 1),
	('2024-01-07 07:30:00', 90, 'Preguiça', 7, 1),
	('2024-01-08 10:00:00', 75, 'Estudo', 8, 1),
	('2024-01-09 08:15:00', 60, 'Lazer', 9, 1),
	('2024-01-10 09:45:00', 45, 'Outros', 10, 1);


	INSERT INTO Treinos_Diario (nome, slug, ficha_treino_id, checkin_id) 
    VALUES
	('Treino A', 'treino-a', 1, 1),
	('Treino B', 'treino-b', 2, 2),
	('Treino C', 'treino-c', 3, 3),
	('Treino D', 'treino-d', 4, 4),
	('Treino E', 'treino-e', 5, 5),
	('Treino F', 'treino-f', 6, 6),
	('Treino G', 'treino-g', 7, 7),
	('Treino H', 'treino-h', 8, 8),
	('Treino I', 'treino-i', 9, 9),
	('Treino J', 'treino-j', 10, 10);

	INSERT INTO Modalidades (nome, slug, descricao, objetivo) VALUES
('Musculação', 'musculacao', 'Treinos focados no desenvolvimento da massa muscular', 'Ganho de massa'),
('Cardio', 'cardio', 'Atividades aeróbicas para melhoria da resistência cardiovascular', 'Condicionamento físico'),
('Yoga', 'yoga', 'Práticas para melhorar flexibilidade, equilíbrio e bem-estar', 'Equilíbrio mental e físico'),
('Pilates', 'pilates', 'Exercícios que fortalecem os músculos centrais do corpo', 'Melhoria da postura e flexibilidade'),
('CrossFit', 'crossfit', 'Treinos funcionais de alta intensidade', 'Melhoria do condicionamento geral');



	INSERT INTO Academias_Modalidades (academia_id, modalidade_id) 
    VALUES
	(1, 1),
	(2, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (2, 5),
	(3, 3),
	(4, 4),
	(5, 5);


	INSERT INTO Materiais_apoio_exercicios (titulo, tipo, url) 
    VALUES
	('Guia de alongamentos', 'pdf', 'https://exemplo.com/guia-alongamentos.pdf'),
	('Vídeo de treino funcional', 'video', 'https://exemplo.com/video-treino-funcional.mp4'),
	('Playlist motivacional', 'audio', 'https://exemplo.com/playlist-motivacional.mp3');


	INSERT INTO Exercicios (nome, musculatura_alvo, dificuldade, quantidade_series, descricao, concluido, equipamentos_necessarios, material_apoio_id) 
    VALUES
	('Supino', 'Peitoral', 'Intermediário', 4, 'Exercício de força para o peitoral', 'Não', 'Banco e barra', 1),
	('Corrida', 'Cardio', 'Fácil', 1, 'Atividade aeróbica para melhorar a resistência', 'Não', 'Esteira', 2),
	('Postura do Guerreiro', 'Costas e pernas', 'Fácil', 3, 'Posição de yoga para fortalecer costas e pernas', 'Não', 'Tapete', 3),
    ('Agachamento', 'Pernas', 'Intermediário', 4, 'Exercício de força para as pernas e glúteos', 'Não', 'Barra e pesos', 1),
    ('Flexão de Braço', 'Peitoral', 'Fácil', 3, 'Exercício de força para o peitoral e tríceps', 'Não', 'Nenhum', 2),
    ('Remada Curvada', 'Costas', 'Intermediário', 4, 'Exercício de força para as costas', 'Não', 'Halteres', 1),
    ('Elevação Lateral', 'Ombros', 'Fácil', 3, 'Exercício para fortalecer os ombros', 'Não', 'Halteres', 2),
    ('Bíceps com Halteres', 'Bíceps', 'Intermediário', 3, 'Exercício de força para os bíceps', 'Não', 'Halteres', 1),
    ('Tríceps na Polia', 'Tríceps', 'Intermediário', 3, 'Exercício de força para os tríceps', 'Não', 'Polia', 2),
    ('Abdominal', 'Abdômen', 'Fácil', 3, 'Exercício para fortalecer o abdômen', 'Não', 'Tapete', 3),
    ('Stiff', 'Posterior de coxa', 'Intermediário', 4, 'Exercício para a parte posterior das pernas', 'Não', 'Barra e pesos', 1),
    ('Leg Press', 'Pernas', 'Intermediário', 4, 'Exercício de força para as pernas', 'Não', 'Máquina de leg press', 2),
    ('Puxada Frontal', 'Costas', 'Intermediário', 4, 'Exercício para as costas', 'Não', 'Máquina de puxada', 1),
    ('Extensão de Joelhos', 'Pernas', 'Fácil', 3, 'Exercício de força para os quadríceps', 'Não', 'Máquina de extensão de joelhos', 2),
    ('Cadeira Adutora', 'Pernas', 'Fácil', 3, 'Exercício para a parte interna das coxas', 'Não', 'Máquina adutora', 1),
    ('Cadeira Abdutora', 'Pernas', 'Fácil', 3, 'Exercício para a parte externa das coxas', 'Não', 'Máquina abdutora', 2),
    ('Prancha', 'Abdômen', 'Intermediário', 3, 'Exercício isométrico para o abdômen', 'Não', 'Nenhum', 1),
    ('Elevação de Quadril', 'Glúteos', 'Fácil', 3, 'Exercício para os glúteos', 'Não', 'Nenhum', 2),
    ('Afundo', 'Pernas', 'Intermediário', 4, 'Exercício de força para as pernas', 'Não', 'Halteres', 3),
    ('Rosca Martelo', 'Bíceps', 'Intermediário', 3, 'Exercício de força para os bíceps', 'Não', 'Halteres', 1),
    ('Desenvolvimento com Halteres', 'Ombros', 'Intermediário', 4, 'Exercício de força para os ombros', 'Não', 'Halteres', 2),
    ('Panturrilha em Pé', 'Pernas', 'Fácil', 3, 'Exercício para as panturrilhas', 'Não', 'Máquina de panturrilha', 1);
    
	INSERT INTO Treinos_Diario_Exercicios (treino_diario_id, exercicio_id) 
    VALUES
	(1, 1),
	(2, 2),
    (2, 3),
    (2, 4),
    (2, 11),
    (2, 12),
    (2, 14),
	(3, 3),
	(4, 1),
	(5, 2),
	(6, 3),
	(7, 1),
	(8, 2),
	(9, 3),
	(10, 1);


	INSERT INTO Exercicio_Modalidade (exercicio_id, modalidade_id) 
    VALUES
	
    (2, 1),
    (3, 1),
    (4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1);

	INSERT INTO Repeticoes (quantidade_repeticoes, tempo_descanso) 
    VALUES
	(10, '00:30'),
	(15, '01:00'),
	(12, '00:45');


	INSERT INTO Cargas (numero_cargas) VALUES
(20), (25), (30), (35);


	INSERT INTO Series (repeticoes_id, exercicio_id, carga_id) 
    VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(1, 1, 2),
	(2, 2, 3),
	(3, 3, 1),
	(1, 1, 3),
	(2, 2, 1),
	(1, 1, 1);




