CREATE TABLE Enderecos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    CEP INT NOT NULL,
    rua VARCHAR(255) NOT NULL,
    bairro VARCHAR(45) NOT NULL,
    cidade VARCHAR(45) NOT NULL,
    complemento VARCHAR(100) NOT NULL
);
CREATE TABLE Pessoas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    endereco_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(12) NOT NULL UNIQUE,
    altura DECIMAL(5,2) NOT NULL,
    peso DECIMAL(5,2) NOT NULL,
    data_matricula DATE NOT NULL,
    data_nascimento DATE NOT NULL,
    senha VARCHAR(256) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    FOREIGN KEY (endereco_id) REFERENCES Enderecos(id)
);

CREATE TABLE Academias (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR (20) NOT NULL,
    horario_funcionamento_abertura TIME NOT NULL,
    horario_funcionamento_fechamento TIME NOT NULL,
    endereco_id INT NOT NULL,
    FOREIGN KEY (endereco_id) REFERENCES Enderecos(id)
);

CREATE TABLE Pessoas_Academias (
	academia_id INT NOT NULL,
    pessoa_id INT NOT NULL,
    FOREIGN KEY (academia_id) REFERENCES Academias(id),
    FOREIGN KEY (pessoa_id) REFERENCES Pessoas(id)
);

CREATE TABLE Tipo_Pessoas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Pessoas_Tipo_Pessoas (
    pessoa_id INT NOT NULL,
    tipo_pessoa_id INT NOT NULL,
    FOREIGN KEY (pessoa_id) REFERENCES Pessoas(id),
    FOREIGN KEY (tipo_pessoa_id) REFERENCES Tipo_Pessoas(id)
);

CREATE TABLE Tempo_Fichas (
	id INT PRIMARY KEY AUTO_INCREMENT,
	data_inicio DATE,
    data_fim DATE,
    quantidade_dias INT,
    pessoa_id INT NOT NULL,
	FOREIGN KEY (pessoa_id) REFERENCES Pessoas(id)
);

CREATE TABLE Fichas_Treino (
	id INT PRIMARY KEY AUTO_INCREMENT,
    objetivos VARCHAR(150) NOT NULL,
    experiencia TEXT NOT NULL,
    recomendacoes_medicas TEXT NOT NULL,
    condicoes_medicas VARCHAR(45) NOT NULL,
    treinador_responsavel_id INT NOT NULL,
    objetivo VARCHAR(100) NOT NULL,
    academia_id INT NOT NULL,
    tempo_ficha_id INT NOT NULL,
    FOREIGN KEY (treinador_responsavel_id) REFERENCES Pessoas(id),
    FOREIGN KEY (academia_id) REFERENCES Academias(id),
    FOREIGN KEY (tempo_ficha_id) REFERENCES Tempo_Fichas(id)
);

CREATE TABLE Status (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    slug VARCHAR(45) NOT NULL
);

CREATE TABLE Checkins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data_check_in DATETIME NOT NULL,
    duracao_treino INT NOT NULL,
    motivos_status VARCHAR(45) NOT NULL,
    pessoa_id INT NOT NULL,
    status_id INT NOT NULL,
    FOREIGN KEY (pessoa_id) REFERENCES Pessoas(id),
    FOREIGN KEY (status_id) REFERENCES Status(id)
);

CREATE TABLE Treinos_Diario (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL,
    ficha_treino_id INT NOT NULL,
    checkin_id INT NOT NULL,
	FOREIGN KEY (ficha_treino_id) REFERENCES Fichas_Treino(id),
    FOREIGN KEY (checkin_id) REFERENCES Checkins(id)
);

CREATE TABLE Modalidades(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR (100) NOT NULL,
    slug VARCHAR (100) NOT NULL,
    descricao VARCHAR (300) NOT NULL,
    objetivo VARCHAR (100) NOT NULL
);

CREATE TABLE Academias_Modalidades (
	academia_id INT NOT NULL,
    modalidade_id INT NOT NULL,
    FOREIGN KEY (academia_id) REFERENCES Academias(id),
    FOREIGN KEY (modalidade_id) REFERENCES Modalidades(id)
);

CREATE TABLE Materiais_apoio_exercicios(
	id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(45) NOT NULL,
    tipo VARCHAR(45) NOT NULL,
    url VARCHAR(300) NOT NULL
);

CREATE TABLE Exercicios (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    musculatura_alvo VARCHAR (45) NOT NULL,
    dificuldade VARCHAR (45) NOT NULL,
    quantidade_series INT NOT NULL,
    descricao TEXT NOT NULL,
    concluido VARCHAR (45),
    equipamentos_necessarios VARCHAR(45) NOT NULL,
    material_apoio_id INT NOT NULL,
    FOREIGN KEY (material_apoio_id) REFERENCES Materiais_apoio_exercicios(id)
);

CREATE TABLE Treinos_Diario_Exercicios (
	treino_diario_id INT NOT NULL,
    exercicio_id INT NOT NULL,
    FOREIGN KEY (treino_diario_id) REFERENCES Treinos_Diario(id),
    FOREIGN KEY (exercicio_id) REFERENCES Exercicios(id)
);

CREATE TABLE Exercicio_Modalidade (
	exercicio_id INT NOT NULL,
    modalidade_id INT NOT NULL,
    FOREIGN KEY (exercicio_id) REFERENCES Exercicios(id),
    FOREIGN KEY (modalidade_id) REFERENCES Modalidades(id)
);

CREATE TABLE Repeticoes (
	id INT PRIMARY KEY AUTO_INCREMENT,
    quantidade_repeticoes INT NOT NULL,
    tempo_descanso TIME NOT NULL
);

CREATE TABLE Cargas (
	id INT PRIMARY KEY AUTO_INCREMENT,
    numero_cargas INT NOT NULL
);

CREATE TABLE Series (
    repeticoes_id INT NOT NULL,
    exercicio_id INT NOT NULL,
    carga_id INT NOT NULL,
    FOREIGN KEY (repeticoes_id) REFERENCES Repeticoes(id),
    FOREIGN KEY (exercicio_id) REFERENCES Exercicios(id),
    FOREIGN KEY (carga_id) REFERENCES Cargas(id)
);


