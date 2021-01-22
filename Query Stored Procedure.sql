#TipoUsuario

DELIMITER $$
	create procedure Sp_ListarTipoUsuario()
		begin 
			select 
				tp.tipousuarioId,
                tp.tipousuarioDesc
				from 
					tipousuario as tp;	
		end $$
DELIMITER ;


DELIMITER $$
	create procedure SP_AgregarTipoUsuario(descripcion varchar(100))
		begin
			insert into tipousuario(tipoUsuarioDesc)
				values(descripcion);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure SP_ActualizarTipoUsuario(idBuscado tinyint,nuevaDesc varchar(100))
		begin
				update TipoUsuario
					set tipoUsuarioDesc = nuevaDesc 
						where tipoUsuarioId = idBuscado;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EliminarTipoUsuario(idbuscado tinyint)
		begin
			delete from tipousuario
				where tipoUsuarioId = idBuscado;
        end $$
DELIMITER ;



#EstadoPedido
DELIMITER $$
	create procedure Sp_ListarEstadoPedido()
		begin
			select 
				ep.estadoPedidoId,
                ep.estadoPedidoDesc
					from 
						estadoPedido as ep;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_AgregarEstadoPedido(descripcion varchar(100))
		begin
			insert into estadopedido(estadoPedidoDesc)
				values(descripcion);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ActualizarEstadoPedido(idBuscado tinyint, nuevaDescripcion varchar(100))
		begin
			update estadoPedido
				set estadoPedidoDesc = nuevaDescripcion
					where estadoPedidoId = idBuscado;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EliminarEstadoPedido (idBuscado tinyint)
		begin
			delete from estadoPedido
				where estadoPedidoId = idBuscado;
        end $$
DELIMITER ;


#FormaPago

DELIMITER $$
	create procedure Sp_ListarFormaPago()
		begin
			select 
				fp.formaPagoId,
                fp.formaPagoDesc
					from 
						formaPago as fp;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_AgregarFormaPago(descripcion varchar(10))
		begin
			insert into formaPago(formaPagoDesc)
				values(descripcion);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EliminarFormaPago(idBuscado tinyint)
		begin
			delete from formaPago 
				where formaPagoId = idBuscado;
        end $$
DELIMITER ;


#Usuario

DELIMITER $$
	create procedure Sp_ListarUsuario()
		begin 
			select 
					u.userName,
					u.usuarioNombre,
					u.usuarioApellido,
                    u.usuarioCorreo,
					u.usuarioContrasena,
                    u.estadoUsuarioId,
                    tu.tipoUsuarioDesc
					from
						Usuario as u
							inner join 
								tipoUsuario  as tu
									on u.tipoUsuarioId = tu.tipoUsuarioId;

        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_AgregarUsuario(nombre varchar(50), apellido varchar(50), username varchar(25), contrasena varchar(200), correo varchar(30),tipoUsuario tinyint)
		begin
			insert into Usuario(usuarioNombre,usuarioApellido,userName,usuarioContrasena,usuarioCorreo,tipoUsuarioId)
				values(nombre, apellido, username, contrasena, correo,tipoUsuario);
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_ActualizarUsuario(idBuscado int,nombre varchar(50), apellido varchar(50),nuevoUsername varchar(25),nuevaContrasena varchar(200), correoNuevo varchar(30))
		begin
			update 
				usuario as u
					set 
						u.usuarioNombre = nombre,
                        u.usuarioApellido = apellido,
                        u.userName = nuevoUsername,
                        u.usuarioContrasena = nuevaContrasena,
                        u.usuarioCorreo = correoNuevo
							where 
								usuarioId = idBuscado;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_ConfirmarUsuario(idBuscado int, estadoUsuarioId tinyint)
		begin
			update 
				usuario as u
					set 
						u.estadoUsuarioId = estadoUsuarioId
							where 
								usuarioId = idBuscado;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EliminarUsuario(idBuscado int)
		begin
			delete from Usuario
				where usuarioId = idBuscado;
        end $$
DELIMITER ;


