<?php $this->load->helper('jugador'); ?>
<body class="container">

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" id="nueJugador">
		Nuevo jugador
	</button>
	<table border="1" class="table table-dark table-hover">
		<thead>
			<tr>
				<td>N°</td>
				<td>Nombre juagdor</td>
				<td>Edad</td>
				<td>Posicion</td>
				<td>Pais</td>
				<td>Equipo</td>
				<td>Eliminar</td>
				<td>Editar</td>
			</tr>
		</thead>
		<tbody id="tabla_jugador">
			
		</tbody>
	</table>
	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Esta seguro que quiere eliminar este registro?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" id="btnBorrar">Si, Eliminar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>	
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="jugador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formJugador" action="" method="POST">
						<div>
							<input type="hidden" name="id_jugador" id="id">
						</div>
						<div>
							<label>Nombre del jugador</label>
							<input type="text" name="nombre" id="nombre" class="form-control text-center" placeholder="Ingrese en nombre del jugador...">
						</div>
						<div>
							<label>Edad del jugador</label>
							<input type="number" name="edad" id="edad" class="form-control text-center" placeholder="Ingrese la edad del jugador...">
						</div>
						<div>
							<label>Seleccione la posicion</label>
							<select id="posicion" name="posicion" class="form-control text-center">
								
							</select>
						</div>
						<div>
							<label>Seleccione el pais</label>
							<select id="pais" name="pais" class="form-control text-center">
								
							</select>
						</div>
						<div>
							<label>Seleccione el equipo</label>
							<select id="equipo" name="equipo" class="form-control text-center">
								
							</select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					
				</div>
			</div>
		</div>
	</div>