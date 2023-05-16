CREATE DATABASE carwash;
USE carwash;
CREATE TABLE usuarios(
id_user int NOT NULL PRIMARY KEY AUTO_INCREMENT,
cpf varchar(15),
data_nasc date,
idade int,
username varchar(100),
email varchar(150),
pass_key varchar(200),
cellphone varchar(15),
telephone varchar(15),
address varchar(200),
number_home int (10),
complement varchar(200),
district varchar(100),
city varchar(100),
state varchar(2),
zip varchar(10), 
data_reg date,
sts int);

CREATE TABLE carros(
id_car int NOT NULL PRIMARY KEY AUTO_INCREMENT,
id_user int,
modelo varchar (200),
marca varchar (100),
ano year,
tipo varchar(100),
porte varchar(100),
placa varchar(100),
CONSTRAINT fkcar FOREIGN KEY (id_user)
REFERENCES usuarios (id_user));


CREATE TABLE dados_empresa (
id_empresa int NOT NULL PRIMARY KEY,
razao_social varchar(100), 
cnpj varchar(18), 
insc_estadual varchar(20),
cep varchar(10),
endereco varchar(100),
numero varchar(10),
complemento varchar(100),
bairro varchar(50),
cidade varchar(100),
estado varchar(2),
fone varchar(45),
email varchar(100),
logomarca varchar(45),
responsavel varchar(100));

CREATE TABLE funcionarios(
id_func int NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome_func varchar(255),
email varchar(100),
data_nasc date,
idade int,
cpf varchar(45),
funcao varchar(45),
salario decimal(10,2),
senha varchar(150),
cep varchar(20),
endereco varchar(100),
celular varchar(45),
telefone varchar(45),
bairro varchar(100),
cidade varchar(100),
estado varchar(2),
data_emissao date,
permissao int,
sts int);



CREATE TABLE servicos(
id_servico int NOT NULL PRIMARY KEY AUTO_INCREMENT,
id_func int,
cod_serv int,
servico varchar (100),
valor decimal(10,2),
tempo_servico varchar(50),
CONSTRAINT fkserv FOREIGN KEY (id_func)
REFERENCES funcionarios (id_func));

INSERT INTO servicos(id_servico, id_func, cod_serv, servico, valor, tempo_servico) VALUES 
(null, 1, 10,'Lavação completa e enceramento', '49.90', 30),
(null, 1, 20,'Higienização e Lavação completa', '89.90', 60),
(null, 1, 30,' Ducha', '19.90', 10);

CREATE TABLE  agendamento(
id_agendamento int NOT NULL PRIMARY KEY AUTO_INCREMENT,
id_user int,
id_car int,
id_func int,
id_servico int,
data_agen date,
hora_disp time,
status int);


CREATE TABLE horarios_disp(
id_data int NOT NULL PRIMARY KEY AUTO_INCREMENT,
data_disp DATE,
hora_disp TIME);

SELECT * FROM horarios_disp;

INSERT INTO horarios_disp(id_data, data_disp, hora_disp) VALUES
(null, '2023-05-03', '07:00'),
(null, '2023-05-03', '07:30'),
(null, '2023-05-03', '08:00'),
(null, '2023-05-03', '08:30'),
(null, '2023-05-03', '09:00'),
(null, '2023-05-03', '09:30'),
(null, '2023-05-03', '10:00'),
(null, '2023-05-03', '10:30'),
(null, '2023-05-03', '11:00'),
(null, '2023-05-03', '11:30'),
(null, '2023-05-03', '12:00'),
(null, '2023-05-03', '12:30'),
(null, '2023-05-03', '13:00'),
(null, '2023-05-03', '13:30'),
(null, '2023-05-03', '14:00'),
(null, '2023-05-03', '14:30'),
(null, '2023-05-03', '15:00'),
(null, '2023-05-03', '15:30'),
(null, '2023-05-03', '16:00'),
(null, '2023-05-03', '16:30'),
(null, '2023-05-03', '17:00'),
(null, '2023-05-03', '17:30'),
(null, '2023-05-03', '18:00'),
(null, '2023-05-03', '18:30');



SELECT data_disp, hora_disp FROM horarios_disp;

SELECT * FROM usuarios;

SELECT * FROM carros;

SELECT * FROM agendamento;

SELECT * FROM servicos;

SELECT * FROM funcionarios;


SELECT * FROM funcionarios WHERE email = 'admin@admin.com';
SELECT * FROM usuarios WHERE email = 'admin@admin.com';





INSERT INTO carros (id_car, id_user, modelo, marca, ano, tipo, porte, placa) VALUES(null, 1, 'Gol ', 'Volkswagen' , '2020', 'Hatch', 'Médio', 'SL34SSE3');

INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '7:00:00', 0);
INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '8:00:00', 0);
INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '9:00:00', 0);
INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '10:00:00', 0);


SELECT u.username, f.nome_func, c.modelo, s.servico, a.data_agen, a.status FROM agendamento AS a
            INNER JOIN funcionarios AS f
            ON a.id_func = f.id_func
            INNER JOIN usuarios AS u
            ON a.id_user = u.id_user
            INNER JOIN servicos AS s
            ON a.id_servico = s.id_servico
            INNER JOIN carros AS c
            ON a.id_car = c.id_car;
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            