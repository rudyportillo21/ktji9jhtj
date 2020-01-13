<script>
	$(document).ready(function(){
		mostrarJugador();

		function mostrarJugador(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('jugador_controller/get_jugador') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var n=1;

					for (var i = 0; i < datos.length; i++) {
						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_jugador+'</td>'+
						'<td>'+datos[i].edad+'</td>'+
						'<td>'+datos[i].nombre_posicion+'</td>'+
						'<td>'+datos[i].nombre_pais+'</td>'+
						'<td>'+datos[i].nombre_equipo+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger borrar" data="'+datos[i].id_jugador+'">ELIMINAR</a>'+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-primary editar" data="'+datos[i].id_jugador+'">EDITAR</a>'+'</td>'+
						'</tr>';
						n++;
					}
					$('#tabla_jugador').html(tabla);
				}
			});
		};//fin de la funcion de mostrarJugador

		$('#tabla_jugador').on('click','.borrar',function(){
			$id = $(this).attr('data');

			$('#modalBorrar').modal('show');
			$('#modalBorrar').find('.modal-title').text('Eliminar registro');

			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('jugador_controller/eliminar') ?>',
					data:{id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');
						if(respuesta==true){
							alertify.notify('Eliminado exitosamente','success',10,null);
							mostrarJugador();
						}else{
							alertify.notify('Error al eliminar','error',10,null);
						}
					},
					error: function(){
						alertify.notify('Error al eliminar registro dependiente!!!','error',10,null);
					}
				});
			});
		});//fin de la funcion eliminar

		$('#nueJugador').click(function(){
			$('#jugador').modal('show');
			$('#jugador').find('.modal-title').text('Nuevo jugador');
			$('#formJugador').attr('action','<?= base_url('jugador_controller/ingresar') ?>');
		});

		get_posicion();

		function get_posicion(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('jugador_controller/get_posicion') ?>',
				dataType: 'json',

				success: function(datos){
					var op='';
					var i;
					op+="<option value=''>Selecione una posicion</option>";

					for (i = 0; i < datos.length; i++) {
						op+="<option value='"+datos[i].id_posicion+"'>"+datos[i].nombre_posicion+"</option>";
					}

					$('#posicion').html(op);
				}
			});
		}//fin de la funcion get_posicion


		get_pais();

		function get_pais(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('jugador_controller/get_pais') ?>',
				dataType: 'json',

				success: function(datos){
					var op='';
					var i;
					op+="<option value=''>Selecione una pais</option>";

					for (i = 0; i < datos.length; i++) {
						op+="<option value='"+datos[i].id_pais+"'>"+datos[i].nombre_pais+"</option>";
					}

					$('#pais').html(op);
				}
			});
		}//fin de la funcion get_pais

		get_equipo();

		function get_equipo(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('jugador_controller/get_equipo') ?>',
				dataType: 'json',

				success: function(datos){
					var op='';
					var i;
					op+="<option value=''>Selecione una equipo</option>";

					for (i = 0; i < datos.length; i++) {
						op+="<option value='"+datos[i].id_equipo+"'>"+datos[i].nombre_equipo+"</option>";
					}

					$('#equipo').html(op);
				}
			});
		}//fin de la funcion get_posicion

		$('#btnGuardar').click(function(){
			$url = $('#formJugador').attr('action');
			$data = $('#formJugador').serialize();

			$.ajax({
				type: 'ajax',
				method: 'post',
				url:$url,
				data:$data,
				dataType: 'json',

				success: function(respuesta){
					$('#jugador').modal('hide');

					if(respuesta=='add'){
						alertify.notify('Ingresado exitosamente','success',10,null);
						mostrarJugador();
					}else if(respuesta=='edi'){
						alertify.notify('Actualizado exitosamente','success',10,null);

					}else if (respuesta==false){
						alertify.notify('Error al ingresar','error',10,null);
					}else{
						alertify.notify('Error al actualizar, o no modifico nada!!!','error',10,null);
					}
					$('#formJugador')[0].reset();
				}
			});
		});//fin de la funcion ingresar

		$('#tabla_jugador').on('click','.editar',function(){
			$id = $(this).attr('data');

			$('#jugador').modal('show');
			$('#jugador').find('.modal-title').text('Editar registro');
			$('#formJugador').attr('action','<?= base_url('jugador_controller/actualizar') ?>');

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?= base_url('jugador_controller/get_datos') ?>',
				data:{id:$id},
				dataType: 'json',

				success: function(datos){

					$('#id').val(datos.id_jugador);
					$('#nombre').val(datos.nombre_jugador);
					$('#edad').val(datos.edad);
					$('#posicion').val(datos.id_posicion);
					$('#pais').val(datos.id_pais);
					$('#equipo').val(datos.id_equipo);
					
				}
			});
			
		});//fin de la funcion eliminar


	});//fin de la estructura de ajax
</script>