<div id="news" class="row">
 <?php foreach($this->Attach as $k => $e): ?>

	<div class="item col-md-4 col-sm-6 col-xs-12" style="cursor:pointer;" data-id="<?php echo $e->id; ?>" data-nombre="<?php echo htmlspecialchars($e->Nombre); ?>">
		<div class="well well-sm">
			<img src="<?php echo $this->BaseUrl('uploads/' . $e->Imagen); ?>" class="img-thumbnail" />
			<h3><?php echo $e->Nombre; ?></h3>
			<p><?php echo $e->Descripcion; ?></p>
		</div>
	</div>
 <?php endforeach; ?>
</div>

<script>
	$(document).ready(function(){
		var container = document.querySelector('#news');
		var msnry = new Masonry( container, {  // options
		  itemSelector: '.item'
		});

		$("#news .item").click(function(){
			CargarEntrada($(this).data('nombre'), $(this).data('id'));
		})
	})

	function CargarEntrada(titulo, id)
	{
		AjaxPopupModal('mEntrada', titulo, 'inicio/entrada/?id=' + id);
	}
</script>