#Pedidos
DELIMITER $$
	create procedure Sp_ListarPedido()
		begin
			select 
				p.pedidoId,
                p.pedidoFecha,
                p.nombreReceptor,
                pi.puntoInicioDesc,
                p.pedidoDireccionInicio,
                pf.puntoFinalDesc,
                p.pedidoDireccionFinal,
				cliente.userName as cliente,
                p.pedidoTelefonoReceptor,
                p.pedidoDesc,
                mensajero.userName as mensajero,
                P.pedidoMonto,
                cp.costoAsignado,
                fp.formaPagoDesc,
                ep.estadoPedidoDesc
				from
					Pedido as p
						inner JOIN usuario as cliente
							on p.pedidoUsuarioId = cliente.usuarioId
								inner join usuario as mensajeroon p.pedidoMensajeroId = mensajero.usuarioId
									inner join formapago as fp
										on pedidoFormaPagoId = formaPagoId
											inner join estadopedido as ep
												on pedidoEstadoId = estadoPedidoId 
													inner join costopedido as cp
														on  p.pedidoCosto= cp.costoPedidoId
															inner join puntoinicio as pi
																on cp.puntoInicio = pi.puntoInicioCodigo
																	inner join puntofinal as pf
																		on puntoFinal = pf.puntoFinalCodigo
																			order by p.pedidoFecha DESC;
        end $$
DELIMITER ;
call Sp_ListarPedido();

DELIMITER $$
	create procedure Sp_AgregarPedido(fecha date, puntoInicio int,direccionInicio varchar(150),puntoFinal int, direccionFinal varchar(150),  usuario int, telefono varchar(8), descripcion varchar(150), costo int,monto decimal, nombreReceptor varchar(50))
		begin
			insert into Pedido(pedidoFecha,pedidoPuntoInicio,pedidoDireccionInicio,pedidoPuntoFinal,pedidoDireccionFinal,pedidoUsuarioId,pedidoTelefonoReceptor,pedidoDesc,pedidoCosto,pedidoMonto,nombreReceptor)
				values(fecha,puntoInicio ,direccionInicio,puntoFinal,direccionFinal, usuario, telefono, descripcion, costo,monto, nombreReceptor);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ActualizarPedido(idBuscado int,direccion varchar(50),telefono varchar(8), descripcion varchar(50), monto decimal, estado tinyint)
		begin
			update Pedido as p
				set 
					p.pedidoDireccion = direccion,
                    p.pedidoTelefonoReceptor = telefono,
                    p.pedidoDesc = descripcion,
                    p.pedidoMonto = monto,
                    p.pedidoEstadoId = estado
						where pedidoId = idBuscado;
		end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ConfirmarPedido(idBuscado int, mensajero int, costo int,estado int)
		begin
			update Pedido as p
				set 
					p.pedidoMensajeroId = mensajero,
					p.pedidoCosto = costo,
                    p.pedidoEstadoId = estado
						where pedidoId = idBuscado;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_ConfirmarPago(idBuscado int, costo decimal, mensajero int, estado int,formaPago int)
		begin
			update Pedido as p
				set
                    p.pedidoMensajeroId = mensajero,
                    p.pedidoEstadoId = estado,
                    p.pedidoFormaPagoId = formaPago
						where pedidoId = idBuscado;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_ConfirmarCorreo(correo varchar(30), estado int)
		begin
			update Usuario as U
				set
					U.estadoUsuarioId = estado
						where u.usuarioCorreo = correo;
        end $$
DELIMITER ;



DELIMITER $$
	create procedure Sp_ActualizarTelefonoPedido(idBuscado int, telefono varchar(8))
		begin
			update Pedido
				set 
					pedidoTelefonoReceptor = telefono
						where pedidoId = idBuscado;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EliminarPedido(idBuscado int)
		begin
			delete from Pedido
				where pedidoId = idBuscado;
        end $$
DELIMITER ;


#Sala

DELIMITER $$
	create procedure Sp_ListarSalas()
		begin
			select
				s.salaId,
                s.salaDesc
					from 
						Salas;
        end$$
DELIMITER ;


DELIMITER $$
	create procedure Sp_AgregarSalas(descripcion varchar(50))
		begin
			insert into Salas(salaDesc)
				values(descripcion);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EliminarSalas(idBuscado int)
		begin
			delete from Salas
				where salaId = idBuscado;
        end $$
