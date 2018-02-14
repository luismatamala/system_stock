<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nueva Categoría</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i>Consultar Categorías</h4>
		</div>
		<div class="panel-body">
			<div id="resultados">
				<table class="table table-condensed table-bordered" id="tb_categorias">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Fecha y hora de creación</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($categorias->result() as $categoria)
						{
					?>
						<tr>
							<td><?php echo $categoria->nombre;  ?></td>
							<td><?php echo $categoria->descripcion; ?></td>
							<td><?php echo $categoria->fecha_creacion; ?></td>
							<td class=''>
								<a href="#" class='btn btn-default' title='Editar categoría' data-nombre='' 				data-descripcion='' data-id='' data-toggle="modal" data-target="#myModal2">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="<?php echo base_url('categoria/eliminar/'); echo $categoria->id; ?>" class='btn btn-default' title='Eliminar categoría'>
									<i class="glyphicon glyphicon-trash"></i>
								</a>
							</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
			<div class='outer_div'></div><!-- Carga los datos ajax -->
		</div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nueva categoría</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" method="post" action="<?php echo base_url('categoria/registrar'); ?>">
		<div id="resultados_ajax"></div>
		  <div class="form-group">
			<label for="nombre" class="col-sm-3 control-label">Nombre</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="nombre" name="nombre" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="descripcion" class="col-sm-3 control-label">Descripción</label>
			<div class="col-sm-8">
				<textarea class="form-control" id="descripcion" name="descripcion"   maxlength="255" ></textarea>
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