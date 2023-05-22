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
data_reg datetime,
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
number_home varchar(20),
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

INSERT INTO usuarios (id_user, cpf, data_nasc, idade, username, email, pass_key, 
cellphone, telephone, address, number_home, complement, district, city, state, zip, 
data_reg, sts) VALUES(null,'111.111.111-11', '2004-01-01','19', 'Joãozinho Paulo', 
'cliente@gmail.com', '$2y$10$vNCgLuOiTEo1m/xSea3Ke..GSdPEKcWkWJ4phTnmYz12TRAECLBz2',
'(99) 99999-9999', '(44) 4444-4444','Rua Claudio Lopes','1200','Casa', 'Aventureiro',
'Joinville','SC','89225-721', '2023-05-19 15:56:05', '0');

INSERT INTO funcionarios( id_func, nome_func, email, data_nasc, idade, cpf, funcao, 
salario, senha, cep, endereco, number_home, celular, telefone, bairro, cidade, 
estado, data_emissao, permissao, sts) VALUES (null, 'Admin', 'admin@admin.com', 
'2001-01-01', '22', '133.234.455-90', 'Recursos Humanos', '20000.00', 
'$2y$10$m29XYU4qb5Mog11RKP.cyeL/KtngOBdAzJ22Q45iFXGMmdBuU77QG', 
'89225-721', 'Rua Claudio Lopes', '1281', '(47) 99635-6349', '(47) 3227-6855', 
'Aventureiro', 'Joinville', 'SC', '2023-05-19', '1', '1');

INSERT INTO carros (id_car, id_user, modelo, marca, ano, tipo, porte, placa) VALUES(null, 1, 'Gol ', 'Volkswagen' , '2020', 'Hatch', 'Médio', 'SL34SSE3');

INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '7:00:00', 0);
INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '8:00:00', 0);
INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '9:00:00', 0);
INSERT INTO agendamento values(null, 1, 1, 1, 1, '2023-05-03', '10:00:00', 0);

INSERT INTO servicos(id_servico, id_func, cod_serv, servico, valor, tempo_servico) VALUES 
(null, 1, 10,'Lavação completa e enceramento', '49.90', 30),
(null, 1, 20,'Higienização e Lavação completa', '89.90', 60),
(null, 1, 30,' Ducha', '19.90', 10);
   
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
