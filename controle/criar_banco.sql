drop database CliniSoftware;
CREATE database CliniSoftware;
USE CliniSoftware;

create table pessoa(
	idpessoa int not null auto_increment,
	telefone varchar(15) not null,
    cpf varchar(14) not null,
    data_nascimento date not null,
    email varchar(45),
    nome varchar(60) not null,
    primary key(idpessoa),
    unique(cpf),
    unique(email)
);

create table usuario(
	idusuario int not null auto_increment,
	senha varchar(50) not null,
	idpessoa int not null,
	primary key (idusuario),
	foreign key (idpessoa) references pessoa(idpessoa),
	unique(idpessoa)
);

create table funcionario(
	idfuncionario int not null auto_increment,
    idpessoa int not null,
    salario float not null,
    data_pagamento varchar(2) not null,
    primary key(idfuncionario),
    foreign key(idpessoa) references pessoa(idpessoa) on delete cascade,
    unique(idpessoa)
);

create table expediente(
	idexpediente int not null auto_increment,
    hora_inicial_expediente varchar(5) not null,
	hora_final_expediente varchar(5) not null,
	dia_semana varchar(13) not null,
	hora_inicial_intervalo varchar(5) default null,
	hora_final_intervalo varchar(5) default null,
    primary key (idexpediente)
);

create table trabalha(
    idexpediente int not null,
    idfuncionario int not null,
    foreign key (idexpediente) references expediente(idexpediente) on delete cascade,
    foreign key (idfuncionario) references funcionario(idfuncionario) on delete cascade,
    unique(idfuncionario, idexpediente)
);

create table administrador(
	idadministrador int not null auto_increment,
    idfuncionario int not null,
    primary key(idadministrador),
    foreign key(idfuncionario) references funcionario(idfuncionario) on delete cascade,
    unique(idfuncionario)
);

create table recepcionista(
	idrecepcionista int not null auto_increment,
	idfuncionario int not null,
    primary key(idrecepcionista),
    foreign key(idfuncionario) references funcionario(idfuncionario) on delete cascade,
    unique(idfuncionario)
);

create table medico(
	idmedico int not null auto_increment,
    idfuncionario int not null,
    preco_padrao float not null,
    cadastro_unico int not null default 1,
    ativo boolean not null default 1,
    primary key(idmedico),
    foreign key(idfuncionario) references funcionario(idfuncionario) on delete cascade,
    unique(idfuncionario)
);

create table paciente(
	idpaciente int not null auto_increment,
    idpessoa int not null,
    primary key(idpaciente),
    foreign key(idpessoa) references pessoa(idpessoa) on delete cascade
);

create table gerencia(
    idrecepcionista int not null,
    idmedico int not null,
    foreign key(idrecepcionista) references recepcionista(idrecepcionista) on delete cascade,
    foreign key(idmedico) references medico(idmedico) on delete cascade,
    unique(idrecepcionista, idmedico)
);

create table especialidade(
	idespecialidade int not null auto_increment,
    nome varchar(45) not null,
	primary key(idespecialidade)
);

create table especializado(
    idmedico int not null,
    idespecialidade int not null,
    foreign key(idmedico) references medico(idmedico) on delete cascade,
    foreign key(idespecialidade) references especialidade(idespecialidade) on delete cascade,
    unique(idmedico, idespecialidade)
);

create table mercancia(
	idmercancia int not null auto_increment,
	primary key(idmercancia)
);

create table consulta(
	idconsulta int not null auto_increment,
    idmercancia int not null,
    idexpediente int not null,
    data date not null,
    preco float,
	primary key(idconsulta),
    foreign key(idmercancia) references mercancia(idmercancia),
    foreign key(idexpediente) references expediente(idexpediente)
);

create table ocorrencia_medica(
	idpaciente int not null,
    data date not null,
    diagnostico varchar(45) not null,
	foreign key(idpaciente) references paciente(idpaciente) on delete cascade,
	unique(idpaciente, data, diagnostico)
);

create table conta(
	idconta int not null auto_increment,
	idpaciente int,
	pago boolean not null default 0,
	primary key(idconta),
	foreign key(idpaciente) references paciente(idpaciente) on delete set null
);


