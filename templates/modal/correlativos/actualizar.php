
<div class="modal fade" id="<?php echo $modal_a; ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Actualizar Correlativo</h4>
			</div>
			<form action="../procesos/actualizar-correlativo" method="POST" autocomplete="Off">
			<div class="modal-body">
		
            <input type="hidden" name="id" value="<?php echo $fila->idcorrelativos; ?>">

			<div class="form-group">
			<label>Código</label>
			<input type="text" name="codigo" value="<?php echo $fila->codigo; ?>" class="form-control" readonly>
			</div>
			<div class="form-group">
			<label>Descripción</label>
			<input type="text" name="descripcion" value="<?php echo $fila->descripcion; ?>" class="form-control" readonly>
			</div>
			<div class="form-group">
			<label>Tipo</label>
			<input type="text" name="tipo" value="<?php echo $fila->desc_tipo; ?>" class="form-control" readonly>
			</div>
			<div class="form-group">
			<label>Número</label>
			<input type="number" name="numero" value="<?php echo $fila->numero; ?>" class="form-control" min="0">
			</div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
			</form>
		</div>
	</div>
</div>