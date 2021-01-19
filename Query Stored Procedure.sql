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
                    tu.tipoUsuarioDesc
					from
						Usuario as u
							inner join 
								tipoUsuario  as tu
									on u.tipoUsuarioId = tu.tipoUsuarioId;

        end $$
DELIMITER ;
call Sp_ListarUsuario();

DELIMITER $$
	create procedure Sp_AgregarUsuario(nombre varchar(50), apellido varchar(50), username varchar(25), contrasena varchar(200), correo varchar(30),tipoUsuario tinyint)
		begin
			insert into Usuario(usuarioNombre,usuarioApellido,userName,usuarioContrasena,usuarioCorreo,tipoUsuarioId)
				values(nombre, apellido, username, contrasena, correo,tipoUsuario);
        end $$
DELIMITER ;

DELIMITER $$
	create procedure Sp_ActualizarUsuario(idBuscado int,nombre varchar(50), apellido varchar(50),nuevoUsername varchar(25),nuevaContrasena varchar(20), correoNuevo varchar(30))
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
																					pedidoEstadoId = estadoPedidoId;
        end $$
DELIMITER ;
call Sp_ListarPedido();

DELIMITER $$
	create procedure Sp_AgregarPedido(fecha date, direccion varchar(50), usuario int, telefono varchar(8), descripcion varchar(50), monto decimal, estado tinyint)
		begin
			insert into Pedido(pedidoFecha,pedidoDireccion,pedidoUsuarioId,pedidoTelefonoReceptor,pedidoDesc,pedidoMonto,pedidoEstadoId)
				values(fecha, direccion, usuario, telefono, descripcion, monto, estado);
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
	create procedure Sp_ConfirmarPedido(idBuscado int, mensajero int, costo decimal,estado int)
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
	create procedure Sp_ConfirmarPago(idBuscado int, formaPago decimal, comentario varchar(100), estado int)
		begin
			update Pedido as p
				set
					p.pedidoFormaPagoId = formaPago, 
					p.pedidoComentario = comentario,
                    p.pedidoEstadoId = estado
						where pedidoId = idBuscado;
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
				u.userName, u.usuarioContrasena, u.usuarioNombre, u.usuarioApellido, u.tipoUsuarioId
					from 
						usuario as u
							where userName = nombreUsuario and usuarioContrasena = contra;
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

call Sp_BuscarPedido(4);


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
					where pedidoFecha = fechaCorte and pedidoEstadoId = 3 and pedidoFormaPagoId = 1;
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


