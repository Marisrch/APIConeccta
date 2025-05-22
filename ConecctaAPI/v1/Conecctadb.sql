
create database dbconeccta;

use dbconeccta;
 
--criando as tabelas no banco de dados

create table `tbEmpresa` (
  `id_empresa` int not null auto_increment,
  `cnpj_empresa` char (14) unique,
  `nome_empresa` varchar (50),
  `email_empresa` varchar (100) unique,
  `local_empresa` varchar (100),
  `porte_empresa` varchar (50),
  );


 INSERT INTO `tbEmpresa` ('cnpj_empresa', 'nome_empresa', 'email_empresa', 'local_empresa', 'porte_empresa')
VALUES (12345678000195, 'Empresa A', 'contato@empresaa.com', 'Rua A, 100', 'Média'),
(98765432000189, 'Empresa B', 'contato@empresab.com', 'Rua B, 200', 'Grande');

ALTER TABLE `tbEmpresa`
  ADD PRIMARY KEY (`id_empresa`);

ALTER TABLE `tbEmpresa`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

 

 create table tbCandidatos(
  id_candidato int not null auto_increment,
  cpf_candidato char(14) not null unique,
  nome_candidato varchar (50),
  telefone_candidato char(12),
  email_candidato varchar (100) unique,
  local_candidato varchar (100),
  data_nasc_candidato text,
  estado_civil_candidato varchar (20),
  );


INSERT INTO `tbCandidatos` ('cpf_candidato', 'nome_candidato', 'telefone_candidato', 'email_candidato', 'local_candidato', 'data_nasc_candidato', 'estado_civil_candidato')
VALUES (11122233344, 'Candidato A', 1234567890, 'candidatoA@email.com', 'Rua C, 300', '1990-01-01', 'Solteiro'),
(55566677788, 'Candidato B', 0987654321, 'candidatoB@email.com', 'Rua D, 400', '1995-02-02', 'Casado');

ALTER TABLE `tbCandidatos`
  ADD PRIMARY KEY (`id_candidato`);

ALTER TABLE `tbCandidatos`
  MODIFY `id_candidato` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;



create table tbVagas(
  id_vagas int not null auto_increment,
  local_vagas text,
  requisitos_vagas text,
  salario_vagas DECIMAL (10),
  vinculo_vagas varchar (50),
  descricao_vagas text,
  ramo_vagas varchar (50),
  id_empresa int not null,
  id_candidato int not null,
  );


INSERT INTO `tbVagas` ('nome_vagas', 'local_vagas', 'descricao_vagas', 'requisitos_vagas', 'salario_vagas', 'vinculo_vagas', 'ramo_vagas')
VALUES ('Analista de Marketing', 'Local B', 'Atuação com campanhas digitais e branding', 'Experiência em Marketing', 4000.00, 'PJ', 'Marketing'),''
 ('Desenvolvedor Full Stack', 'Belo Horizonte - MG', 'Desenvolvimento de aplicações web utilizando tecnologias front-end e back-end.', 'Conhecimento em JavaScript, Node.js, React, e bancos de dados relacionais.', 7500.00, 'CLT', 'Tecnologia da Informação');

ALTER TABLE `tbVagas`
  ADD PRIMARY KEY (`id_vagas`);

ALTER TABLE `tbVagas`
  MODIFY `id_vagas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


create table tbCurriculo(
  id_curriculo int not null auto_increment,
  descricao_curriculo varchar (250),
  exper_profissional_curriculo text,
  exper_academico_curriculo text,
  certificados_curriculo text,
  endereco_curriculo text,
  id_candidato int not null,
  primary key(id_curriculo),
  foreign key(id_candidato)references tbCandidatos(id_candidato)
);

INSERT INTO `tbCurriculo` ('descricao_curriculo', 'exper_profissional_curriculo', 'exper_academico_curriculo', 'certificados_curriculo', 'endereco_curriculo', 'id_candidato')
VALUES ('Currículo de Candidato A', 'Experiência em TI', 'Formação em Ciências da Computação', 'Certificado XYZ', 'Rua C, 300', 1),
('Currículo de Candidato B', 'Experiência em Marketing', 'Formação em Administração', 'Certificado ABC', 'Rua D, 400', 2);

ALTER TABLE `tbCurriculo`
  ADD PRIMARY KEY (`id_curriculo`);

ALTER TABLE `tbCurriculo`
  MODIFY `id_curriculo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