DELIMITER ;


#Mensajes

DELIMITER $$
	create procedure Sp_ListarMensajes(salaBuscada int)
		begin
			select 
				m.mensajeDesc
					where mensajeSalaId = salaBuscada;
		end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EnviarMensaje(sala int, usuario int, descripcion varchar(100), fecha date)
		begin
			insert into Mensaje(mensajeSalaId,mensajeUsuarioId,mensajeDesc,mensajeFecha)
				values(sala, usuario, descripcion, fecha);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ValidarLogin(nombreUsuario varchar(25), contra varchar(200))
		begin
			select 
				u.usuarioId, u.userName, u.usuarioContrasena, u.usuarioNombre, u.usuarioApellido, u.tipoUsuarioId, u.usuarioCorreo
					from 
						usuario as u
							where userName = nombreUsuario and usuarioContrasena = contra and estadoUsuarioId = 2;
        end $$
DELIMITER ;
#PROCEDURE EXTRA
DELIMITER $$
	create procedure Sp_VerificarUsuario(nombreUsuario varchar(25))
		begin
			select 
				u.userName
					from 
						usuario as u
							where userName = nombreUsuario;
        end $$
DELIMITER ;

#inserts obligatorios
insert into tipoUsuario(tipoUsuarioDesc) values("Administrador"),("Mensajero"),("Cliente");
insert into  estadoPedido(estadoPedidoDesc) values("En Revisión"),("Pendiente"),("Entregado");
<<<<<<< HEAD

	-- puntoInicio
insert into puntoInicio(puntopuntoInicioDesc) values("Ciudad Capital"),("Carretera al Salvador"),("Villa Nueva"),("Mixco"),("San Miguel Petapa");

	-- nombreLugar
insert into nombreLugar(nombreLugarDesc) values("Zona 1"),("Zona 2"),("Zona 3"),("Zona 4"),("Zona 5"),("Zona 6"),("Zona 7"),("Zona 8"),("Zona 9"),("Zona 10"),("Zona 11"),("Zona 12"),("Zona 13");
insert into nombreLugar(nombreLugarDesc) values("Zona 14"),("Zona 15"),("Zona 16"),("Zona 17"),("Zona 18"),("Zona 19"),("Zona 21"),("San Rafael"),("Pilares del Norte"),("Villa Hermosa"),("Muxbal"),("San José Pinula");
insert into nombreLugar(nombreLugarDesc) values("Pavón"),("Fraijanes"),("Carretera al Atlántico km 10"),("Ciudad Satelite"),("San Miguel Petapa"),("Atanasio Tzul"),("Santa Catarina Pinula"),("Don Justo"),("Las Lomas"),("San Antonio");
insert into nombreLugar(nombreLugarDesc) values("Boca del Monte"),("Rivera del Rio"),("Zona 24");

	-- puntoFinal
insert into puntoFinal(puntoFinalDesc,nombreLugar) values("Ciudad Capital", 1),("Ciudad Capital", 2),("Ciudad Capital",3),("Ciudad Capital",4),("Ciudad Capital",5),("Ciudad Capital",6),("Ciudad Capital",7),("Ciudad Capital",8),("Ciudad Capital",9),("Ciudad Capital",10),("Ciudad Capital",11),("Ciudad Capital",12),("Ciudad Capital",13),("Ciudad Capital",14),("Ciudad Capital",15),("Ciudad Capital",16),("Ciudad Capital",17),("Ciudad Capital",20),("Ciudad Capital",48),("Ciudad Capital",31),("Ciudad Capital",18),("Ciudad Capital",19),("Ciudad Capital",31),("Ciudad Capital",21),("Ciudad Capital",28);

insert into puntoFinal(puntoFinalDesc,nombreLugar) values("Mixco",1),("Mixco",2),("Mixco",3),("Mixco",4),("Mixco",5),("Mixco",6),("Mixco",7),("Mixco",8),("Mixco",11),("Mixco",19),("Mixco",9),("Mixco",29);

