create database DBAlasGt;
use DBAlasGt;

create table EstadoCivil(
	estadoCivilId int auto_increment not null,
    estadoCivilDesc varchar(20) unique not null,
    primary key PK_EstadoCivil(estadoCivilId)
);



create table tipoUsuario(
	tipoUsuarioId tinyint auto_increment not null,
    tipoUsuarioDesc varchar(25) not null,
    primary key PK_tipoUsuario (tipoUsuarioId)
);

create table estadoUsuario( 
	estadoUsuarioId tinyint auto_increment not null,
    estadoUsuarioDesc varchar(25) not null,
    primary key PK_estadoUsuario (estadoUsuarioId)
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

create table Banco(
	bancoId int auto_increment not null,
	bancoDesc varchar(30) unique not null,
    primary key PK_banco (bancoId)
);

create table TipoCuenta(
	tipoCuentaId int auto_increment not null,
    tipoCuentaDesc varchar(30) unique not null,
    primary key PK_TipoCuenta (tipoCuentaId)
);



create table Usuario(
	usuarioId int auto_increment not null,
    userName varchar(25) unique not null,
	usuarioNombre varchar(50) not null,
    usuarioApellido varchar(25) not null,
    usuarioCorreo varchar(30) not null unique,
    usuarioContrasena varchar(200) not null,
	empresaDesc varchar(25), 
    empresaNumeroCuenta varchar(25), 
    tipoUsuarioId tinyint not null,
    estadoUsuarioId tinyint not null default '1', 
    empresaCuentaTipo int, 
    empresaBanco int,
    primary key PK_usuario (usuarioId),
	Constraint FK_Usuario_TipoUsuario foreign key (tipoUsuarioId) references tipoUsuario(tipoUsuarioId),
    Constraint FK_Usuario_EstadoUsuario foreign key (estadoUsuarioId) references estadoUsuario(estadoUsuarioId),
	constraint FK_Empresa_Tipocuenta foreign key (empresaCuentaTipo) references TipoCuenta(tipoCuentaId),
    constraint FK_Empresa_Banco foreign key (empresaBanco) references Banco(bancoId)
);

create table Mensajero(
	idMensajero int auto_increment not null,
    primerNombreMensajero varchar(30) not null,
    segundoNombreMensajero varchar(30) not null,
    primerApellidoMensajero varchar(30) not null,
	segundoApellidoMensajero varchar(30) not null,
    usuarioId int not null,
    dpiMensajero varchar(13) not null unique,
    placasMensajero varchar(20) not null unique,
    telefonoMensajero varchar(8) not null unique,
    direccionMensajero varchar(150) not null,
    estadoCivil int not null,
    primary key PK_Mensajero(idMensajero),
	Constraint FK_Mensajero_EstadoCivil foreign key (estadoCivil) references EstadoCivil(estadoCivilId),
    Constraint FK_Mensajero_UsuarioId foreign key (usuarioId) references Usuario(usuarioId)
);



create table puntoInicio(
	puntoInicioCodigo int auto_increment not null,
    puntoInicioDesc varchar(40) not null unique,
    primary key PK_puntoInicio(puntoInicioCodigo)
);

create table nombreLugar(
	nombreLugarId int auto_increment not null,
    nombreLugarDesc varchar(40) not null unique,
    primary key PK_nombreLugar(nombreLugarId)
);


create table puntoFinal(
	puntoFinalCodigo int auto_increment not null,
    puntoFinalDesc varchar(40) not null,
    nombreLugar int not null,
    primary key PK_puntoFinal(puntoFinalCodigo),
    constraint FK_PuntoFinal_NombreLugar foreign key (nombreLugar) references nombreLugar(nombreLugarId)
);

create table costoAsignado(
	costoPedidoId int auto_increment not null,
    costoPedidoDesc double not null unique,
    primary key PK_costoPedido(costoPedidoId)
);


create table costoPedido(
	 costoPedidoId int auto_increment not null,
     puntoInicio int not null,
     puntoFinal int not null,
     costoAsignado int not null,
     primary key PK_costoPedido(costoPedidoId),
     constraint FK_CostoPedido_PuntoInicial foreign key (puntoInicio) references puntoInicio(puntoInicioCodigo),
     constraint FK_CostoPedido_PutoFinal foreign key (puntoFinal) references puntoFinal(puntoFinalCodigo),
     constraint FK_CostoPedido_CostoAsignado foreign key (costoASignado) references costoAsignado(costoPedidoId)
);

create table pedido(
	pedidoId int auto_increment not null,
    pedidoFecha date not null,
    nombreReceptor varchar(50) not null,
    pedidoTelefonoReceptor varchar(8) not null,
    pedidoPuntoInicio int not null,
    pedidoDireccionInicio varchar(150) not null,
    pedidoPuntoFinal int not null,
    pedidoDireccionFinal varchar(150) not null,
    pedidoUsuarioId int not null,
    pedidoMensajeroId int default "1",
    pedidoMonto decimal not null,
    pedidoCosto decimal not null,
    pedidoDesc varchar(150) not null,
    pedidoFormaPagoId tinyint default "1",
    pedidoEstadoId tinyint default "1",
    primary key PK_pedido (pedidoId),
    constraint FK_Pedido_Mensajero foreign key (pedidoMensajeroId) references Usuario(UsuarioId),
    constraint FK_Pedido_Usuario foreign key (pedidoUsuarioId) references Usuario(UsuarioId),
    constraint FK_Pedido_PedidoEstado foreign key (pedidoEstadoId) references estadoPedido(estadoPedidoId),
    constraint FK_Pedido_FormaPago foreign key (pedidoFormaPagoId) references formaPago(formaPagoId),
    constraint FK_Pedido_PuntoInicial foreign key (pedidoPuntoInicio) references puntoInicio(puntoInicioCodigo),
    constraint FK_PedidoPuntoFinal foreign key (pedidoPuntoFinal) references puntoFinal(puntoFinalCodigo)
);

create table rutas(
	rutasId int auto_increment not null,
    rutasDesc varchar(150),
    pedidoId int not null,
    primary key PK_rutas (rutasId),
    constraint FK_rutas foreign key (pedidoid) references Pedido(pedidoId)
);
create table sala(
	salaId int auto_increment not null,
	UsuarioSendMessageId int not null,
	UsuarioReceiverId int not null,
	primary key PK_sala (salaId),
    constraint FK_UsuarioSendMessage foreign key (UsuarioSendMessageId) references Usuario(usuarioId),
    constraint FK_UsuarioReceiverId foreign key (UsuarioReceiverId) references Usuario(usuarioId)
);
create table Mensaje(
	mensajeId int auto_increment not null,
    idSalaMensaje int not null,
    mensajeDesc varchar(1000) not null,
    UsuarioSendMessageId int not null,
	UsuarioReceiverId int not null,
    mensajeFecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    primary key PK_mensaje (mensajeId),
     constraint FK_UsuarioSendMessageMensaje foreign key (UsuarioSendMessageId) references Usuario(usuarioId),
    constraint FK_UsuarioReceiverIdMensaje foreign key (UsuarioReceiverId) references Usuario(usuarioId),
    constraint FK_salaId foreign key (idSalaMensaje) references sala(salaId)
);