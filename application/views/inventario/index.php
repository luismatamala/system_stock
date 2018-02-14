
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoProducto"><span class="glyphicon glyphicon-plus" ></span> Agregar producto</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i>Consultar inventario</h4>
		</div>
		<div class="panel-body">
			<div class='row-fluid'>
				<div id="resultados">
					<table class="table table-condensed table-bordered" id="tb_productos">
						<thead>
							<tr>
								<th>Código</th>
								<th>Nombre</th>
								<th>Precio</th>
								<th>Categoría</th>
								<th>Hora y fecha de creación</th>
								<th>Stock</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($productos->result() as $producto)
							{
						?>
							<tr>
								<td><?php echo $producto->codigo;  ?></td>
								<td><?php echo $producto->nombrep; ?></td>
								<td><?php echo $producto->precio; ?></td>
								<td><?php echo $producto->nombrec; ?></td>
								<td><?php echo $producto->fecha_creacion; ?></td>
								<td><?php echo $producto->stock; ?></td>
								<td class='center'>
									<a href="#" class='btn btn-default' title='Editar categoría' onclick="editarProducto('<?php echo $producto->id ?>')"  data-toggle="modal" data-target="#myModal2">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="<?php echo base_url('inventario/eliminar/'); echo $producto->id; ?>" class='btn btn-default' title='Eliminar categoría'>
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
			</div>
		</div>
	<div class='row'>
		<div class='outer_div'></div><!-- Carga los datos ajax -->
	</div>
  </div>
</div>

<!-- modal agregar producto -->
<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" action="inventario/registrar" method="post" id="guardar_producto" name="guardar_producto">
		<div id="resultados_ajax_productos"></div>
		  <div class="form-group">
			<label for="codigo" class="col-sm-3 control-label">Código</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código del producto" required>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nombre" class="col-sm-3 control-label">Nombre</label>
			<div class="col-sm-8">
				<textarea class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required maxlength="255" ></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<label for="categoria" class="col-sm-3 control-label">Categoría</label>
			<div class="col-sm-8">
				<select class='form-control' name='id_categoria' id='categoria'>
					<?php
						foreach ($categorias->result() as $categoria)
						{
							echo '<option value="'.$categoria->id.'">'.$categoria->nombre.'</option>';
						}
					 ?>
				</select>
			</div>
		  </div>
		<div class="form-group">
			<label for="precio" class="col-sm-3 control-label">Precio</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
			</div>
		</div>

		<div class="form-group">
			<label for="stock" class="col-sm-3 control-label">Stock</label>
			<div class="col-sm-8">
			  <input type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Inventario inicial" required  maxlength="8">
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

<!-- Modal  modificar producto-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
		<div id="resultados_ajax2"></div>
		  <div class="form-group">
			<label for="mod_codigo" class="col-sm-3 control-label">Código</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="mod_codigo" name="mod_codigo" placeholder="Código del producto" required>
				<input type="hidden" name="mod_id" id="mod_id">
			</div>
		  </div>
		   <div class="form-group">
			<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
			<div class="col-sm-8">
			  <textarea class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del producto" required></textarea>
			</div>
		  </div>

		  <div class="form-group">
			<label for="mod_categoria" class="col-sm-3 control-label">Categoría</label>
			<div class="col-sm-8">
				<select class='form-control' name='mod_categoria' id='mod_categoria' required>
					<?php
						foreach ($categorias->result() as $categoria)
						{
							echo '<option value="'.$categoria->id.'">'.$categoria->nombre.'</option>';
						}
					 ?>
				</select>
			</div>
		  </div>

		  <div class="form-group">
			<label for="mod_precio" class="col-sm-3 control-label">Precio</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
			</div>
		  </div>

		 <div class="form-group">
			<label for="mod_stock" class="col-sm-3 control-label">Stock</label>
			<div class="col-sm-8">
			  <input type="number" min="0" class="form-control" id="mod_stock" name="mod_stock" placeholder="Inventario inicial" required  maxlength="8" readonly>
			</div>
		</div>

	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
	  </div>
	  </form>
	</div>
  </div>
</div>

<script type="text/javascript">

</script>