create table cobranca(
	idconta int not null,
	idmercancia int not null,
	foreign key(idconta) references conta(idconta),
	foreign key(idmercancia) references mercancia(idmercancia)
);

create table procedimento(
	idprocedimento int not null auto_increment,
	idmercancia int not null,
	nome varchar(45) not null,
	preco float not null,
	primary key(idprocedimento),
	foreign key(idmercancia) references mercancia(idmercancia)
);

create table produto(
	idproduto int not null auto_increment,
	idmercancia int not null,
	nome varchar(45) not null,
	preco float not null,
	primary key(idproduto),
	foreign key(idmercancia) references mercancia(idmercancia)
);

create table inclui(
	idproduto int not null,
	idprocedimento int not null,
	foreign key(idproduto) references produto(idproduto),
	foreign key(idprocedimento) references procedimento(idprocedimento),
	unique(idproduto, idprocedimento)
);

create table agenda(
	idpaciente int,
	idmedico int,
	idconsulta int,
	foreign key(idpaciente) references paciente(idpaciente) on delete cascade,
	foreign key(idmedico) references medico(idmedico) on delete cascade,
	foreign key(idconsulta) references consulta(idconsulta) on delete cascade,
	unique(idconsulta)
);

insert into pessoa (telefone, cpf, data_nascimento, email, nome) values 
	('(84) 99818-4097', '016.887.454-75', '1994-12-27', 'rodrigo@gmail.com', 'Rodrigo Nunes de Castro'),
	('(84) 99166-5652', '111.111.111-11', '1994-12-26', 'fernanda@gmail.com', 'Fernanda Chacon Fountoura'),
	('(84) 11111-1111', '222.222.222-22', '1994-12-25', 'major@gmail.com', 'Major Fulano de Testes'),
	('(84) 22222-2222', '333.333.333-33', '1994-12-24', 'marcel@gmail.com', 'Marcel Professor Soberano'),
	('(84) 33333-3333', '444.444.444-44', '1994-12-23', 'francisco@gmail.com', 'francisco Monitor de Tal');

insert into usuario (senha, idpessoa) values 
	(md5('rodrigo'), 1),
	(md5('fernanda'), 2),
	(md5('major'), 3),
	(md5('marcel'), 4),
	(md5('francisco'), 5);

insert into funcionario (idpessoa, salario, data_pagamento) values
	(1, 800.00, '05'),
	(2, 700.00, '05'),
	(3, 900.00, '05');

insert into administrador (idfuncionario) values (1);

insert into recepcionista (idfuncionario) values (3);

insert into medico (idfuncionario, preco_padrao) values (2, 100.00);

insert into expediente (hora_inicial_expediente, hora_final_expediente, dia_semana, hora_inicial_intervalo, hora_final_intervalo) values 
	('07:15', '17:45', 'Segunda-Feira', '12:00', '14:00');

insert into expediente (hora_inicial_expediente, hora_final_expediente, dia_semana) values 
	('08:00', '11:30', 'Terça-Feira');

insert into trabalha (idfuncionario, idexpediente) values (1, 1), (2, 2), (3, 1);

insert into gerencia (idrecepcionista, idmedico) values (1, 1);

insert into paciente (idpessoa) values (4);

insert into mercancia () values (), (), (), (), ();

insert into consulta (idexpediente, data, preco, idmercancia) values (2, '2016-06-28', 120.00, 1) ,(2, '2016-06-07', 120.00, 2), (2, '2016-06-21', null, 3);

insert into agenda (idpaciente, idmedico, idconsulta) values (1, 1, 1), (1, 1, 2), (1, 1, 3);

insert into ocorrencia_medica (idpaciente, data, diagnostico) values (1, '2016-06-10', 'Frescurite aguda');

insert into produto (idmercancia, nome, preco) values (4 ,'seringa', 1.50);

insert into procedimento (idmercancia, nome, preco) values (5, 'exame de sangue', 15.75);

insert into inclui(idprocedimento, idproduto) values (1, 1);

insert into especialidade (nome) values ('Neurologista');

insert into especializado (idmedico, idespecialidade) values (1, 1);


