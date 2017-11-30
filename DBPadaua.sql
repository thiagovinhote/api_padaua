#criação da base de dados
CREATE DATABASE IF NOT EXISTS dbpadaua;

#utilizar a base
USE dbpadaua;

DROP TABLE IF EXISTS ideia_has_campo_atuacao;
DROP TABLE IF EXISTS usuario_has_time;
DROP TABLE IF EXISTS habilidade_has_usuario;
DROP TABLE IF EXISTS ideia;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS habilidade;
DROP TABLE IF EXISTS campo_atuacao;
DROP TABLE IF EXISTS atividade;
DROP TABLE IF EXISTS entrega;
DROP TABLE IF EXISTS roteiro;
DROP TABLE IF EXISTS time;
DROP TABLE IF EXISTS template;
DROP TABLE IF EXISTS metodologia;

#criacao da tabela usuario

CREATE TABLE usuario (
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    link_linkedin VARCHAR(225),
    celular VARCHAR(50) NOT NULL,
    nick VARCHAR(50),
    senha VARCHAR(8),
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela habilidade

CREATE TABLE habilidade (
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela campo_atuacao

CREATE TABLE campo_atuacao (
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela metodologia

CREATE TABLE metodologia (
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;


#criacao da tabela ideia

CREATE TABLE ideia (
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    data_criacao DATE NOT NULL,
    usuario_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela atividade

CREATE TABLE atividade (
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    ordem INT(4) NOT NULL,
    metodologia_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela template

CREATE TABLE template (
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    metodologia_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela roteiro

CREATE TABLE roteiro (
    id INT(10) NOT NULL AUTO_INCREMENT,
    intervalo_entregas INT(10) NOT NULL,
    progresso DOUBLE NOT NULL,
    template_id INT(10),
    time_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela entrega

CREATE TABLE entrega (
    id INT(10) NOT NULL AUTO_INCREMENT,
    data DATE NOT NULL,
    objetivo_entrega TEXT NOT NULL,
    objeto_entrega VARCHAR(100) NOT NULL,
    tempo DATE NOT NULL,
    roteiro_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela time

CREATE TABLE time(
    id INT(10) NOT NULL AUTO_INCREMENT,
    nome_time VARCHAR (100) NOT NULL,
    data_criacao DATE NOT NULL,
    descricao TEXT,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela habilidade_has_usuario

CREATE TABLE habilidade_has_usuario(
    id INT(10) NOT NULL AUTO_INCREMENT,
    habilidade_id INT (10) NOT NULL,
    usuario_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela usuario_has_time

CREATE TABLE usuario_has_time(
    id INT(10) NOT NULL AUTO_INCREMENT,
    time_id INT (10) NOT NULL,
    usuario_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#criacao da tabela ideia_has_campo_atuacao

CREATE TABLE ideia_has_campo_atuacao(
    id INT(10) NOT NULL AUTO_INCREMENT,
    campo_atuacao_id INT (10) NOT NULL,
    ideia_id INT(10) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = INNODB;

#adicionar FK usuario na ideia
ALTER TABLE ideia
ADD CONSTRAINT fk_usuario_ideia
FOREIGN KEY(usuario_id)
REFERENCES usuario(id);

#adicionar FK metodologia na atividade
ALTER TABLE atividade
ADD CONSTRAINT fk_metodologia_atividade
FOREIGN KEY(metodologia_id)
REFERENCES metodologia(id) ON DELETE CASCADE;

#adicionar FK metodologia na template
ALTER TABLE template
ADD CONSTRAINT fk_metodologia_template
FOREIGN KEY(metodologia_id)
REFERENCES metodologia(id) ON DELETE CASCADE;

#adicionar FK template na roteiro
ALTER TABLE roteiro
ADD CONSTRAINT fk_template_roteiro
FOREIGN KEY(template_id)
REFERENCES template(id) ON DELETE SET NULL;

#adicionar FK time na roteiro
ALTER TABLE roteiro
ADD CONSTRAINT fk_time_roteiro
FOREIGN KEY(time_id)
REFERENCES time(id);

#adicionar FK roteiro na entrega
ALTER TABLE entrega
ADD CONSTRAINT fk_roteiro_entrega
FOREIGN KEY(roteiro_id)
REFERENCES roteiro(id) ON DELETE CASCADE;


#adicionar FK usuario na usuario_has_time
ALTER TABLE usuario_has_time
ADD CONSTRAINT fk_usuario_usuario_has_time
FOREIGN KEY(usuario_id)
REFERENCES usuario(id);

#adicionar FK time na usuario_has_time
ALTER TABLE usuario_has_time
ADD CONSTRAINT fk_time_usuario_has_time
FOREIGN KEY(time_id)
REFERENCES time(id);

#adicionar FK habilidade na habilidade_has_usuario
ALTER TABLE habilidade_has_usuario
ADD CONSTRAINT fk_habilidade_habilidade_has_usuario
FOREIGN KEY(habilidade_id)
REFERENCES habilidade(id);

#adicionar FK usuario na habilidade_has_usuario
ALTER TABLE habilidade_has_usuario
ADD CONSTRAINT fk_usuario_habilidade_has_usuario
FOREIGN KEY(usuario_id)
REFERENCES usuario(id);

#adicionar FK ideia na ideia_has_campo_atuacao
ALTER TABLE ideia_has_campo_atuacao
ADD CONSTRAINT fk_ideia_ideia_has_campo_atuacao
FOREIGN KEY(ideia_id)
REFERENCES ideia(id);

#adicionar FK campo_atuacao na ideia_has_campo_atuacao
ALTER TABLE ideia_has_campo_atuacao
ADD CONSTRAINT fk_campo_atuacao_ideia_has_campo_atuacao
FOREIGN KEY(campo_atuacao_id)
REFERENCES campo_atuacao(id);

USE dbpadaua;

#usuario
INSERT INTO usuario(
    nome,
    email,
    link_linkedin,
    celular,
    nick,
    senha
) VALUES (
    'Maria Rita da Rocha',
    'mariarita@gmail.com',
    'Não possui',
    '(97) 991751481',
    'rita_maravilhosa',
    'anaclara'
);

INSERT INTO usuario(
    nome,
    email,
    link_linkedin,
    celular,
    nick,
    senha
) VALUES (
    'Raimundo Nonato Nunes Amâncio',
    'raimundononato@gmail.com',
    'Não possui',
    '(97) 991663399',
    'natinho_fodastico',
    'thuca'
);

INSERT INTO usuario(
    nome,
    email,
    link_linkedin,
    celular,
    nick,
    senha
) VALUES (
    'Jerson Joaquim da Silva Nunes',
    'jersonjoaquim@gmail.com',
    'Não possui',
    '(92) 994552288',
    'joca',
    'anarita'
);

INSERT INTO usuario(
    nome,
    email,
    link_linkedin,
    celular,
    nick,
    senha
) VALUES (
    'Renato da Silva Nunes',
    'renato@gmail.com',
    'Não possui',
    '(92) 994441177',
    'renato_filosofo',
    'livros'
);

INSERT INTO usuario(
    nome,
    email,
    link_linkedin,
    celular,
    nick,
    senha
) VALUES (
    'Adriano da Silva Nunes',
    'adriano@gmail.com',
    'Não possui',
    '(97) 997113322',
    'adriano_biologo',
    'prof'
);

#habilidade
INSERT INTO habilidade(
    nome
) VALUES (
    'Trabalho em equipe'
);

INSERT INTO habilidade(
    nome
) VALUES (
    'Back-End'
);

INSERT INTO habilidade(
    nome
) VALUES (
    'Autodidata'
);

INSERT INTO habilidade(
    nome
) VALUES (
    'Proativo'
);

INSERT INTO habilidade(
    nome
) VALUES (
    'Comunicativo'
);

#campo_atuacao
INSERT INTO campo_atuacao(
    nome
) VALUES (
    'Engenharia de Software'
);

INSERT INTO campo_atuacao(
    nome
) VALUES (
    'Economia'
);

INSERT INTO campo_atuacao(
    nome
) VALUES (
    'Linguista'
);

INSERT INTO campo_atuacao(
    nome
) VALUES (
    'Filosofia'
);

INSERT INTO campo_atuacao(
    nome
) VALUES (
    'Biologia'
);

#popular tabela de metodologia
INSERT INTO metodologia (nome, descricao) VALUES ('SCRUM','A metodologia Scrum utiliza princípios ágeis para gerenciar o
processo de desenvolvimento de software nas equipes desenvolvedoras. Abstraindo diversos aspectos documentais do processo
de desenvolvimento tradicional, o Scrum oferece a possibilidade de auto-gerenciamento por parte de seus times');
#inicio das alterações -----> here
INSERT INTO metodologia (nome, descricao) VALUES ('KANBAN','Kanban é um termo de origem japonesa e significa literalmente “cartão” ou “sinalização”. Este é um conceito relacionado com a utilização de cartões (post-it e outros) para indicar o andamento dos fluxos de produção em empresas de fabricação em série.');
INSERT INTO metodologia (nome, descricao) VALUES ('XP','Programação extrema, ou simplesmente XP, é uma metodologia ágil para equipes pequenas e médias e que irão desenvolver software com requisitos vagos e em constante mudança.');
INSERT INTO metodologia (nome, descricao) VALUES ('CRISTAL','Crystal é uma família de metodologias de desenvolvimento de software e, como os cristais, possui diferentes cores e rigidez, referindo-se ao tamanho e ao nível crítico do projeto.');
INSERT INTO metodologia (nome, descricao) VALUES ('FDD', 'O Desenvolvimento Guiado por Funcionalidades (do inglês, Feature Driven Development; FDD) é uma das seis metodologias ágeis originais do desenvolvimento de software. Seus representantes redigiram o Manifesto Ágil para Desenvolvimento de Software, em 2001.');

#popular a tabela atividade
INSERT INTO atividade (nome, descricao, ordem, metodologia_id) VALUES ('Daily Scrum Meeting', 'Atividade diária em que os integrantes se reunem para discutir sobre as atividades do dia, o que foi feito anteriormente por cada integrante, o que será feito posteriormente e se há ou houve algum entendimento', 1, 1);
INSERT INTO atividade (nome, descricao, ordem, metodologia_id) VALUES ('Pegar uma task', 'Atividade em que uma tarefa é atribuída ao desenvolvedor quando o mesmo retira um post-it do Kabanboard ', 2, 2);
INSERT INTO atividade (nome, descricao, ordem, metodologia_id) VALUES ('Pair programming', 'Atividade em que os programadores se juntam aos pares para programar', 4, 3);
INSERT INTO atividade (nome, descricao, ordem, metodologia_id) VALUES ('Staging', 'Planejamento do próximo incremento do sistema. A equipe seleciona os requisitos que serão implementados na iteração e o prazo para sua entrega.', 1, 4);
INSERT INTO atividade (nome, descricao, ordem, metodologia_id) VALUES ('Concepção', 'Acontece a triagem de requisitos. Você ainda pode usar as técnicas tradicionais da Engenharia de Requisitos, mas focando em funcionalidades, é perfeitamente viável essa abordagem. De início você tem que desenvolver um modelo abrangente. Isso é legal porque nesse ponto começa a se mixar o FDD com as práticas de OOAD e UML em Cores.', 1, 5);

#popular a tabela template
INSERT INTO template (nome, metodologia_id) VALUES ('Scrum Template', 1);
INSERT INTO template (nome, metodologia_id) VALUES ('Kanban Template', 2);
INSERT INTO template (nome, metodologia_id) VALUES ('XP Template', 3);
INSERT INTO template (nome, metodologia_id) VALUES ('Cristal Template', 4);
INSERT INTO template (nome, metodologia_id) VALUES ('FDD Template', 5);

#habilidade_has_usuario
INSERT INTO habilidade_has_usuario(
    habilidade_id,
    usuario_id
) VALUES (
    1,
    1
);

INSERT INTO habilidade_has_usuario(
    habilidade_id,
    usuario_id
) VALUES (
    2,
    2
);

INSERT INTO habilidade_has_usuario(
    habilidade_id,
    usuario_id
) VALUES (
    3,
    3
);

INSERT INTO habilidade_has_usuario(
    habilidade_id,
    usuario_id
) VALUES (
    4,
    4
);

INSERT INTO habilidade_has_usuario(
    habilidade_id,
    usuario_id
) VALUES (
    5,
    5
);

#time
INSERT INTO time(
    nome_time,
    data_criacao,
    descricao
) VALUES (
    'Time 1',
    '12/03/2017',
    'Time focado no desenvolvimento de software para aplicações mobile'
);

INSERT INTO time(
    nome_time,
    data_criacao,
    descricao
) VALUES (
    'Time 2',
    '18/11/2017',
    'Equipe para desenvolvimento iOS'
);

INSERT INTO time(
    nome_time,
    data_criacao,
    descricao
) VALUES (
    'Time 3',
    '24/06/2017',
    'Desenvolvimento Web'
);

INSERT INTO time(
    nome_time,
    data_criacao,
    descricao
) VALUES (
    'Time 4',
    '22/01/2016',
    'Equipe de desenvolvimento para Android'
);

INSERT INTO time(
    nome_time,
    data_criacao,
    descricao
) VALUES (
    'Time 5',
    '11/07/2016',
    'Equipe voltado ao desenvimento de software embarcado'
);

#roteiro
INSERT INTO roteiro (intervalo_entregas, progresso, template_id, time_id) VALUES (5, 24.3, 1, 2);
INSERT INTO roteiro (intervalo_entregas, progresso, template_id, time_id) VALUES (5, 33.8, 2, 3);
INSERT INTO roteiro (intervalo_entregas, progresso, template_id, time_id) VALUES (10, 12.1, 3, 4);
INSERT INTO roteiro (intervalo_entregas, progresso, template_id, time_id) VALUES (7, 51.5, 4, 1);
INSERT INTO roteiro (intervalo_entregas, progresso, template_id, time_id) VALUES (5, 49.3, 5, 5);

#popular a tabela entrega
INSERT INTO entrega (data, objetivo_entrega, objeto_entrega, tempo, roteiro_id) VALUES ('2017/10/03', 'Guide Questions', 'Documentos de Questions 1', '2017/10/15', 1);
INSERT INTO entrega (data, objetivo_entrega, objeto_entrega, tempo, roteiro_id) VALUES ('2017/10/04', 'Entrevista com cliente', 'Wireframe de média', '2017/10/18', 2);
INSERT INTO entrega (data, objetivo_entrega, objeto_entrega, tempo, roteiro_id) VALUES ('2017/10/08', 'Guide questions respondidas', 'Documentos de Questions 2', '2017/10/20', 3);
INSERT INTO entrega (data, objetivo_entrega, objeto_entrega, tempo, roteiro_id) VALUES ('2017/10/25', 'Histórias de usuário feitas', 'Backlog', '2017/10/30', 4);
INSERT INTO entrega (data, objetivo_entrega, objeto_entrega, tempo, roteiro_id) VALUES ('2017/11/02', 'Primeira entrega de produto', 'Produto', '2017/11/10', 5);

#usuario_has_time
INSERT INTO usuario_has_time(
    usuario_id,
    time_id
) VALUES (
    1,
    1
);

INSERT INTO usuario_has_time(
    usuario_id,
    time_id
) VALUES (
    2,
    2
);

INSERT INTO usuario_has_time(
    usuario_id,
    time_id
) VALUES (
    3,
    3
);

INSERT INTO usuario_has_time(
    usuario_id,
    time_id
) VALUES (
    4,
    4
);

#usuario_has_time
INSERT INTO usuario_has_time(
    usuario_id,
    time_id
) VALUES (
    5,
    5
);

#ideia
INSERT INTO ideia(
    nome,
    descricao,
    data_criacao,
    usuario_id
) VALUES (
    'Econimize água',
    'Equipamento residencial que auxilia na econmia de água',
    '12/03/2017',
    1
);

INSERT INTO ideia(
    nome,
    descricao,
    data_criacao,
    usuario_id
) VALUES (
    'Aplicativo Energia',
    'O aplicativo mostra o consumo de energia diário e mensal, além de exibir o valor da fatura',
    '18/11/2017',
    2
);

INSERT INTO ideia(
    nome,
    descricao,
    data_criacao,
    usuario_id
) VALUES (
    'Momory',
    'O objetivo é criar uma aplicação que ajude pessoas que tem dificuldades de memória',
    '24/06/2017',
    '3'
);

INSERT INTO ideia(
    nome,
    descricao,
    data_criacao,
    usuario_id
) VALUES (
    'Movin',
    'Incentivar as pesoas que tem dificuldade ou sempre adiam para começar a praticar exercícios físicos',
    '22/01/2016',
    4
);

INSERT INTO ideia(
    nome,
    descricao,
    data_criacao,
    usuario_id
) VALUES (
    'Incentive',
    'A ideia é criar uma aplicação para incentivar crianças a lerem mais',
    '11/07/2016',
    1
);

#ideia_has_campo_atuacao
INSERT INTO ideia_has_campo_atuacao(
    campo_atuacao_id,
    ideia_id
) VALUES (
    1,
    1
);

INSERT INTO ideia_has_campo_atuacao(
    campo_atuacao_id,
    ideia_id
) VALUES (
    2,
    2
);

INSERT INTO ideia_has_campo_atuacao(
    campo_atuacao_id,
    ideia_id
) VALUES (
    3,
    3
);

INSERT INTO ideia_has_campo_atuacao(
    campo_atuacao_id,
    ideia_id
) VALUES (
    4,
    4
);

INSERT INTO ideia_has_campo_atuacao(
    campo_atuacao_id,
    ideia_id
) VALUES (
    5,
    5
);

#select com WHERE
SELECT * FROM usuario WHERE id = 1;

#select com AND
SELECT * FROM usuario WHERE email = 'jersonjoaquim@gmail.com' AND nick = 'joca';

#select com IN
SELECT * FROM habilidade WHERE id IN (1,4,5);

#select com LIKE
SELECT * FROM campo_atuacao WHERE nome LIKE '%ia';

#select com LIMIT
SELECT * FROM atividade LIMIT 2;

#select com ORDER BY
SELECT * FROM atividade ORDER BY ordem;

#select com GROUP BY
SELECT * FROM ideia GROUP BY usuario_id;

#select com AND e IN
SELECT * FROM usuario WHERE id IN(1,2,3) ORDER BY id;

SELECT * FROM usuario ORDER BY nome LIMIT 4;

SELECT * FROM entrega WHERE data BETWEEN '2017/10/03' AND '2017/10/08';
