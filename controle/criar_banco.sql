drop database CliniSoftware;
CREATE database CliniSoftware;
USE CliniSoftware;

create table pessoa(
	idpessoa int not null auto_increment,
	telefone varchar(15) not null,
    cpf varchar(14),
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
	hora_inicial_intervalo varchar(5) not null,
	hora_final_intervalo varchar(5) not null,
    dia_semana varchar(13) not null,
    primary key (idexpediente)
);

create table trabalha(
	idtrabalha int not null auto_increment,
    idexpediente int not null,
    idfuncionario int not null,
    primary key (idtrabalha),
    foreign key (idexpediente) references expediente(idexpediente) on delete cascade,
    foreign key (idfuncionario) references funcionario(idfuncionario) on delete cascade
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
    preco_padrao float,
    cadastro_unico int not null default 1,
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
	idgerencia int not null auto_increment,
    idrecepcionista int not null,
    idmedico int not null,
    primary key(idgerencia),
    foreign key(idrecepcionista) references recepcionista(idrecepcionista) on delete cascade,
    foreign key(idmedico) references medico(idmedico) on delete cascade
);

create table especialiadade(
	idespecialidade int not null auto_increment,
    nome varchar(45) not null,
	primary key(idespecialidade)
);

create table especializado(
	idespecializado int not null auto_increment,
    idmedico int not null,
    idespecialidade int not null,
	primary key(idespecializado),
    foreign key(idmedico) references medico(idmedico),
    foreign key(idespecialidade) references especialiadade(idespecialidade)
);

create table mercancia(
	idmercancia int not null auto_increment,
	primary key(idmercancia)
);

create table consulta(
	idconsulta int not null auto_increment,
    idmercancia int not null,
    hora varchar(5) not null,
    data date not null,
    preco float not null,
	primary key(idconsulta),
    foreign key(idmercancia) references mercancia(idmercancia)
);

create table ocorrencia_medica(
	idocorrencia_medica int not null auto_increment,
    data date not null,
    diagnostico varchar(45) not null,
	primary key(idocorrencia_medica)
);

create table tem(
	idtem int not null auto_increment,
    idocorrencia_medica int not null,
    idpaciente int not null,
	primary key(idtem),
    foreign key(idocorrencia_medica) references ocorrencia_medica(idocorrencia_medica),
    foreign key(idpaciente) references paciente(idpaciente)
);

create table conta(
	idconta int not null auto_increment,
	idpaciente int not null,
	pago boolean not null,
	primary key(idconta),
	foreign key(idpaciente) references paciente(idpaciente)
);


create table cobranca(
	idcobranca int not null auto_increment,
	idconta int not null,
	idmercancia int not null,
	primary key(idcobranca),
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
	idinclui int not null auto_increment,
	idproduto int not null,
	idprocedimento int not null,
	primary key(idinclui),
	foreign key(idproduto) references produto(idproduto),
	foreign key(idprocedimento) references procedimento(idprocedimento)
);

create table agenda(
	idagenda int not null auto_increment,
	idpaciente int not null,
	idmedico int not null,
	idconsulta int not null,
	primary key(idagenda),
	foreign key(idpaciente) references paciente(idpaciente),
	foreign key(idmedico) references medico(idmedico),
	foreign key(idconsulta) references consulta(idconsulta)
);

insert into pessoa (telefone, cpf, data_nascimento, email, nome) values 
	('(84) 99818-4097', '016.887.454-75', '1994-12-27', 'rodrigo@gmail.com', 'Rodrigo Nunes de Castro'),
	('(84) 99166-5652', null, '1994-12-26', 'fernanda@gmail.com', 'Fernanda Chacon Fountoura'),
	('(84) 11111-1111', null, '1994-12-25', 'major@gmail.com', 'Major Fulano de Testes'),
	('(84) 22222-2222', null, '1994-12-24', 'marcel@gmail.com', 'Marcel Professor Soberano'),
	('(84) 33333-3333', null, '1994-12-23', 'francisco@gmail.com', 'francisco Monitor de Tal');

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

insert into medico (idfuncionario) values (2);

insert into gerencia (idrecepcionista, idmedico) values (1, 1);

insert into paciente (idpessoa) values (4);
