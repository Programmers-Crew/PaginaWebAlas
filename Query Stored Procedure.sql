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
	create procedure SP_AgregarTipoUsuario(tipoUsuarioId tinyint, descripcion varchar(100))
		begin
			insert into tipousuario(tipoUsuarioId, tipoUsuarioDesc)
				values(tipoUsuarioId, descripcion);
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
	create procedure Sp_AgregarEstadoPedido(estado tinyint, descripcion varchar(100))
		begin
			insert into estadopedido(estadoPedidoId, estadoPedidoDesc)
				values(estado, descripcion);
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
	create procedure Sp_AgregarUsuario(username varchar(25), nombre varchar(50), apellido varchar(50), telefono varchar(8), contrasena varchar(20), tipoUsuario tinyint)
		begin
			insert into Usuario(userName,usuarioNombre,usuarioApellido,usuarioTelefono,usuarioContrasena,tipousuarioId)
				values(username,nombre,apellido,telefono,tipoUsuario);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ActualizarUsuario(idBuscado int,nuevoUsername varchar(25), nuevoNombre varchar(50), nuevoApellido varchar(50), nuevoTelefono varchar(8), nuevaContrasena varchar(20))
		begin
			update Usuario 
				set userName = nuevoUsername,
					usuarioNombre = nuevoNombre,
					usuarioApellido = nuevoApellido,
                    usuarioTelefono = nuevoTelefono,
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
	create procedure Sp_AgregarPedido(fecha date, descripcion varchar(50), telefonoReceptor varchar(8), direccion varchar(50),usuario int, estado tinyint)
		begin
			insert into Pedido(pedidoFecha,pedidoDesc,pedidoTelefonoReceptor,pedidoDireccion,pedidoMensajeroId,pedidoUsuarioId,pedidoEstadoId)
				values(fecha, descripcion, telefonoReceptor, direccion, mensajero, usuario, estado);
        end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ActualizarPedido(idBuscado int,nuevaDescripcion varchar(50), nuevaTelefonoReceptor varchar(8), nuevaDireccion varchar(50),nuevaUsuario int)
		begin
			update Pedido
				set 
					pedidoDesc = nuevaDescripcion,
					pedidoTelefonoReceptor = nuevaTelefonoReceptor,
					pedidoDireccion = nuevaDireccion,
					pedidoUsuarioId = nuevaUsuario
						where pedidoId = idBuscado;
		end $$
DELIMITER ;


DELIMITER $$
	create procedure Sp_ConfirmarPedido(idBuscado int, mensajero int, estado int)
		begin
			update Pedido
				set 
					pedidoMensajeroId = mensajero,
                    pedidoEstadoId = estado
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