insert into puntoFinal(puntoFinalDesc,nombreLugar) values("Villa Nueva",1),("Villa Nueva",2),("Villa Nueva",3),("Villa Nueva",4),("Villa Nueva",5);
insert into puntoFinal(puntoFinalDesc,nombreLugar) values("Villa Nueva",23),("Villa Nueva",45),("Villa Nueva",30),("Villa Nueva",46);

insert into puntoFinal(puntoFinalDesc,nombreLugar) values("Carretera al Salvador",24),("Carretera al Salvador",25),("Carretera al Salvador",32),("Carretera al Salvador",33),("Carretera al Salvador",34),("Carretera al Salvador",35),("Carretera al Salvador",26),("Carretera al Salvador",27);
insert into puntoFinal(puntoFinalDesc,nombreLugar) values("Ciudad Capital",22);

	-- CostoAsignado
insert into costoAsignado(costoPedidoDesc) values (25.00),(30.00),(35.00),(40.00);

	-- CostoPedido
		-- Ciudad Capital
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,9,1),(1,10,1),(1,11,1),(1,12,1),(1,13,1),(1,14,1),(1,15,1);
insert into costoPedido(puntoInicio, puntoFinal, costoAsignado) values(1,16,2),(1,17,2),(1,18,2);
insert into costoPedido(puntoInicio, puntoFinal, costoAsignado) values(1,26,2),(1,27,2),(1,28,2),(1,29,2),(1,30,2),(1,31,2),(1,32,2),(1,33,2),(1,34,2),(1,35,2);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(1,21,3),(1,24,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(1,38,3),(1,39,3),(1,40,3),(1,41,3),(1,42,3),(1,43,3),(1,44,3),(1,45,3),(1,46,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(1,25,4),(1,47,4),(1,48,4),(1,50,4),(1,51,4),(1,52,4),(1,53,4);
        -- Carretera Al Salvador
        insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(2,47,1),(2,48,1),(2,53,1),(2,54,1);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(2,16,2),(2,17,2);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(2,1,3),(2,2,3),(2,3,3),(2,4,3),(2,5,3),(2,6,3),(2,7,3),(2,8,3),(2,9,3),(2,10,3),(2,11,3),(2,12,3),(2,13,3),(2,14,3),(2,15,3),(2,21,3),(2,22,3),(2,18,3),(2,19,3),(2,20,3),(2,24,3),(2,55,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(2,38,3),(2,39,3),(2,40,3),(2,41,3),(2,42,3),(2,43,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(2,25,4),(2,26,4),(2,27,4),(2,28,4),(2,29,4),(2,30,4),(2,31,4),(2,32,4),(2,33,4),(2,34,4),(2,36,4),(2,37,4);
		-- Villa Nueva
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(3,38,1),(2,39,1),(2,40,1),(2,41,1),(2,42,1),(2,43,1);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(3,18,2);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(3,1,3),(3,2,3),(3,3,3),(3,4,3),(3,5,3),(3,6,3),(3,7,3),(3,8,3),(3,9,3),(3,10,3),(3,11,3),(3,12,3),(3,19,3),(3,20,3),(3,13,3),(3,14,3),(3,15,3),(3,16,3),(3,17,3),(3,21,3),(3,24,3),(3,55,3),(3,22,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(3,26,3),(3,27,3),(3,28,3),(3,29,3),(3,31,3),(3,32,3),(3,33,3),(3,34,3),(3,35,3),(3,36,3),(3,37,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(3,25,4),(3,47,4),(3,48,4),(3,49,4),(3,53,4),(3,50,4),(3,51,4),(3,52,4);
	-- Mixco
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(4,1,2),(4,2,2),(4,3,2),(4,4,2),(4,5,2),(4,6,2),(4,7,2),(4,8,2),(4,9,2),(4,10,2),(4,11,2),(4,12,2),(4,19,2),(4,20,2),(4,13,2),(4,14,2),(4,15,2),(4,16,2),(4,17,2),(4,22,2),(4,18,2);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(4,26,2),(4,27,2),(4,28,2),(4,29,2),(4,30,2),(4,31,2),(4,32,2),(4,33,2),(4,34,2),(4,35,2);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(4,38,3),(4,39,3),(4,40,3),(4,41,3),(4,42,3),(4,43,3),(4,44,3),(4,45,3),(4,36,3),(4,37,3),(4,21,3),(4,24,3),(4,55,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(4,25,4),(4,47,4),(4,48,4),(4,53,4),(4,50,4),(4,51,4),(4,52,4);
	-- San Miguel Petapa
    insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(5,38,1),(5,39,1),(5,40,1),(5,41,1),(5,42,1);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(5,12,2),(5,19,2),(5,20,2),(5,18,2),(5,33,2),(5,43,2);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(5,1,3),(5,2,3),(5,3,3),(5,4,3),(5,5,3),(5,6,3),(5,7,3),(5,8,3),(5,9,3),(5,10,3),(5,11,3),(5,13,3),(5,14,3),(5,15,3),(5,16,3),(5,17,3);
insert into costopedido(puntoInicio, puntoFinal, costoAsignado) values(5,56,4),(5,47,4),(5,48,4),(5,49,4),(5,53,4),(5,50,4),(5,51,4),(5,52,4);
		
=======
insert into  estadoUsuario(estadoUsuarioDesc) values("En Revisión"),("Confirmado");
insert into formapago(formaPagoDesc) values("PENDIENTE"),("EFECTIVO"),("Tarjeta Debito/Credito");
insert into usuario(userName,usuarioNombre,UsuarioApellido,usuarioCorreo,usuarioContrasena,tipoUsuarioId) values('Pendiente','Pendiente','Pendiente','_','4zWp2pbd','1');
>>>>>>> Davis-Roldan
#PROCEDURE EXTRA
DELIMITER $$
	create procedure Sp_ListarMesajeros()
		begin
			select 
				u.usuarioId,
                u.usuarioNombre,
                u.usuarioApellido,
                u.userName,
                u.usuarioContrasena,
                u.usuarioCorreo,
                tu.tipoUsuarioDesc
					from
						usuario as u
							inner join 
								tipoUsuario as tu
									on 
										u.tipoUsuarioId = tu.tipoUsuarioId
											where 
												u.tipoUsuarioId = 1 or u.tipoUsuarioId = 2
													and 
														usuarioId != 1
													order by u.usuarioId asc;
												
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_LLenarTipoUsuario()
		begin
			select
				tu.tipoUsuarioId,
				tu.tipoUsuarioDesc
					from
						tipousuario as tu
							where 
								tu.tipoUsuarioId = 1 or tu.tipoUsuarioId = 2;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_BuscarMensajero(usernameBuscado varchar(25))
		begin
			select 
				u.usuarioId,
                u.usuarioNombre,
                u.usuarioApellido,
                u.userName,
                u.usuarioContrasena,
                u.usuarioCorreo,
                tu.tipoUsuarioDesc
					from
						usuario as u
							inner join 
								tipoUsuario as tu
									on 
										u.tipoUsuarioId = tu.tipoUsuarioId
											where 
												userName = usernameBuscado;
												
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_EliminarUsuarioPorNombre(username varchar(25))
		begin
			delete from usuario as u
				where u.userName = username;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_ActualizarPorNombre(username varchar(20),nombre varchar(50), apellido varchar(50),nuevoUsername varchar(25),nuevaContrasena varchar(20), nuevoCorreo varchar(30))
		begin
			update 
				usuario as u
					set 
						u.usuarioNombre = nombre,
                        u.usuarioApellido = apellido,
                        u.userName = nuevoUsername,
                        u.usuarioContrasena = nuevaContrasena,
                        u.usuarioCorreo = nuevoCorreo
							where 
								u.userName = username;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ListarClientes()
		begin
			select 
				u.usuarioId,
                u.usuarioNombre,
                u.usuarioApellido,
                u.userName,
                u.usuarioContrasena,
                u.usuarioCorreo
					from
						usuario as u
							inner join 
								tipoUsuario as tu
									on 
										u.tipoUsuarioId = tu.tipoUsuarioId
											where 
												u.tipoUsuarioId = 3
													and 
														usuarioId != 1
													order by u.usuarioId asc;
												
        end $$
DELIMITER ;



DELIMITER $$
	create procedure Sp_ListarMensajero()
		begin
			select 
				u.usuarioId,
				u.userName
					from usuario as u
							inner join tipousuario as tu
									on u.tipoUsuarioId = tu.tipoUsuarioId
										where u.tipoUsuarioId = 2
											and usuarioId != 1;
								
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_BuscarDescPedido(idBuscado int)
		begin
			select pedidoDesc
				from pedido
					where pedidoId = idBuscado;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_BuscarPedido(idBuscado int)
		begin 
			select 
				p.pedidoId,
                p.pedidoFecha,
                p.nombreReceptor,
                p.pedidoDireccionInicio,
                p.pedidoDireccionFinal,
				cliente.userName as cliente,
                p.pedidoTelefonoReceptor,
                p.pedidoDesc,
                mensajero.userName as mensajero,
                P.pedidoMonto,
                p.pedidoCosto,
                fp.formaPagoDesc,
                ep.estadoPedidoDesc
				from
					Pedido as p
						 inner JOIN	
							usuario as cliente
								on 
									p.pedidoUsuarioId = cliente.usuarioId
										inner join 
											usuario as mensajero
												on 
													p.pedidoMensajeroId = mensajero.usuarioId
														inner join 
															formapago as fp
																on 
																	pedidoFormaPagoId = formaPagoId
																		inner join 
																			estadopedido as ep
																				on 
																					pedidoEstadoId = estadoPedidoId
																						where p.pedidoId = idBuscado;
        end $$


DELIMITER ;



DELIMITER $$
	create procedure Sp_ListarPedidoPorEstado(estadoPedido varchar(25))
		begin
			select 
				p.pedidoId,
                p.pedidoFecha,
                p.nombreReceptor,
                p.pedidoDireccionInicio,
                p.pedidoDireccionFinal,
				cliente.userName as cliente,
                p.pedidoTelefonoReceptor,
                p.pedidoDesc,
                mensajero.userName as mensajero,
                P.pedidoMonto,
                p.pedidoCosto,
                fp.formaPagoDesc,
                ep.estadoPedidoDesc
				from
					Pedido as p
						 inner JOIN	
							usuario as cliente
								on 
									p.pedidoUsuarioId = cliente.usuarioId
										inner join 
											usuario as mensajero
												on 
													p.pedidoMensajeroId = mensajero.usuarioId
														inner join 
															formapago as fp
																on 
																	pedidoFormaPagoId = formaPagoId
																		inner join 
																			estadopedido as ep
																				on 
																					pedidoEstadoId = estadoPedidoId
																						where ep.estadoPedidoDesc = estadoPedido;
        end $$
DELIMITER ;



DELIMITER $$
	create procedure Sp_ListarPedidoPorFecha(fechaBusqueda date)
		begin
			select 
				p.pedidoId,
                p.pedidoFecha,
                p.nombreReceptor,
                p.pedidoDireccionInicio,
                p.pedidoDireccionFinal,
				cliente.userName as cliente,
                p.pedidoTelefonoReceptor,
                p.pedidoDesc,
                mensajero.userName as mensajero,
                P.pedidoMonto,
                p.pedidoCosto,
                fp.formaPagoDesc,
                ep.estadoPedidoDesc
				from
					Pedido as p
						 inner JOIN	
							usuario as cliente
								on 
									p.pedidoUsuarioId = cliente.usuarioId
										inner join 
											usuario as mensajero
												on 
													p.pedidoMensajeroId = mensajero.usuarioId
														inner join 
															formapago as fp
																on 
																	pedidoFormaPagoId = formaPagoId
																		inner join 
																			estadopedido as ep
																				on 
																					pedidoEstadoId = estadoPedidoId
																						where p.pedidoFecha = fechaBusqueda;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_BuscarEstadoPorNombre(estadoPedido varchar(25))
		begin
			select 
				ep.estadoPedidoId
					from 
						estadoPedido as ep
							where estadoPedidoDesc = estadoPedido;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_BuscarCodigoUsuario(username varchar(25))
		begin
			select 
				u.usuarioId
					from 
						usuario as u
							where u.userName = username;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_BuscarCorreo(correo varchar(25))
		begin
			select 
				usuarioCorreo
					from 
						usuario
							where usuarioCorreo = correo;
        end $$
DELIMITER ;

#REPORTES
DELIMITER $$
	create procedure Sp_TotalesReporteVentas(fechaCorte date)
		begin
			select distinct p.pedidoId, 
            pedidoFecha, 
            sum(distinct pedidoMonto) as "Total a pagar",
            sum(distinct pedidoCosto) as "Total a cobrar",
            (sum(distinct pedidoMonto) + sum(distinct pedidoCosto)) as "Total",
            count(distinct pedidoId)
				from pedido as p
					where pedidoFecha = fechaCorte and pedidoEstadoId = 3;
        end $$
DELIMITER ;



DELIMITER $$
	create procedure Sp_SubReporteVentas(pedidoId int)
		begin 
			select 
				mensajero.userName as mensajero,
				cliente.userName as cliente,
                p.pedidoTelefonoReceptor,
                P.pedidoMonto,
                p.pedidoCosto,
                fp.formaPagoDesc
				from
					Pedido as p
						 inner JOIN	
							usuario as cliente
								on 
									p.pedidoUsuarioId = cliente.usuarioId
										inner join 
											usuario as mensajero
												on 
													p.pedidoMensajeroId = mensajero.usuarioId
														inner join 
															formapago as fp
																on 
																	pedidoFormaPagoId = formaPagoId
																		where p.pedidoId = pedidoId;
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_SubReporteCierreDeCaja(fechaCorte date)
		begin
			select
            count(distinct pedidoId) as "Pedidos total Entregados",
            sum(distinct pedidoMonto) as "Total a pagar",
            sum(distinct pedidoCosto) as "Total a cobrar"
				from 
					pedidos
						where pedidoFecha = fechaCorte and pedidoFormaPagoId = 1;
		end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ReporteCierreDeCaja(pedidoId int)
		begin
			select
				mensajero.userName as mensajero,
				cliente.userName as cliente,
				fp.formaPagoDesc,
				(sum(distinct pedidoMonto) + sum(distinct pedidoCosto)) as "Total Efectivo",
				(sum(distinct pedidoMonto) + sum(distinct pedidoCosto)) as "Total Tranferencia"
					from pedidos as p
						inner join 	
							usuario as cliente
								on 
									p.pedidoUsuarioId = cliente.usuarioId
										inner join 
											usuario as mensajero
												on 
													p.pedidoMensajeroId = mensajero.usuarioId
														inner join 
															formapago as fp
																on 
																	pedidoFormaPagoId = formaPagoId
																		where p.pedidoId = pedidoId;

                
        end $$
DELIMITER ;


DELIMITER $$ 
	create procedure Sp_BuscarPuntoFinal(puntoDesc varchar(40), lugar varchar(40))
		begin
			SELECT 
				pf.puntoFinalCodigo,
				pf.puntoFinalDesc,
				nl.nombreLugarDesc
				FROM puntofinal as pf
					inner join nombrelugar as nl
						on pf.nombreLugar = nl.nombreLugarId
								where pf.puntoFinalDesc = puntoDesc and nl.nombreLugarDesc = lugar
								order by puntoFinalCodigo asc;
		end $$
DELIMITER ;


DELIMITER $$
	create procedure SP_BuscarCostoPedido(puntoInicio varchar(40), puntoFinal varchar(40),lugar varchar(40))
		begin 
			select
				cp.costoPedidoId,
				pi.puntoInicioDesc,
				pf.puntoFinalDesc,
				nl.nombreLugarDesc,
				ca.costoPedidoDesc
					from costopedido as cp
						inner join puntoinicio as pi
							on cp.puntoInicio = pi.puntoInicioCodigo
								inner join puntoFinal as pf
										on cp.puntoFinal = pf.puntoFinalCodigo
											inner join nombrelugar as nl
												on pf.nombreLugar = nl.nombreLugarId
													inner join costoasignado as ca
														on cp.costoAsignado = ca.costoPedidoId
															where pi.puntoInicioDesc = puntoInicio  and pf.puntoFinalDesc = puntoFinal and nl.nombreLugarDesc = lugar
																order by costoPedidoId asc;
	end $$
DELIMITER ;