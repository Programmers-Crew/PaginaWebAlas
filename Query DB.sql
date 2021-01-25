create database DBAlasGt;
use DBAlasGt;

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

create table Empresa(
	empresaId int auto_increment not null,
    empresaDesc varchar(25) not null, #Aqui ira el nombre de la empresa
    empresaNumeroCuenta varchar(25) not null, # Aqui ira el numero de cuenta
    empresaNombreCuenta varchar(25) not null, # Aqui ira el nombre del propetario de la cuenta
    empresaCuentaTipo int not null, # Aqui ira si es monetario o ahorro
    empresaBanco int not null, #Aqui iria el nombre del banco
    primary key PK_Empresa (empresaId),
    constraint FK_Empresa_Tipocuenta foreign key (empresaCuentaTipo) references TipoCuenta(tipoCuentaId),
    constraint FK_Empresa_Banco foreign key (empresaBanco) references Banco(bancoId)
);


create table Usuario(
	usuarioId int auto_increment not null,
    userName varchar(25) unique not null,
	usuarioNombre varchar(50) not null,
    usuarioApellido varchar(25) not null,
    usuarioCorreo varchar(30) not null unique,
    usuarioContrasena varchar(200) not null,
    tipoUsuarioId tinyint not null,
    estadoUsuarioId tinyint not null default '1',
    empresaId int not null,
    primary key PK_usuario (usuarioId),
	Constraint FK_Usuario_TipoUsuario foreign key (tipoUsuarioId) references tipoUsuario(tipoUsuarioId),
    Constraint FK_Usuario_EstadoUsuario foreign key (estadoUsuarioId) references estadoUsuario(estadoUsuarioId),
	Constraint FK_Usuario_Empresa foreign key (empresaId) references Empresa(empresaId)
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
<<<<<<< HEAD
    pedidoCosto decimal not null,
=======
    pedidoCosto int not null,
>>>>>>> Diego-Gonzalez
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