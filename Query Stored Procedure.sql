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
						estadpPedido as ep;
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
	create procedure Sp_EliminarEstadpPedido (idBuscado tinyint)
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
				u.usuarioId,
                u.userName,
                u.usuarioNombre,
                u.usuarioApellido,
                u.usuarioTelefono,
                u.usuarioContrasena,
                u.tipousuarioId
				from 
					Usuario as u;
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_AgregarUsuario(username varchar(25), nombre varchar(50), apellido varchar(50),contrasena varchar(20), tipoUsuario tinyint)
		begin
			insert into Usuario(userName,usuarioNombre,usuarioApellido,usuarioContrasena,tipousuarioId)
				values(username,nombre,apellido,telefono,tipoUsuario);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ActualizarUsuario(idBuscado int,nuevoUsername varchar(25), nuevoNombre varchar(50), nuevoApellido varchar(50), nuevaContrasena varchar(20))
		begin
			update Usuario 
				set userName = nuevoUsername,
					usuarioNombre = nuevoNombre,
					usuarioApellido = nuevoApellido,
                    usuarioContrasena = nuevaContrasena
						where usuarioId = idBuscado;
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
                p.pedidoDesc,
                p.pedidoTelefonoReceptor,
                p.pedidoDireccion,
                p.pedidoMensajeId,
                p.pedidoUsuarioId,
                p.pedidoEstadoId
				from
					Pedido as p;
        end $$
DELIMITER ;


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
	create procedure Sp_ConfirmarPago(idBuscado int, formaPago decimal, comentario varchar(100))
		begin
			update Pedido as p
				set
					p.pedidoFormaPagoId = formaPago, 
					p.pedidoComentario = comentario
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
	create procedure Sp_ValidarLogin(nombreUsuario varchar(25), contra varchar(25))
		begin
			select 
				u.userName
					from 
						usuario as u
							where userName = nombreUsuario and usuarioContrasena = contra;
        end $$
DELIMITER ;