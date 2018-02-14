<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span> Nuevo Usuario</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Usuarios</h4>
		</div>
		<div class="panel-body">
			<div id="resultados">
				<table class="table table-condensed table-bordered" id="tb_categorias">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Nombre usuario</th>
							<th>Tipo usuario</th>
							<th>Fecha y hora de creación</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($usuarios->result() as $usuario)
						{
					?>
						<tr>
							<td><?php echo $usuario->nombre;  ?></td>
							<td><?php echo $usuario->apellido; ?></td>
							<td><?php echo $usuario->nombre_usuario; ?></td>
							<td><?php echo $usuario->tipo_usuario; ?></td>
							<td><?php echo $usuario->fecha_creacion; ?></td>
							<td ><span class="">
								<a href="#" class='btn btn-default' title='Editar usuario' onclick="" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="#" class='btn btn-default' title='Cambiar contraseña' onclick="" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-cog"></i></a>
								<a href="#" class='btn btn-default' title='Borrar usuario' onclick=""><i class="glyphicon glyphicon-trash"></i> </a></span>
							</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
			<div class='outer_div'></div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo usuario</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
		<div id="resultados_ajax"></div>
		  <div class="form-group">
			<label for="firstname" class="col-sm-3 control-label">Nombres</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="lastname" class="col-sm-3 control-label">Apellidos</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="user_name" class="col-sm-3 control-label">Nombre Usuario</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Usuario" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="user_email" class="col-sm-3 control-label">Tipo Usuario</label>
			<div class="col-sm-8">
			  
			</div>
		  </div>
		  <div class="form-group">
			<label for="user_password_new" class="col-sm-3 control-label">Contraseña</label>
			<div class="col-sm-8">
			  <input type="password" class="form-control" id="user_password_new" name="user_password_new" placeholder="Contraseña" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="user_password_repeat" class="col-sm-3 control-label">Repite contraseña</label>
			<div class="col-sm-8">
			  <input type="password" class="form-control" id="user_password_repeat" name="user_password_repeat" placeholder="Repite contraseña" pattern=".{6,}" required>
			</div>
		  </div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
	  </div>
	  </form>
	</div>
  </div>
</div>
