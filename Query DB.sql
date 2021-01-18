create database DBAlasGt;
use DBAlasGt;

create table tipoUsuario(
	tipoUsuarioId tinyint auto_increment not null,
    tipoUsuarioDesc varchar(25) not null,
    primary key PK_tipoUsuario (tipoUsuarioId)
);

create table estadoPedido( 
	estadoPedidoId tinyint auto_increment not null,
    estadoPedidoDesc varchar(25) not null,
    primary key PK_estadoPedido (estadoPedidoId)
);

create table formaPago(
	formaPagoId tinyint auto_increment not null,
    formaPagoDesc varchar(25) unique not null,
    primary key PK_formaPago (formaPagoId)
);

create table Usuario(
	usuarioId int auto_increment not null,
    userName varchar(25) unique not null,
	usuarioNombre varchar(50) not null,
    usuarioApellido varchar(25) not null,
    usuarioContrasena varchar(200) not null,
    tipoUsuarioId tinyint not null,
    primary key PK_usuario (usuarioId),
	Constraint FK_Usuario_TipoUsuario foreign key (tipoUsuarioId) references tipoUsuario(tipoUsuarioId)
);

create table pedido(
	pedidoId int auto_increment not null,
    pedidoFecha date not null,
	pedidoDesc varchar(150) not null,
    nombreReceptor varchar(50) not null,
    pedidoTelefonoReceptor varchar(8) not null,
    pedidoDireccionInicio varchar(150) not null,
    pedidoDireccionFinal varchar(150) not null,
    pedidoUsuarioId int not null,
    pedidoMensajeroId int default "1",
    pedidoMonto decimal not null,
    pedidoCosto decimal,
    pedidoFormaPagoId tinyint,
    pedidoEstadoId tinyint default "1",
    primary key PK_pedido (pedidoId),
    constraint FK_Pedido_Mensajero foreign key (pedidoMensajeroId) references Usuario(UsuarioId),
    constraint FK_Pedido_Usuario foreign key (pedidoUsuarioId) references Usuario(UsuarioId),
    constraint FK_Pedido_PedidoEstado foreign key (pedidoEstadoId) references estadoPedido(estadoPedidoId),
    constraint FK_Pedido_FormaPago foreign key (pedidoFormaPagoId) references formaPago(formaPagoId)
);


create table Sala(
	salaId int auto_increment not null,
    salaDesc varchar(50) not null,
    primary key PK_sala (salaId)
);

create table Mensaje(
	mensajeId int auto_increment not null,
    mensajeSalaId int not null, 
    mensajeUsuarioId int not null,
    mensajeDesc varchar(1000) not null,
    mensajeFecha date not null,
    primary key PK_mensaje (mensajeId),
    constraint FK_Mensaje_Sala foreign key (mensajeSalaId) references Sala(salaId),
    constraint FK_Mensaje_Usuario foreign key (mensajeUsuarioId) references Usuario(usuarioId)
);